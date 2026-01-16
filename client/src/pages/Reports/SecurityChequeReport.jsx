import React, { useEffect, useState } from 'react';
import api from '../../api';
import { ShieldCheck, Search } from 'lucide-react';

const SecurityChequeReport = () => {
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(false);
    const [filters, setFilters] = useState({ state: '', executive: '', all: false });

    const handleSearch = async (e) => {
        e.preventDefault();
        setLoading(true);
        try {
            // Mock API call based on filters
            const res = await api.get('/reports/security-cheque', { params: filters });
            setData(res.data);
        } catch (err) {
            console.error(err);
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="p-6">
            <h1 className="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <ShieldCheck className="text-green-600" /> Available Security Cheque Report
            </h1>

            <div className="card bg-white p-6 rounded-xl shadow-sm border border-gray-200 mb-6">
                <form onSubmit={handleSearch} className="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    <div>
                        <label className="block text-sm font-medium text-gray-700 mb-1">State</label>
                        <select
                            className="w-full border-gray-300 rounded-lg shadow-sm"
                            value={filters.state}
                            onChange={(e) => setFilters({ ...filters, state: e.target.value })}
                        >
                            <option value="">-- Select State --</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            // Add other states
                        </select>
                    </div>
                    <div>
                        <label className="block text-sm font-medium text-gray-700 mb-1">Executive</label>
                        <input
                            type="text"
                            className="w-full border-gray-300 rounded-lg shadow-sm"
                            value={filters.executive}
                            onChange={(e) => setFilters({ ...filters, executive: e.target.value })}
                            placeholder="Executive Name"
                        />
                    </div>
                    <div className="flex items-center gap-2 mb-2">
                        <input
                            type="checkbox"
                            id="all"
                            checked={filters.all}
                            onChange={(e) => setFilters({ ...filters, all: e.target.checked })}
                            className="rounded text-blue-600 focus:ring-blue-500"
                        />
                        <label htmlFor="all" className="text-sm font-medium text-gray-700">All Data</label>
                    </div>
                    <button type="submit" className="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        <Search size={18} className="inline mr-2" /> Search
                    </button>
                </form>
            </div>

            <div className="card overflow-hidden bg-white shadow-sm rounded-xl border border-gray-200">
                {loading ? (
                    <div className="p-8 text-center text-gray-500">Loading...</div>
                ) : (
                    <div className="overflow-x-auto">
                        <table className="w-full text-sm text-left">
                            <thead className="text-xs uppercase bg-gray-50 text-gray-500">
                                <tr>
                                    <th className="px-6 py-3">Dealer Name</th>
                                    <th className="px-6 py-3">City</th>
                                    <th className="px-6 py-3">State</th>
                                    <th className="px-6 py-3">Executive</th>
                                    <th className="px-6 py-3">Cheque Amount</th>
                                    <th className="px-6 py-3">Bank</th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-100">
                                {data.map((row, idx) => (
                                    <tr key={idx} className="hover:bg-gray-50">
                                        <td className="px-6 py-4 font-medium text-gray-900">{row.Dealer_Name}</td>
                                        <td className="px-6 py-4">{row.City}</td>
                                        <td className="px-6 py-4">{row.State}</td>
                                        <td className="px-6 py-4">{row.executive}</td>
                                        <td className="px-6 py-4">{row.Amount}</td>
                                        <td className="px-6 py-4">{row.Bank}</td>
                                    </tr>
                                ))}
                                {data.length === 0 && (
                                    <tr>
                                        <td colSpan="6" className="px-6 py-12 text-center text-gray-500">
                                            No stored cheques found.
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

export default SecurityChequeReport;
