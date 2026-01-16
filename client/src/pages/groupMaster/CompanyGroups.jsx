import React, { useEffect, useState } from 'react';
import api from '../../api';
import { Plus, Edit, Trash2, X, Search, AlertCircle, CheckCircle, AlertTriangle } from 'lucide-react';

const CompanyGroups = () => {
    const [groups, setGroups] = useState([]);
    const [loading, setLoading] = useState(true);
    const [showModal, setShowModal] = useState(false);
    const [showDeleteModal, setShowDeleteModal] = useState(false);
    const [deleteId, setDeleteId] = useState(null);
    const [formData, setFormData] = useState({ name: '', id: null });
    const [error, setError] = useState('');
    const [searchQuery, setSearchQuery] = useState('');
    const [successMsg, setSuccessMsg] = useState('');

    // Fetch groups on mount
    const fetchGroups = async () => {
        try {
            setLoading(true);
            const res = await api.get('/company-groups');
            // Ensure we treat the response data as an array
            setGroups(Array.isArray(res.data) ? res.data : []);
        } catch (err) {
            console.error(err);
            setError('Failed to fetch data.');
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchGroups();
    }, []);

    // Filter groups locally based on search
    const filteredGroups = groups.filter(group =>
        group.T_Company_Group_Name?.toLowerCase().includes(searchQuery.toLowerCase())
    );

    const keydownHandler = (e) => {
        if (e.key === 'Escape') {
            setShowModal(false);
            setShowDeleteModal(false);
        }
    };

    useEffect(() => {
        document.addEventListener('keydown', keydownHandler);
        return () => document.removeEventListener('keydown', keydownHandler);
    }, []);

    const confirmDelete = (id) => {
        setDeleteId(id);
        setShowDeleteModal(true);
    };

    const executeDelete = async () => {
        if (!deleteId) return;
        try {
            await api.delete(`/company-groups/${deleteId}`);
            setSuccessMsg('Group deleted successfully.');
            fetchGroups();
            setTimeout(() => setSuccessMsg(''), 3000);
            setShowDeleteModal(false);
        } catch (err) {
            // Simulate/Handle the PHP "Used In Another Table" logic
            const msg = err.response?.data?.error || 'Error deleting group. It may be used in another table.';
            setError(msg);
            setTimeout(() => setError(''), 5000);
            setShowDeleteModal(false);
        }
    };

    const openModal = (group = null) => {
        setError('');
        if (group) {
            setFormData({ name: group.T_Company_Group_Name, id: group.T_Company_Group_Id });
        } else {
            setFormData({ name: '', id: null });
        }
        setShowModal(true);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        try {
            if (formData.id) {
                // Update
                await api.put(`/company-groups/${formData.id}`, { name: formData.name });
                setSuccessMsg('Group updated successfully.');
            } else {
                // Create
                await api.post('/company-groups', { name: formData.name });
                setSuccessMsg('Group created successfully.');
            }
            setShowModal(false);
            fetchGroups();
            setTimeout(() => setSuccessMsg(''), 3000);
        } catch (err) {
            const msg = err.response?.data?.error || 'Error saving group.';
            setError(msg);
        }
    };

    return (
        <div className="p-6 max-w-7xl mx-auto space-y-6">
            {/* Header Section */}
            <div className="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 className="text-3xl font-bold text-slate-800 tracking-tight">Company Groups</h1>
                    <p className="text-slate-500 mt-1">Manage your company group master data.</p>
                </div>
                <button
                    onClick={() => openModal()}
                    className="btn btn-primary shadow-lg shadow-blue-500/30 flex items-center gap-2 transform transition hover:scale-105"
                >
                    <Plus size={20} />
                    <span>Add New Group</span>
                </button>
            </div>

            {/* Notifications */}
            {error && (
                <div className="bg-red-50 border-l-4 border-red-500 p-4 rounded shadow-sm flex items-center gap-3 animate-fade-in">
                    <AlertCircle className="text-red-500" />
                    <p className="text-red-700">{error}</p>
                </div>
            )}
            {successMsg && (
                <div className="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded shadow-sm flex items-center gap-3 animate-fade-in">
                    <CheckCircle className="text-emerald-500" />
                    <p className="text-emerald-700">{successMsg}</p>
                </div>
            )}

            {/* Main Content Card */}
            <div className="card border-0 shadow-xl ring-1 ring-slate-900/5 bg-white/50 backdrop-blur-sm">
                {/* Toolbar */}
                <div className="flex items-center justify-between mb-6">
                    <div className="relative w-full max-w-md">
                        <Search className="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" size={18} />
                        <input
                            type="text"
                            placeholder="Search groups..."
                            className="pl-10 input w-full bg-white/80"
                            value={searchQuery}
                            onChange={(e) => setSearchQuery(e.target.value)}
                        />
                    </div>
                    <div className="text-sm text-slate-500 hidden sm:block">
                        Showing {filteredGroups.length} results
                    </div>
                </div>

                {/* Table */}
                <div className="table-container rounded-lg border border-slate-200 overflow-hidden">
                    <table className="w-full">
                        <thead className="bg-slate-50/50">
                            <tr>
                                <th className="py-4 pl-6 text-xs font-bold text-slate-500 uppercase tracking-wider">ID</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Group Name</th>
                                <th className="py-4 pr-6 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-slate-100 bg-white">
                            {loading ? (
                                <tr>
                                    <td colSpan="3" className="text-center py-12 text-slate-500">
                                        <div className="flex justify-center items-center gap-2">
                                            <span className="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-600"></span> Loading data...
                                        </div>
                                    </td>
                                </tr>
                            ) : filteredGroups.length > 0 ? (
                                filteredGroups.map((group) => (
                                    <tr key={group.T_Company_Group_Id} className="hover:bg-slate-50/80 transition-colors duration-150">
                                        <td className="py-4 pl-6 text-slate-600 font-medium">#{group.T_Company_Group_Id}</td>
                                        <td className="py-4 font-semibold text-slate-800">{group.T_Company_Group_Name}</td>
                                        <td className="py-4 pr-6 text-right">
                                            <div className="flex justify-end gap-2">
                                                <button
                                                    onClick={() => openModal(group)}
                                                    className="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-full transition-all"
                                                    title="Edit"
                                                >
                                                    <Edit size={18} />
                                                </button>
                                                <button
                                                    onClick={() => confirmDelete(group.T_Company_Group_Id)}
                                                    className="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-full transition-all"
                                                    title="Delete"
                                                >
                                                    <Trash2 size={18} />
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                ))
                            ) : (
                                <tr>
                                    <td colSpan="3" className="text-center py-12 text-slate-400 italic">
                                        No company groups found.
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>

            {/* Add/Edit Modal */}
            {showModal && (
                <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm transition-opacity">
                    <div className="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all scale-100 animate-in fade-in zoom-in duration-200">
                        <div className="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                            <h3 className="text-lg font-bold text-slate-800">
                                {formData.id ? 'Edit Company Group' : 'Add New Company Group'}
                            </h3>
                            <button
                                onClick={() => setShowModal(false)}
                                className="text-slate-400 hover:text-slate-600 transition-colors"
                            >
                                <X size={20} />
                            </button>
                        </div>

                        <form onSubmit={handleSubmit} className="p-6 space-y-4">
                            <div>
                                <label className="block text-sm font-medium text-slate-700 mb-1">
                                    Group Name <span className="text-red-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    className="input w-full focus:ring-2 focus:ring-blue-100"
                                    value={formData.name}
                                    onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                                    placeholder="e.g. Tiles Group A"
                                    required
                                    autoFocus
                                />
                            </div>

                            <div className="pt-2 flex gap-3">
                                <button
                                    type="button"
                                    onClick={() => setShowModal(false)}
                                    className="flex-1 btn hover:bg-slate-100"
                                >
                                    Cancel
                                </button>
                                <button
                                    type="submit"
                                    className="flex-1 btn btn-primary shadow-lg shadow-blue-500/20"
                                >
                                    {formData.id ? 'Save Changes' : 'Create Group'}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            )}

            {/* Delete Confirmation Modal */}
            {showDeleteModal && (
                <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm transition-opacity">
                    <div className="bg-white rounded-xl shadow-2xl w-full max-w-sm overflow-hidden transform transition-all scale-100 animate-in fade-in zoom-in duration-200">
                        <div className="p-6 text-center">
                            <div className="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <AlertTriangle className="text-red-500" size={24} />
                            </div>
                            <h3 className="text-lg font-bold text-slate-900 mb-2">Delete Company Group?</h3>
                            <p className="text-slate-500 text-sm mb-6">
                                Are you sure you want to delete this group? This action cannot be undone.
                            </p>
                            <div className="flex gap-3 justify-center">
                                <button
                                    onClick={() => setShowDeleteModal(false)}
                                    className="btn hover:bg-slate-100 w-full"
                                >
                                    Cancel
                                </button>
                                <button
                                    onClick={executeDelete}
                                    className="btn btn-danger w-full shadow-lg shadow-red-500/30"
                                >
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            )}
        </div>
    );
};

export default CompanyGroups;
