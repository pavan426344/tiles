import React, { useEffect, useState } from 'react';
import api from '../../api';
import { Clock, Search } from 'lucide-react';

const PendingOrderReport = () => {
    const [orders, setOrders] = useState([]);
    const [designs, setDesigns] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const fetchReportData = async () => {
            try {
                // In a real scenario, you might want to fetch these in parallel or from a single "report-init" endpoint
                // For now, we assume standard API endpoints or these would need to be created.
                // Since we are mocking, we will just simulate the structure.
                const res = await api.get('/reports/pending-orders-detailed'); // Mock endpoint
                if (res.data) {
                    setOrders(res.data.orders || []);
                    setDesigns(res.data.designs || []);
                }
            } catch (err) {
                console.error(err);
            } finally {
                setLoading(false);
            }
        };
        fetchReportData();
    }, []);

    // Helper to calculate totals
    const calculateGrandTotal = () => {
        return orders.reduce((acc, order) => {
            const orderTotal = order.items.reduce((sum, item) => sum + (item.quantity || 0), 0);
            return acc + orderTotal;
        }, 0);
    };

    return (
        <div className="p-6">
            <h1 className="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <Clock className="text-yellow-600" /> Pending Order Report
            </h1>

            <div className="card overflow-hidden bg-white shadow-sm rounded-xl border border-gray-200">
                {loading ? (
                    <div className="p-8 text-center text-gray-500">Loading...</div>
                ) : (
                    <div className="overflow-x-auto">
                        <table className="w-full text-center text-xs border-collapse border border-gray-200">
                            <thead className="bg-gray-100 font-bold text-gray-700 uppercase">
                                <tr>
                                    <th className="border border-gray-300 px-2 py-2">Sr. No.</th>
                                    <th className="border border-gray-300 px-2 py-2">DO No.</th>
                                    <th className="border border-gray-300 px-2 py-2">State</th>
                                    {designs.map((design, idx) => (
                                        <th key={idx} className="border border-gray-300 px-2 py-2 min-w-[80px]">
                                            {design}
                                        </th>
                                    ))}
                                    <th className="border border-gray-300 px-2 py-2 bg-gray-200">Total</th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-200">
                                {orders.map((order, idx) => {
                                    const orderTotal = order.items.reduce((sum, item) => sum + (item.quantity || 0), 0);
                                    return (
                                        <tr key={idx} className="hover:bg-gray-50">
                                            <td className="border border-gray-300 px-2 py-2">{idx + 1}</td>
                                            <td className="border border-gray-300 px-2 py-2 font-medium text-blue-600">
                                                {order.doid}
                                            </td>
                                            <td className="border border-gray-300 px-2 py-2">{order.state || '-'}</td>
                                            {designs.map((design, dIdx) => {
                                                const item = order.items.find(i => i.design === design);
                                                return (
                                                    <td key={dIdx} className="border border-gray-300 px-2 py-2">
                                                        {item ? `${item.grade}-${item.quantity}` : ''}
                                                    </td>
                                                );
                                            })}
                                            <td className="border border-gray-300 px-2 py-2 font-bold bg-gray-50">
                                                {orderTotal}
                                            </td>
                                        </tr>
                                    );
                                })}
                                {orders.length === 0 && (
                                    <tr>
                                        <td colSpan={designs.length + 4} className="px-6 py-12 text-center text-gray-500">
                                            No pending orders found.
                                        </td>
                                    </tr>
                                )}
                            </tbody>
                            <tfoot className="bg-gray-100 font-bold">
                                <tr>
                                    <td colSpan={3} className="border border-gray-300 px-2 py-2 text-right">Grand Total:</td>
                                    {designs.map((design, idx) => {
                                        const designTotal = orders.reduce((acc, order) => {
                                            const item = order.items.find(i => i.design === design);
                                            return acc + (item ? item.quantity : 0);
                                        }, 0);
                                        return (
                                            <td key={idx} className="border border-gray-300 px-2 py-2">{designTotal > 0 ? designTotal : ''}</td>
                                        );
                                    })}
                                    <td className="border border-gray-300 px-2 py-2 text-right">{calculateGrandTotal()}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                )}
            </div>
        </div>
    );
};

export default PendingOrderReport;
