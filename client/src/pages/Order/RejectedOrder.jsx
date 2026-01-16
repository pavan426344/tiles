import React, { useEffect, useState } from 'react';
import api from '../../api';
import { XOctagon } from 'lucide-react';

const RejectedOrder = () => {
    const [orders, setOrders] = useState([]);
    const [loading, setLoading] = useState(true);

    const fetchOrders = async () => {
        try {
            const res = await api.get('/orders?status=Rejected');
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

    return (
        <div className="p-6">
            <h1 className="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <XOctagon className="text-red-600" /> Rejected Orders
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
                                    </tr>
                                ))}
                                {orders.length === 0 && (
                                    <tr>
                                        <td colSpan="11" className="px-6 py-12 text-center text-gray-500">
                                            No rejected orders found.
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

export default RejectedOrder;
