import React, { useEffect, useState } from 'react';
import api from '../api';
import { Plus, Edit, Trash2, X, Search, AlertCircle, CheckCircle, AlertTriangle } from 'lucide-react';

const Items = () => {
    const [itemList, setItemList] = useState([]);
    const [loading, setLoading] = useState(true);
    const [showModal, setShowModal] = useState(false);
    const [showDeleteModal, setShowDeleteModal] = useState(false);
    const [deleteId, setDeleteId] = useState(null);
    const [formData, setFormData] = useState({
        company: '',
        printName: '',
        stkName: '',
        brand: '',
        type: '',
        series: '',
        hsn: '',
        id: null
    });
    const [error, setError] = useState('');
    const [successMsg, setSuccessMsg] = useState('');
    const [searchQuery, setSearchQuery] = useState('');

    const fetchItems = async () => {
        try {
            setLoading(true);
            const res = await api.get('/items');
            setItemList(Array.isArray(res.data) ? res.data : []);
        } catch (err) {
            console.error(err);
            setError('Failed to fetch items.');
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchItems();
    }, []);

    const filteredItems = itemList.filter(item =>
        item.T_Item_Stk_Name?.toLowerCase().includes(searchQuery.toLowerCase()) ||
        item.T_Print_Name?.toLowerCase().includes(searchQuery.toLowerCase())
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
            await api.delete(`/items/${deleteId}`);
            setSuccessMsg('Item deleted successfully.');
            fetchItems();
            setTimeout(() => setSuccessMsg(''), 3000);
            setShowDeleteModal(false);
        } catch (err) {
            const msg = err.response?.data?.error || 'Error deleting item.';
            setError(msg);
            setTimeout(() => setError(''), 5000);
            setShowDeleteModal(false);
        }
    };

    const openModal = (item = null) => {
        setError('');
        if (item) {
            setFormData({
                company: item.T_Company_Name || '',
                printName: item.T_Print_Name || '',
                stkName: item.T_Item_Stk_Name,
                brand: item.T_Brand || '',
                type: item.T_Product_Type || '',
                series: item.T_Main_Series || '',
                hsn: item.T_HSN_Code || '',
                id: item.T_Item_Id
            });
        } else {
            setFormData({ company: '', printName: '', stkName: '', brand: '', type: '', series: '', hsn: '', id: null });
        }
        setShowModal(true);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        try {
            const payload = {
                company: formData.company,
                printName: formData.printName,
                stkName: formData.stkName,
                brand: formData.brand,
                type: formData.type,
                series: formData.series,
                hsn: formData.hsn
            };

            if (formData.id) {
                await api.put(`/items/${formData.id}`, payload);
                setSuccessMsg('Item updated successfully.');
            } else {
                await api.post('/items', payload);
                setSuccessMsg('Item created successfully.');
            }
            setShowModal(false);
            fetchItems();
            setTimeout(() => setSuccessMsg(''), 3000);
        } catch (err) {
            const msg = err.response?.data?.error || 'Error saving item.';
            setError(msg);
        }
    };

    return (
        <div className="p-6 max-w-7xl mx-auto space-y-6">
            <div className="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 className="text-3xl font-bold text-slate-800 tracking-tight">Item Master</h1>
                    <p className="text-slate-500 mt-1">Manage product items and details.</p>
                </div>
                <button
                    onClick={() => openModal()}
                    className="btn btn-primary shadow-lg shadow-blue-500/30 flex items-center gap-2 transform transition hover:scale-105"
                >
                    <Plus size={20} />
                    <span>Add New Item</span>
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
                            placeholder="Search items..."
                            className="pl-10 input w-full bg-white/80"
                            value={searchQuery}
                            onChange={(e) => setSearchQuery(e.target.value)}
                        />
                    </div>
                    <div className="text-sm text-slate-500 hidden sm:block">
                        Showing {filteredItems.length} results
                    </div>
                </div>

                <div className="table-container rounded-lg border border-slate-200 overflow-hidden">
                    <table className="w-full">
                        <thead className="bg-slate-50/50">
                            <tr>
                                <th className="py-4 pl-6 text-xs font-bold text-slate-500 uppercase tracking-wider">Company</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Print Name</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Stk Name</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider hidden md:table-cell">Brand</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider hidden md:table-cell">Type</th>
                                <th className="py-4 text-xs font-bold text-slate-500 uppercase tracking-wider hidden lg:table-cell">Series</th>
                                <th className="py-4 pr-6 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-slate-100 bg-white">
                            {loading ? (
                                <tr>
                                    <td colSpan="7" className="text-center py-12 text-slate-500">
                                        <div className="flex justify-center items-center gap-2">
                                            <span className="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-600"></span> Loading...
                                        </div>
                                    </td>
                                </tr>
                            ) : filteredItems.length > 0 ? (
                                filteredItems.map((item) => (
                                    <tr key={item.T_Item_Id} className="hover:bg-slate-50/80 transition-colors duration-150">
                                        <td className="py-4 pl-6 text-slate-600 font-medium">{item.T_Company_Name}</td>
                                        <td className="py-4 text-slate-800">{item.T_Print_Name}</td>
                                        <td className="py-4 text-slate-600">{item.T_Item_Stk_Name}</td>
                                        <td className="py-4 text-slate-600 hidden md:table-cell">{item.T_Brand}</td>
                                        <td className="py-4 text-slate-600 hidden md:table-cell">{item.T_Product_Type}</td>
                                        <td className="py-4 text-slate-600 hidden lg:table-cell">{item.T_Main_Series}</td>
                                        <td className="py-4 pr-6 text-right">
                                            <div className="flex justify-end gap-2">
                                                <button
                                                    onClick={() => openModal(item)}
                                                    className="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-full transition-all"
                                                    title="Edit"
                                                >
                                                    <Edit size={18} />
                                                </button>
                                                <button
                                                    onClick={() => confirmDelete(item.T_Item_Id)}
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
                                    <td colSpan="7" className="text-center py-12 text-slate-400 italic">
                                        No items found.
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>

            {showModal && (
                <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm transition-opacity">
                    <div className="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden transform transition-all scale-100 animate-in fade-in zoom-in duration-200">
                        <div className="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                            <h3 className="text-lg font-bold text-slate-800">
                                {formData.id ? 'Edit Item' : 'Add New Item'}
                            </h3>
                            <button onClick={() => setShowModal(false)} className="text-slate-400 hover:text-slate-600">
                                <X size={20} />
                            </button>
                        </div>
                        <form onSubmit={handleSubmit} className="p-6 space-y-4">
                            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label className="block text-sm font-medium text-slate-700 mb-1">
                                        Company <span className="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        className="input w-full focus:ring-2 focus:ring-blue-100"
                                        value={formData.company}
                                        onChange={(e) => setFormData({ ...formData, company: e.target.value })}
                                        required
                                        autoFocus
                                    />
                                </div>
                                <div>
                                    <label className="block text-sm font-medium text-slate-700 mb-1">
                                        Brand
                                    </label>
                                    <input
                                        type="text"
                                        className="input w-full focus:ring-2 focus:ring-blue-100"
                                        value={formData.brand}
                                        onChange={(e) => setFormData({ ...formData, brand: e.target.value })}
                                    />
                                </div>
                                <div>
                                    <label className="block text-sm font-medium text-slate-700 mb-1">
                                        Print Name <span className="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        className="input w-full focus:ring-2 focus:ring-blue-100"
                                        value={formData.printName}
                                        onChange={(e) => setFormData({ ...formData, printName: e.target.value })}
                                        required
                                    />
                                </div>
                                <div>
                                    <label className="block text-sm font-medium text-slate-700 mb-1">
                                        Stock Name <span className="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        className="input w-full focus:ring-2 focus:ring-blue-100"
                                        value={formData.stkName}
                                        onChange={(e) => setFormData({ ...formData, stkName: e.target.value })}
                                        required
                                    />
                                </div>
                                <div>
                                    <label className="block text-sm font-medium text-slate-700 mb-1">
                                        Product Type
                                    </label>
                                    <input
                                        type="text"
                                        className="input w-full focus:ring-2 focus:ring-blue-100"
                                        value={formData.type}
                                        onChange={(e) => setFormData({ ...formData, type: e.target.value })}
                                    />
                                </div>
                                <div>
                                    <label className="block text-sm font-medium text-slate-700 mb-1">
                                        Main Series
                                    </label>
                                    <input
                                        type="text"
                                        className="input w-full focus:ring-2 focus:ring-blue-100"
                                        value={formData.series}
                                        onChange={(e) => setFormData({ ...formData, series: e.target.value })}
                                    />
                                </div>
                                <div>
                                    <label className="block text-sm font-medium text-slate-700 mb-1">
                                        HSN Code
                                    </label>
                                    <input
                                        type="text"
                                        className="input w-full focus:ring-2 focus:ring-blue-100"
                                        value={formData.hsn}
                                        onChange={(e) => setFormData({ ...formData, hsn: e.target.value })}
                                    />
                                </div>
                            </div>
                            <div className="pt-2 flex gap-3">
                                <button type="button" onClick={() => setShowModal(false)} className="flex-1 btn hover:bg-slate-100">Cancel</button>
                                <button type="submit" className="flex-1 btn btn-primary shadow-lg shadow-blue-500/20">{formData.id ? 'Save Changes' : 'Create Item'}</button>
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
                            <h3 className="text-lg font-bold text-slate-900 mb-2">Delete Item?</h3>
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

export default Items;
