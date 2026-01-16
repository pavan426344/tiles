import React, { useEffect, useState } from 'react';
import api from '../../api';
import { Truck, CheckCircle } from 'lucide-react';

const DispatchOrder = () => {
    const [orders, setOrders] = useState([]);
    const [loading, setLoading] = useState(true);

    const fetchOrders = async () => {
        try {
            const res = await api.get('/orders?status=Dispatch');
            setOrders(res.data);
        } catch (err) {
            console.error(err);
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchOrders();
    }, []);

    const handleStatusUpdate = async (id, newStatus) => {
        if (!window.confirm(`Mark this order as ${newStatus}?`)) return;
        try {
            await api.put(`/orders/${id}/status`, { status: newStatus });
            fetchOrders();
        } catch (err) {
            alert('Error updating status');
        }
    };

    return (
        <div className="p-6">
            <h1 className="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <Truck className="text-blue-600" /> Dispatch Orders
            </h1>

            <div className="card overflow-hidden bg-white shadow-sm rounded-xl border border-gray-200">
                {loading ? (
                    <div className="p-8 text-center text-gray-500">Loading...</div>
                ) : (
                    <div className="overflow-x-auto">
                        <table className="w-full text-sm text-left">
                            <thead className="text-xs uppercase bg-gray-50 text-gray-500">
                                <tr>
                                    <th className="px-6 py-3">Sr. No.</th>
                                    <th className="px-6 py-3">DO No.</th>
                                    <th className="px-6 py-3">Date</th>
                                    <th className="px-6 py-3">Dealer Name</th>
                                    <th className="px-6 py-3">Party Center</th>
                                    <th className="px-6 py-3">Contact Person</th>
                                    <th className="px-6 py-3">Contact No.</th>
                                    <th className="px-6 py-3">Total Box</th>
                                    <th className="px-6 py-3 text-right">Total Amount</th>
                                    <th className="px-6 py-3">Executive</th>
                                    <th className="px-6 py-3">Brand</th>
                                    <th className="px-6 py-3 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-100">
                                {orders.map((order, index) => (
                                    <tr key={order.Order_Id || index} className="hover:bg-gray-50">
                                        <td className="px-6 py-4">{index + 1}</td>
                                        <td className="px-6 py-4 font-medium text-blue-600 cursor-pointer hover:underline">
                                            {order.doid || order.Order_No}
                                        </td>
                                        <td className="px-6 py-4">{order.dodate || order.Order_Date}</td>
                                        <td className="px-6 py-4">{order.Dealer_Name}</td>
                                        <td className="px-6 py-4">{order.dealer_centre || '-'}</td>
                                        <td className="px-6 py-4">{order.dealer_contact_person || '-'}</td>
                                        <td className="px-6 py-4">{order.dealer_mobile || '-'}</td>
                                        <td className="px-6 py-4 text-center">{order.Totalbox || 0}</td>
                                        <td className="px-6 py-4 text-right">{order.roundoff || order.Total_Amount || 0}</td>
                                        <td className="px-6 py-4">{order.executive || '-'}</td>
                                        <td className="px-6 py-4">{order.CompanyName || '-'}</td>
                                        <td className="px-6 py-4 text-right">
                                            <button
                                                onClick={() => handleStatusUpdate(order.Order_Id, 'Sales')}
                                                className="inline-flex items-center gap-1 text-xs bg-emerald-600 text-white px-3 py-1.5 rounded-lg hover:bg-emerald-700 transition-colors shadow-sm"
                                            >
                                                <CheckCircle size={14} /> Convert to Sales
                                            </button>
                                        </td>
                                    </tr>
                                ))}
                                {orders.length === 0 && (
                                    <tr>
                                        <td colSpan="12" className="px-6 py-12 text-center text-gray-500">
                                            No orders in dispatch.
                                        </td>
                                    </tr>
                                )}
                            </tbody>
                        </table>
                    </div>
                )}
            </div>
        </div>
    );
};

export default DispatchOrder;
