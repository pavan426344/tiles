import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import api from '../../api';
import { Plus, Edit, Trash2, Search, AlertTriangle, CheckCircle, Briefcase } from 'lucide-react';

const DealerList = () => {
    const navigate = useNavigate();
    const [dealers, setDealers] = useState([]);
    const [loading, setLoading] = useState(true);
    const [searchQuery, setSearchQuery] = useState('');
    const [error, setError] = useState('');
    const [successMsg, setSuccessMsg] = useState('');
    const [showDeleteModal, setShowDeleteModal] = useState(false);
    const [selectedId, setSelectedId] = useState(null);

    const fetchDealers = async () => {
        try {
            setLoading(true);
            const res = await api.get('/dealers');
            setDealers(Array.isArray(res.data) ? res.data : []);
        } catch (err) {
            console.error(err);
            setError('Failed to fetch dealer list.');
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchDealers();
    }, []);

    const confirmDelete = (id) => {
        setSelectedId(id);
        setShowDeleteModal(true);
    };

    const executeDelete = async () => {
        if (!selectedId) return;
        try {
            await api.delete(`/dealers/${selectedId}`);
            setSuccessMsg('Dealer deleted successfully.');
            fetchDealers();
            setTimeout(() => setSuccessMsg(''), 3000);
        } catch (err) {
            setError('Failed to delete dealer.');
            setTimeout(() => setError(''), 3000);
        } finally {
            setShowDeleteModal(false);
            setSelectedId(null);
        }
    };

    const filteredDealers = dealers.filter(d =>
        d.CompanyName?.toLowerCase().includes(searchQuery.toLowerCase()) ||
        d.Name?.toLowerCase().includes(searchQuery.toLowerCase()) ||
        d.Phone?.includes(searchQuery) ||
        d.City?.toLowerCase().includes(searchQuery.toLowerCase())
    );

    return (
        <div className="p-6 max-w-7xl mx-auto space-y-6">
            <div className="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 className="text-3xl font-bold text-slate-800 tracking-tight">Dealer List</h1>
                    <p className="text-slate-500 mt-1">Manage dealer accounts and assignments.</p>
                </div>
                <div className="flex gap-2">
                    <button
                        onClick={() => navigate('/dealers/assign-executive')}
                        className="btn bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 flex items-center gap-2"
                    >
                        <Briefcase size={18} />
                        <span>Reassign Executives</span>
                    </button>
                    <button
                        onClick={() => navigate('/dealers/new')}
                        className="btn btn-primary shadow-lg shadow-blue-500/30 flex items-center gap-2"
                    >
                        <Plus size={20} />
                        <span>New Dealer</span>
                    </button>
                </div>
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
                            placeholder="Search by company, name, city..."
                            className="pl-10 input w-full bg-white/80"
                            value={searchQuery}
                            onChange={(e) => setSearchQuery(e.target.value)}
                        />
                    </div>
                </div>

                <div className="table-container rounded-lg border border-slate-200 overflow-hidden">
                    <table className="w-full">
                        <thead className="bg-slate-50/50">
                            <tr>
                                <th className="py-4 pl-6 text-xs font-bold text-slate-500 uppercase tracking-wider">Company Name</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Owner Name</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Location</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Contact</th>
                                <th className="py-4 pr-6 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-slate-100 bg-white">
                            {loading ? (
                                <tr>
                                    <td colSpan="5" className="text-center py-12 text-slate-500">
                                        <div className="flex justify-center items-center gap-2">
                                            <span className="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-600"></span> Loading...
                                        </div>
                                    </td>
                                </tr>
                            ) : filteredDealers.length > 0 ? (
                                filteredDealers.map((d) => (
                                    <tr key={d.Dealer_id} className="hover:bg-slate-50/80 transition-colors duration-150">
                                        <td className="py-4 pl-6 text-slate-800 font-semibold">
                                            {d.CompanyName}
                                        </td>
                                        <td className="py-4 text-slate-700">
                                            {d.Name}
                                        </td>
                                        <td className="py-4 text-slate-600">
                                            <div className="text-sm">{d.City}</div>
                                            <div className="text-xs text-slate-400">{d.State}</div>
                                        </td>
                                        <td className="py-4 text-slate-600 font-mono text-sm">
                                            {d.Phone}
                                        </td>
                                        <td className="py-4 pr-6 text-right">
                                            <div className="flex justify-end gap-2">
                                                <button
                                                    onClick={() => navigate(`/dealers/edit/${d.Dealer_id}`)}
                                                    className="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-full transition-all"
                                                    title="Edit"
                                                >
                                                    <Edit size={18} />
                                                </button>
                                                <button
                                                    onClick={() => confirmDelete(d.Dealer_id)}
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
                                    <td colSpan="5" className="text-center py-12 text-slate-400 italic">
                                        No dealers found.
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>

            {showDeleteModal && (
                <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm">
                    <div className="bg-white rounded-xl shadow-2xl w-full max-w-sm overflow-hidden animate-in fade-in zoom-in duration-200">
                        <div className="p-6 text-center">
                            <div className="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <AlertTriangle className="text-red-500" size={24} />
                            </div>
                            <h3 className="text-lg font-bold text-slate-900 mb-2">Delete Dealer?</h3>
                            <p className="text-slate-500 text-sm mb-6">Are you sure you want to delete this dealer? This might affect associated orders.</p>
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

export default DealerList;
