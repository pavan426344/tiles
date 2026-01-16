import React, { useEffect, useState } from 'react';
import api from '../api';
import { Plus, Edit, Trash2, X, Search, AlertCircle, CheckCircle, AlertTriangle } from 'lucide-react';

const States = () => {
    const [stateList, setStateList] = useState([]);
    const [loading, setLoading] = useState(true);
    const [showModal, setShowModal] = useState(false);
    const [showDeleteModal, setShowDeleteModal] = useState(false);
    const [deleteId, setDeleteId] = useState(null);
    const [formData, setFormData] = useState({ stateName: '', stateCode: '', id: null });
    const [error, setError] = useState('');
    const [successMsg, setSuccessMsg] = useState('');
    const [searchQuery, setSearchQuery] = useState('');

    const fetchStates = async () => {
        try {
            setLoading(true);
            const res = await api.get('/states');
            setStateList(Array.isArray(res.data) ? res.data : []);
        } catch (err) {
            console.error(err);
            setError('Failed to fetch states.');
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchStates();
    }, []);

    const filteredStates = stateList.filter(state =>
        state.T_State_Name?.toLowerCase().includes(searchQuery.toLowerCase()) ||
        state.T_State_Code?.toLowerCase().includes(searchQuery.toLowerCase())
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
            await api.delete(`/states/${deleteId}`);
            setSuccessMsg('State deleted successfully.');
            fetchStates();
            setTimeout(() => setSuccessMsg(''), 3000);
            setShowDeleteModal(false);
        } catch (err) {
            const msg = err.response?.data?.error || 'Error deleting state. It may be used in MRP, User Registration, or Dealer tables.';
            setError(msg);
            setTimeout(() => setError(''), 5000);
            setShowDeleteModal(false);
        }
    };

    const openModal = (state = null) => {
        setError('');
        if (state) {
            setFormData({
                stateName: state.T_State_Name,
                stateCode: state.T_State_Code || '',
                id: state.T_State_Id
            });
        } else {
            setFormData({ stateName: '', stateCode: '', id: null });
        }
        setShowModal(true);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        try {
            const payload = {
                stateName: formData.stateName,
                stateCode: formData.stateCode
            };

            if (formData.id) {
                await api.put(`/states/${formData.id}`, payload);
                setSuccessMsg('State updated successfully.');
            } else {
                await api.post('/states', payload);
                setSuccessMsg('State created successfully.');
            }
            setShowModal(false);
            fetchStates();
            setTimeout(() => setSuccessMsg(''), 3000);
        } catch (err) {
            const msg = err.response?.data?.error || 'Error saving state.';
            setError(msg);
        }
    };

    return (
        <div className="p-6 max-w-7xl mx-auto space-y-6">
            <div className="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 className="text-3xl font-bold text-slate-800 tracking-tight">State Master</h1>
                    <p className="text-slate-500 mt-1">Manage states and codes.</p>
                </div>
                <button
                    onClick={() => openModal()}
                    className="btn btn-primary shadow-lg shadow-blue-500/30 flex items-center gap-2 transform transition hover:scale-105"
                >
                    <Plus size={20} />
                    <span>Add New State</span>
                </button>
            </div>

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

            <div className="card border-0 shadow-xl ring-1 ring-slate-900/5 bg-white/50 backdrop-blur-sm">
                <div className="flex items-center justify-between mb-6">
                    <div className="relative w-full max-w-md">
                        <Search className="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" size={18} />
                        <input
                            type="text"
                            placeholder="Search states..."
                            className="pl-10 input w-full bg-white/80"
                            value={searchQuery}
                            onChange={(e) => setSearchQuery(e.target.value)}
                        />
                    </div>
                    <div className="text-sm text-slate-500 hidden sm:block">
                        Showing {filteredStates.length} results
                    </div>
                </div>

                <div className="table-container rounded-lg border border-slate-200 overflow-hidden">
                    <table className="w-full">
                        <thead className="bg-slate-50/50">
                            <tr>
                                <th className="py-4 pl-6 text-xs font-bold text-slate-500 uppercase tracking-wider">State Name</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">State Code</th>
                                <th className="py-4 pr-6 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-slate-100 bg-white">
                            {loading ? (
                                <tr>
                                    <td colSpan="3" className="text-center py-12 text-slate-500">
                                        <div className="flex justify-center items-center gap-2">
                                            <span className="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-600"></span> Loading...
                                        </div>
                                    </td>
                                </tr>
                            ) : filteredStates.length > 0 ? (
                                filteredStates.map((state) => (
                                    <tr key={state.T_State_Id} className="hover:bg-slate-50/80 transition-colors duration-150">
                                        <td className="py-4 pl-6 text-slate-800 font-semibold">{state.T_State_Name}</td>
                                        <td className="py-4 text-slate-600">{state.T_State_Code}</td>
                                        <td className="py-4 pr-6 text-right">
                                            <div className="flex justify-end gap-2">
                                                <button
                                                    onClick={() => openModal(state)}
                                                    className="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-full transition-all"
                                                    title="Edit"
                                                >
                                                    <Edit size={18} />
                                                </button>
                                                <button
                                                    onClick={() => confirmDelete(state.T_State_Id)}
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
                                        No states found.
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>

            {showModal && (
                <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm transition-opacity">
                    <div className="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all scale-100 animate-in fade-in zoom-in duration-200">
                        <div className="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                            <h3 className="text-lg font-bold text-slate-800">
                                {formData.id ? 'Edit State' : 'Add New State'}
                            </h3>
                            <button onClick={() => setShowModal(false)} className="text-slate-400 hover:text-slate-600">
                                <X size={20} />
                            </button>
                        </div>
                        <form onSubmit={handleSubmit} className="p-6 space-y-4">
                            <div>
                                <label className="block text-sm font-medium text-slate-700 mb-1">
                                    State Name <span className="text-red-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    className="input w-full focus:ring-2 focus:ring-blue-100"
                                    value={formData.stateName}
                                    onChange={(e) => setFormData({ ...formData, stateName: e.target.value })}
                                    required
                                    autoFocus
                                />
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700 mb-1">
                                    State Code
                                </label>
                                <input
                                    type="text"
                                    className="input w-full focus:ring-2 focus:ring-blue-100"
                                    value={formData.stateCode}
                                    onChange={(e) => setFormData({ ...formData, stateCode: e.target.value })}
                                />
                            </div>
                            <div className="pt-2 flex gap-3">
                                <button type="button" onClick={() => setShowModal(false)} className="flex-1 btn hover:bg-slate-100">Cancel</button>
                                <button type="submit" className="flex-1 btn btn-primary shadow-lg shadow-blue-500/20">{formData.id ? 'Save Changes' : 'Create State'}</button>
                            </div>
                        </form>
                    </div>
                </div>
            )}

            {showDeleteModal && (
                <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm transition-opacity">
                    <div className="bg-white rounded-xl shadow-2xl w-full max-w-sm overflow-hidden transform transition-all scale-100 animate-in fade-in zoom-in duration-200">
                        <div className="p-6 text-center">
                            <div className="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <AlertTriangle className="text-red-500" size={24} />
                            </div>
                            <h3 className="text-lg font-bold text-slate-900 mb-2">Delete State?</h3>
                            <p className="text-slate-500 text-sm mb-6">Are you sure? This action cannot be undone.</p>
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

export default States;
