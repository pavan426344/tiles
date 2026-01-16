import React, { useState, useEffect } from 'react';
import { Plus, Trash2, Save, ShoppingCart, User, MapPin, Calculator, FileText, Calendar, Box } from 'lucide-react';
import api from '../api';
import { useNavigate } from 'react-router-dom';

const NewDo = () => {
    const navigate = useNavigate();
    const [isLoading, setIsLoading] = useState(false);
    const [dealers, setDealers] = useState([]);
    const [seriesList, setSeriesList] = useState([]);

    // Form State
    const [formData, setFormData] = useState({
        dealerId: '',
        dealerAddress: '', // Auto-filled
        dealerTin: '',     // Auto-filled
        dealerCst: '',     // Auto-filled
        center: '',        // Auto-filled
        transport: '',     // Auto-filled
        remarks: '',
        date: new Date().toISOString().split('T')[0],
        items: [
            { id: 1, series: '', design: '', grade: 'Premium', boxes: '', packs: 0, rate: '', amount: 0 }
        ]
    });

    const [grandTotal, setGrandTotal] = useState(0);

    // Fetch initial data
    useEffect(() => {
        const fetchInitialData = async () => {
            try {
                const [dealerRes, seriesRes] = await Promise.all([
                    api.get('/dealers'),
                    api.get('/series') // Assuming /series endpoint exists or similar
                ]);
                setDealers(Array.isArray(dealerRes.data) ? dealerRes.data : []);
                setSeriesList(Array.isArray(seriesRes.data) ? seriesRes.data : []);
            } catch (error) {
                console.error("Failed to load initial data", error);
            }
        };
        fetchInitialData();
    }, []);

    // Recalculate Grand Total whenever items change
    useEffect(() => {
        const total = formData.items.reduce((sum, item) => sum + (parseFloat(item.amount) || 0), 0);
        setGrandTotal(total);
    }, [formData.items]);

    const handleDealerChange = (e) => {
        const selectedId = e.target.value;
        const selectedDealer = dealers.find(d => d.Dealer_Id.toString() === selectedId);

        setFormData(prev => ({
            ...prev,
            dealerId: selectedId,
            dealerAddress: selectedDealer ? selectedDealer.Address : '',
            dealerTin: selectedDealer ? selectedDealer.TIN : '',
            dealerCst: selectedDealer ? selectedDealer.CST : '',
            transport: selectedDealer ? selectedDealer.Transport : '',
            center: selectedDealer ? selectedDealer.Centre : '' // Assuming 'Centre' field exists
        }));
    };

    const handleItemChange = (id, field, value) => {
        const newItems = formData.items.map(item => {
            if (item.id === id) {
                const updatedItem = { ...item, [field]: value };

                // Auto-calculate logic
                if (field === 'boxes' || field === 'rate') {
                    const boxes = parseFloat(field === 'boxes' ? value : item.boxes) || 0;
                    const rate = parseFloat(field === 'rate' ? value : item.rate) || 0;
                    // Assuming Amount = Boxes * Rate for now (or Packs * Rate depending on business logic)
                    // Legacy code suggests amount calculation happens on server or JS. 
                    // Let's assume Amount = Boxes * Rate based on standard DO practice.
                    updatedItem.amount = (boxes * rate).toFixed(2);

                    // Mock Pack Calculation (Legacy had ajax_pack.php)
                    // For now, let's just say 1 Box = 1 Pack approx, or just leave it equal for simplicity 
                    // until specific conversion logic is provided.
                    updatedItem.packs = boxes;
                }

                return updatedItem;
            }
            return item;
        });
        setFormData(prev => ({ ...prev, items: newItems }));
    };

    const addItemRow = () => {
        setFormData(prev => ({
            ...prev,
            items: [
                ...prev.items,
                {
                    id: Date.now(), // simple unique id
                    series: '',
                    design: '',
                    grade: 'Premium',
                    boxes: '',
                    packs: 0,
                    rate: '',
                    amount: 0
                }
            ]
        }));
    };

    const removeItemRow = (id) => {
        if (formData.items.length === 1) return; // Prevent removing last row
        setFormData(prev => ({
            ...prev,
            items: prev.items.filter(item => item.id !== id)
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setIsLoading(true);
        try {
            await api.post('/orders/do', formData);
            // Show success notification or redirect
            navigate('/orders/pending'); // Redirect to pending orders
        } catch (error) {
            console.error("Submission failed", error);
            // Handle error state
        } finally {
            setIsLoading(false);
        }
    };

    return (
        <div className="min-h-screen bg-slate-50/50 p-6 space-y-8 animate-fade-in">
            {/* Header */}
            <div className="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 className="text-3xl font-bold text-slate-800 tracking-tight flex items-center gap-2">
                        <ShoppingCart className="text-blue-600" size={32} />
                        New Delivery Order
                    </h1>
                    <p className="text-slate-500 mt-1">Create a new sales order for dealers.</p>
                </div>
                <div className="flex items-center gap-3">
                    <div className="bg-white px-4 py-2 rounded-lg border shadow-sm text-sm">
                        <span className="text-slate-500">Date:</span>
                        <span className="ml-2 font-medium text-slate-700">{formData.date}</span>
                    </div>
                </div>
            </div>

            <form onSubmit={handleSubmit} className="space-y-8">

                {/* Dealer Section */}
                <div className="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div className="px-6 py-4 border-b border-slate-100 bg-slate-50/50 flex items-center gap-2">
                        <User className="text-blue-500" size={20} />
                        <h2 className="font-semibold text-slate-800">Dealer Information</h2>
                    </div>
                    <div className="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div className="md:col-span-1">
                            <label className="block text-xs font-semibold uppercase text-slate-500 mb-1.5">Select Dealer</label>
                            <select
                                className="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all text-sm"
                                value={formData.dealerId}
                                onChange={handleDealerChange}
                                required
                            >
                                <option value="">-- Choose Dealer --</option>
                                {dealers.map(d => (
                                    <option key={d.Dealer_Id} value={d.Dealer_Id}>{d.Dealer_Name}</option>
                                ))}
                            </select>
                        </div>

                        {/* Auto-populated Fields */}
                        <div className="md:col-span-2 grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div className="p-3 bg-slate-50 rounded-lg border border-slate-100">
                                <span className="block text-xs text-slate-400 uppercase">Center</span>
                                <span className="block font-medium text-slate-700 truncate">{formData.center || '-'}</span>
                            </div>
                            <div className="p-3 bg-slate-50 rounded-lg border border-slate-100">
                                <span className="block text-xs text-slate-400 uppercase">TIN No.</span>
                                <span className="block font-medium text-slate-700 truncate">{formData.dealerTin || '-'}</span>
                            </div>
                            <div className="p-3 bg-slate-50 rounded-lg border border-slate-100">
                                <span className="block text-xs text-slate-400 uppercase">CST No.</span>
                                <span className="block font-medium text-slate-700 truncate">{formData.dealerCst || '-'}</span>
                            </div>
                            <div className="p-3 bg-slate-50 rounded-lg border border-slate-100">
                                <span className="block text-xs text-slate-400 uppercase">Transport</span>
                                <span className="block font-medium text-slate-700 truncate">{formData.transport || '-'}</span>
                            </div>
                        </div>

                        <div className="md:col-span-3">
                            <label className="block text-xs font-semibold uppercase text-slate-500 mb-1.5">Delivery Address</label>
                            <div className="relative">
                                <MapPin className="absolute left-3 top-3 text-slate-400" size={18} />
                                <textarea
                                    readOnly
                                    className="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-600 text-sm resize-none"
                                    rows="2"
                                    value={formData.dealerAddress}
                                    placeholder="Address will populate on dealer selection"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                {/* Order Items Section */}
                <div className="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div className="px-6 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
                        <div className="flex items-center gap-2">
                            <Box className="text-blue-500" size={20} />
                            <h2 className="font-semibold text-slate-800">Order Items</h2>
                        </div>
                        <button
                            type="button"
                            onClick={addItemRow}
                            className="text-sm font-medium text-blue-600 hover:text-blue-700 flex items-center gap-1 px-3 py-1.5 rounded-md hover:bg-blue-50 transition-colors"
                        >
                            <Plus size={16} /> Add Item
                        </button>
                    </div>

                    <div className="overflow-x-auto">
                        <table className="w-full text-left text-sm">
                            <thead className="bg-slate-50 text-slate-500 border-b border-slate-200">
                                <tr>
                                    <th className="px-4 py-3 font-semibold w-12">#</th>
                                    <th className="px-4 py-3 font-semibold min-w-[150px]">Series</th>
                                    <th className="px-4 py-3 font-semibold min-w-[150px]">Design</th>
                                    <th className="px-4 py-3 font-semibold w-32">Grade</th>
                                    <th className="px-4 py-3 font-semibold w-24">Boxes</th>
                                    <th className="px-4 py-3 font-semibold w-24">Packs</th>
                                    <th className="px-4 py-3 font-semibold w-28">Rate</th>
                                    <th className="px-4 py-3 font-semibold w-32 text-right">Amount</th>
                                    <th className="px-4 py-3 w-12"></th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-slate-100">
                                {formData.items.map((item, index) => (
                                    <tr key={item.id} className="hover:bg-slate-50/80 transition-colors group">
                                        <td className="px-4 py-3 font-medium text-slate-400">{index + 1}</td>
                                        <td className="px-4 py-3">
                                            <input
                                                type="text"
                                                className="w-full bg-transparent border-none focus:ring-0 p-0 text-slate-700 placeholder:text-slate-300 font-medium"
                                                placeholder="Search Series"
                                                value={item.series}
                                                onChange={(e) => handleItemChange(item.id, 'series', e.target.value)}
                                                list={`series-list-${item.id}`} // Suggestion list
                                            />
                                        </td>
                                        <td className="px-4 py-3">
                                            <input
                                                type="text"
                                                className="w-full bg-transparent border-none focus:ring-0 p-0 text-slate-700 placeholder:text-slate-300"
                                                placeholder="Design Name"
                                                value={item.design}
                                                onChange={(e) => handleItemChange(item.id, 'design', e.target.value)}
                                            />
                                        </td>
                                        <td className="px-4 py-3">
                                            <select
                                                className="w-full bg-transparent border-none focus:ring-0 p-0 text-slate-700"
                                                value={item.grade}
                                                onChange={(e) => handleItemChange(item.id, 'grade', e.target.value)}
                                            >
                                                <option>Premium</option>
                                                <option>Standard</option>
                                                <option>Commercial</option>
                                            </select>
                                        </td>
                                        <td className="px-4 py-3">
                                            <input
                                                type="number"
                                                className="w-full bg-slate-50 border border-slate-200 rounded px-2 py-1 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all font-medium text-blue-600"
                                                placeholder="0"
                                                value={item.boxes}
                                                onChange={(e) => handleItemChange(item.id, 'boxes', e.target.value)}
                                            />
                                        </td>
                                        <td className="px-4 py-3">
                                            <input
                                                readOnly
                                                type="number"
                                                className="w-full bg-transparent border-none text-center text-slate-500"
                                                value={item.packs}
                                            />
                                        </td>
                                        <td className="px-4 py-3">
                                            <div className="flex items-center">
                                                <span className="text-slate-400 mr-1">₹</span>
                                                <input
                                                    type="number"
                                                    className="w-full bg-transparent border-none focus:ring-0 p-0 text-right font-medium"
                                                    placeholder="0.00"
                                                    value={item.rate}
                                                    onChange={(e) => handleItemChange(item.id, 'rate', e.target.value)}
                                                />
                                            </div>
                                        </td>
                                        <td className="px-4 py-3 text-right font-bold text-slate-700">
                                            ₹{item.amount || '0.00'}
                                        </td>
                                        <td className="px-4 py-3 text-center">
                                            <button
                                                type="button"
                                                onClick={() => removeItemRow(item.id)}
                                                className="text-slate-300 hover:text-red-500 transition-colors opacity-0 group-hover:opacity-100"
                                                title="Remove Item"
                                            >
                                                <Trash2 size={18} />
                                            </button>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                            <tfoot className="bg-slate-50 border-t border-slate-200">
                                <tr>
                                    <td colSpan="7" className="px-4 py-4 text-right font-semibold text-slate-600">Grand Total:</td>
                                    <td className="px-4 py-4 text-right font-bold text-xl text-blue-600">
                                        ₹{grandTotal.toLocaleString('en-IN', { minimumFractionDigits: 2 })}
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                {/* Additional Info / Footer */}
                <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label className="block text-xs font-semibold uppercase text-slate-500 mb-2">Remarks</label>
                        <textarea
                            className="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all text-sm resize-none"
                            rows="3"
                            placeholder="Any special instructions..."
                            value={formData.remarks}
                            onChange={(e) => setFormData(prev => ({ ...prev, remarks: e.target.value }))}
                        />
                    </div>
                    <div className="flex items-end justify-end">
                        <div className="flex gap-4">
                            <button
                                type="button"
                                onClick={() => navigate('/orders/pending')}
                                className="px-6 py-2.5 rounded-lg border border-slate-300 text-slate-600 font-medium hover:bg-slate-50 transition-colors"
                            >
                                Cancel
                            </button>
                            <button
                                type="submit"
                                disabled={isLoading}
                                className="px-8 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 active:bg-blue-800 transition-all shadow-lg shadow-blue-500/30 flex items-center gap-2"
                            >
                                {isLoading ? (
                                    <span>Saving...</span>
                                ) : (
                                    <>
                                        <Save size={18} /> Submit Order
                                    </>
                                )}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    );
};

export default NewDo;
