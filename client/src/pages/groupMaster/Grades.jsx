import React, { useEffect, useState } from 'react';
import api from '../../api';
import { Plus, Edit, Trash2, X, Search, AlertCircle, CheckCircle, AlertTriangle } from 'lucide-react';

const Grades = () => {
    const [gradeList, setGradeList] = useState([]);
    const [loading, setLoading] = useState(true);
    const [showModal, setShowModal] = useState(false);
    const [showDeleteModal, setShowDeleteModal] = useState(false);
    const [deleteId, setDeleteId] = useState(null);
    const [formData, setFormData] = useState({
        companyName: '',
        gradeName: '',
        seqNo: '',
        id: null
    });
    const [error, setError] = useState('');
    const [successMsg, setSuccessMsg] = useState('');
    const [searchQuery, setSearchQuery] = useState('');

    const fetchGrades = async () => {
        try {
            setLoading(true);
            const res = await api.get('/grades');
            setGradeList(Array.isArray(res.data) ? res.data : []);
        } catch (err) {
            console.error(err);
            setError('Failed to fetch grades.');
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchGrades();
    }, []);

    const filteredGrades = gradeList.filter(grade =>
        grade.T_Grade_Name?.toLowerCase().includes(searchQuery.toLowerCase()) ||
        grade.T_Company_Name?.toLowerCase().includes(searchQuery.toLowerCase())
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
            await api.delete(`/grades/${deleteId}`);
            setSuccessMsg('Grade deleted successfully.');
            fetchGrades();
            setTimeout(() => setSuccessMsg(''), 3000);
            setShowDeleteModal(false);
        } catch (err) {
            const msg = err.response?.data?.error || 'Error deleting grade. It may be used in another table.';
            setError(msg);
            setTimeout(() => setError(''), 5000);
            setShowDeleteModal(false);
        }
    };

    const openModal = (grade = null) => {
        setError('');
        if (grade) {
            setFormData({
                companyName: grade.T_Company_Name || '',
                gradeName: grade.T_Grade_Name,
                seqNo: grade.T_Grade_Seq_No || '',
                id: grade.T_Grade_Id
            });
        } else {
            setFormData({ companyName: '', gradeName: '', seqNo: '', id: null });
        }
        setShowModal(true);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        try {
            const payload = {
                companyName: formData.companyName,
                gradeName: formData.gradeName,
                seqNo: formData.seqNo
            };

            if (formData.id) {
                await api.put(`/grades/${formData.id}`, payload);
                setSuccessMsg('Grade updated successfully.');
            } else {
                await api.post('/grades', payload);
                setSuccessMsg('Grade created successfully.');
            }
            setShowModal(false);
            fetchGrades();
            setTimeout(() => setSuccessMsg(''), 3000);
        } catch (err) {
            const msg = err.response?.data?.error || 'Error saving grade.';
            setError(msg);
        }
    };

    return (
        <div className="p-6 max-w-7xl mx-auto space-y-6">
            <div className="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 className="text-3xl font-bold text-slate-800 tracking-tight">Grade Master</h1>
                    <p className="text-slate-500 mt-1">Manage product grades and sequencing.</p>
                </div>
                <button
                    onClick={() => openModal()}
                    className="btn btn-primary shadow-lg shadow-blue-500/30 flex items-center gap-2 transform transition hover:scale-105"
                >
                    <Plus size={20} />
                    <span>Add New Grade</span>
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
                            placeholder="Search grades..."
                            className="pl-10 input w-full bg-white/80"
                            value={searchQuery}
                            onChange={(e) => setSearchQuery(e.target.value)}
                        />
                    </div>
                    <div className="text-sm text-slate-500 hidden sm:block">
                        Showing {filteredGrades.length} results
                    </div>
                </div>

                <div className="table-container rounded-lg border border-slate-200 overflow-hidden">
                    <table className="w-full">
                        <thead className="bg-slate-50/50">
                            <tr>
                                <th className="py-4 pl-6 text-xs font-bold text-slate-500 uppercase tracking-wider">Company Name</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Grade Name</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Seq No.</th>
                                <th className="py-4 pr-6 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-slate-100 bg-white">
                            {loading ? (
                                <tr>
                                    <td colSpan="4" className="text-center py-12 text-slate-500">
                                        <div className="flex justify-center items-center gap-2">
                                            <span className="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-600"></span> Loading...
                                        </div>
                                    </td>
                                </tr>
                            ) : filteredGrades.length > 0 ? (
                                filteredGrades.map((grade) => (
                                    <tr key={grade.T_Grade_Id} className="hover:bg-slate-50/80 transition-colors duration-150">
                                        <td className="py-4 pl-6 text-slate-600">{grade.T_Company_Name}</td>
                                        <td className="py-4 text-slate-800 font-semibold">{grade.T_Grade_Name}</td>
                                        <td className="py-4 text-slate-600">{grade.T_Grade_Seq_No}</td>
                                        <td className="py-4 pr-6 text-right">
                                            <div className="flex justify-end gap-2">
                                                <button
                                                    onClick={() => openModal(grade)}
                                                    className="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-full transition-all"
                                                    title="Edit"
                                                >
                                                    <Edit size={18} />
                                                </button>
                                                <button
                                                    onClick={() => confirmDelete(grade.T_Grade_Id)}
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
                                    <td colSpan="4" className="text-center py-12 text-slate-400 italic">
                                        No grades found.
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
                                {formData.id ? 'Edit Grade' : 'Add New Grade'}
                            </h3>
                            <button onClick={() => setShowModal(false)} className="text-slate-400 hover:text-slate-600">
                                <X size={20} />
                            </button>
                        </div>
                        <form onSubmit={handleSubmit} className="p-6 space-y-4">
                            <div>
                                <label className="block text-sm font-medium text-slate-700 mb-1">
                                    Company Name
                                </label>
                                <input
                                    type="text"
                                    className="input w-full focus:ring-2 focus:ring-blue-100"
                                    value={formData.companyName}
                                    onChange={(e) => setFormData({ ...formData, companyName: e.target.value })}
                                />
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700 mb-1">
                                    Grade Name <span className="text-red-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    className="input w-full focus:ring-2 focus:ring-blue-100"
                                    value={formData.gradeName}
                                    onChange={(e) => setFormData({ ...formData, gradeName: e.target.value })}
                                    required
                                />
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700 mb-1">
                                    Sequence No.
                                </label>
                                <input
                                    type="number"
                                    className="input w-full focus:ring-2 focus:ring-blue-100"
                                    value={formData.seqNo}
                                    onChange={(e) => setFormData({ ...formData, seqNo: e.target.value })}
                                />
                            </div>
                            <div className="pt-2 flex gap-3">
                                <button type="button" onClick={() => setShowModal(false)} className="flex-1 btn hover:bg-slate-100">Cancel</button>
                                <button type="submit" className="flex-1 btn btn-primary shadow-lg shadow-blue-500/20">{formData.id ? 'Save Changes' : 'Create Grade'}</button>
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
                            <h3 className="text-lg font-bold text-slate-900 mb-2">Delete Grade?</h3>
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

export default Grades;
