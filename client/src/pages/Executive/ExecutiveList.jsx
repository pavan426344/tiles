import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import api from '../../api';
import { Plus, Edit, Trash2, Search, UserCheck, UserX, AlertTriangle, CheckCircle } from 'lucide-react';

const ExecutiveList = () => {
    const navigate = useNavigate();
    const [executives, setExecutives] = useState([]);
    const [loading, setLoading] = useState(true);
    const [searchQuery, setSearchQuery] = useState('');
    const [error, setError] = useState('');
    const [successMsg, setSuccessMsg] = useState('');
    const [showDeleteModal, setShowDeleteModal] = useState(false);
    const [selectedId, setSelectedId] = useState(null);

    const fetchExecutives = async () => {
        try {
            setLoading(true);
            const res = await api.get('/executives');
            setExecutives(Array.isArray(res.data) ? res.data : []);
        } catch (err) {
            console.error(err);
            setError('Failed to fetch executive list.');
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchExecutives();
    }, []);

    const toggleStatus = async (id, currentStatus) => {
        try {
            const newStatus = currentStatus === '1' ? '0' : '1';
            await api.patch(`/executives/${id}/status`, { status: newStatus });
            setSuccessMsg(`Executive ${newStatus === '1' ? 'enabled' : 'disabled'} successfully.`);
            fetchExecutives();
            setTimeout(() => setSuccessMsg(''), 3000);
        } catch (err) {
            setError('Failed to update status.');
            setTimeout(() => setError(''), 3000);
        }
    };

    const confirmDelete = (id) => {
        setSelectedId(id);
        setShowDeleteModal(true);
    };

    const executeDelete = async () => {
        if (!selectedId) return;
        try {
            await api.delete(`/executives/${selectedId}`);
            setSuccessMsg('Executive deleted successfully.');
            fetchExecutives();
            setTimeout(() => setSuccessMsg(''), 3000);
        } catch (err) {
            setError('Failed to delete executive.');
            setTimeout(() => setError(''), 3000);
        } finally {
            setShowDeleteModal(false);
            setSelectedId(null);
        }
    };

    const filteredExecutives = executives.filter(ex =>
        ex.Name?.toLowerCase().includes(searchQuery.toLowerCase()) ||
        ex.username?.toLowerCase().includes(searchQuery.toLowerCase()) ||
        ex.Phone?.includes(searchQuery)
    );

    const getUserRole = (type) => {
        switch (parseInt(type)) {
            case 1: return 'Sub Executive';
            case 2: return 'Executive';
            case 3: return 'Zonal Head';
            case 4: return 'Admin';
            case 5: return 'Super Admin';
            case 6: return 'Dispatch';
            case 7: return 'Account';
            case 8: return 'Director';
            default: return 'Unknown';
        }
    };

    return (
        <div className="p-6 max-w-7xl mx-auto space-y-6">
            <div className="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 className="text-3xl font-bold text-slate-800 tracking-tight">Executive List</h1>
                    <p className="text-slate-500 mt-1">Manage executive accounts and permissions.</p>
                </div>
                <button
                    onClick={() => navigate('/executives/new')}
                    className="btn btn-primary shadow-lg shadow-blue-500/30 flex items-center gap-2 transform transition hover:scale-105"
                >
                    <Plus size={20} />
                    <span>New Executive</span>
                </button>
            </div>

            {error && (
                <div className="bg-red-50 border-l-4 border-red-500 p-4 rounded shadow-sm flex items-center gap-3 animate-fade-in">
                    <AlertTriangle className="text-red-500" />
                    <p className="text-red-700">{error}</p>
                </div>
            )}
            {successMsg && (
                <div className="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded shadow-sm flex items-center gap-3 animate-fade-in">
                    <CheckCircle className="text-emerald-500" />
                    <p className="text-emerald-700">{successMsg}</p>
                </div>
            )}

            <div className="card border-0 shadow-xl ring-1 ring-slate-900/5 bg-white/50 backdrop-blur-sm">
                <div className="flex items-center justify-between mb-6">
                    <div className="relative w-full max-w-md">
                        <Search className="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" size={18} />
                        <input
                            type="text"
                            placeholder="Search by name, username or phone..."
                            className="pl-10 input w-full bg-white/80"
                            value={searchQuery}
                            onChange={(e) => setSearchQuery(e.target.value)}
                        />
                    </div>
                    <div className="text-sm text-slate-500 hidden sm:block">
                        Showing {filteredExecutives.length} executives
                    </div>
                </div>

                <div className="table-container rounded-lg border border-slate-200 overflow-hidden">
                    <table className="w-full">
                        <thead className="bg-slate-50/50">
                            <tr>
                                <th className="py-4 pl-6 text-xs font-bold text-slate-500 uppercase tracking-wider">Company</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Name</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Contact</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider hidden md:table-cell">Role</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider hidden lg:table-cell">Username</th>
                                <th className="py-4 pr-6 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-slate-100 bg-white">
                            {loading ? (
                                <tr>
                                    <td colSpan="6" className="text-center py-12 text-slate-500">
                                        <div className="flex justify-center items-center gap-2">
                                            <span className="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-600"></span> Loading...
                                        </div>
                                    </td>
                                </tr>
                            ) : filteredExecutives.length > 0 ? (
                                filteredExecutives.map((ex) => (
                                    <tr key={ex.UserRegistration_id || ex.username} className="hover:bg-slate-50/80 transition-colors duration-150">
                                        <td className="py-4 pl-6 text-slate-600 font-medium">{ex.CompanyName}</td>
                                        <td className="py-4 text-slate-800 font-semibold">
                                            {ex.Name}
                                            <div className="text-xs text-slate-500 font-normal">{ex.Designation || 'No Designation'}</div>
                                        </td>
                                        <td className="py-4 text-slate-600">
                                            <div className="text-sm">{ex.Phone}</div>
                                            <div className="text-xs text-slate-400">{ex.City}, {ex.State}</div>
                                        </td>
                                        <td className="py-4 hidden md:table-cell">
                                            <span className={`px-2 py-1 rounded text-xs font-medium 
                                                ${ex.UserType == '5' ? 'bg-purple-100 text-purple-700' :
                                                    ex.UserType == '4' ? 'bg-blue-100 text-blue-700' : 'bg-slate-100 text-slate-600'}`}>
                                                {getUserRole(ex.UserType)}
                                            </span>
                                        </td>
                                        <td className="py-4 text-slate-600 hidden lg:table-cell font-mono text-sm">{ex.username}</td>
                                        <td className="py-4 pr-6 text-right">
                                            <div className="flex justify-end gap-2">
                                                <button
                                                    onClick={() => toggleStatus(ex.username, ex.Status)}
                                                    className={`p-2 rounded-full transition-all ${ex.Status === '1' ? 'text-emerald-500 hover:bg-emerald-50' : 'text-slate-400 hover:bg-slate-100'}`}
                                                    title={ex.Status === '1' ? 'Disable Account' : 'Enable Account'}
                                                >
                                                    {ex.Status === '1' ? <UserCheck size={18} /> : <UserX size={18} />}
                                                </button>
                                                <button
                                                    onClick={() => navigate(`/executives/profile/${ex.username}`)}
                                                    className="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-full transition-all"
                                                    title="Edit Permissions"
                                                >
                                                    {/* Using Edit icon for now, could be a separate permissions icon */}
                                                    <Edit size={18} />
                                                </button>
                                                <button
                                                    onClick={() => confirmDelete(ex.username)}
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
                                    <td colSpan="6" className="text-center py-12 text-slate-400 italic">
                                        No executives found.
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>

            {showDeleteModal && (
                <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm transition-opacity">
                    <div className="bg-white rounded-xl shadow-2xl w-full max-w-sm overflow-hidden transform transition-all scale-100 animate-in fade-in zoom-in duration-200">
                        <div className="p-6 text-center">
                            <div className="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <AlertTriangle className="text-red-500" size={24} />
                            </div>
                            <h3 className="text-lg font-bold text-slate-900 mb-2">Delete Executive?</h3>
                            <p className="text-slate-500 text-sm mb-6">Are you sure? This action cannot be undone and will remove all associated access.</p>
                            <div className="flex gap-3 justify-center">
                                <button onClick={() => setShowDeleteModal(false)} className="btn hover:bg-slate-100 w-full">Cancel</button>
                                <button onClick={executeDelete} className="btn btn-danger w-full shadow-lg shadow-red-500/30">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            )}
        </div>
    );
};

export default ExecutiveList;
