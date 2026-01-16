import React, { useEffect, useState } from 'react';
import api from '../../api';
import { TrendingUp, Search, Filter } from 'lucide-react';

const SalesReport = () => {
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(false); // Start false as we wait for search
    const [filters, setFilters] = useState({
        searchType: '',
        state: '',
        soNo: '',
        dateFrom: '',
        dateTo: '',
        dealer: '',
        executive: '',
        tin: ''
    });

    const handleSearch = async (e) => {
        if (e) e.preventDefault();
        setLoading(true);
        try {
            // Build query params
            const params = new URLSearchParams();
            if (filters.state) params.append('state', filters.state);
            if (filters.soNo) params.append('so_no', filters.soNo);
            if (filters.dateFrom) params.append('date_from', filters.dateFrom);
            if (filters.dateTo) params.append('date_to', filters.dateTo);
            if (filters.dealer) params.append('dealer', filters.dealer);
            if (filters.executive) params.append('executive', filters.executive);
            if (filters.tin) params.append('tin', filters.tin);

            const res = await api.get(`/reports/sales?${params.toString()}`);
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
                <TrendingUp className="text-blue-600" /> Sales Report
            </h1>

            {/* Filters Section */}
            <div className="card bg-white p-6 rounded-xl shadow-sm border border-gray-200 mb-6">
                <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label className="block text-sm font-medium text-gray-700 mb-1">Search Type</label>
                        <select
                            className="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            value={filters.searchType}
                            onChange={(e) => setFilters({ ...filters, searchType: e.target.value })}
                        >
                            <option value="">-- Select Report Type --</option>
                            <option value="state">By State</option>
                            <option value="soNo">By Sales Order No</option>
                            <option value="date">By Date</option>
                            <option value="dealer">By Dealer</option>
                            <option value="executive">By Executive</option>
                            <option value="tin">By TIN</option>
                        </select>
                    </div>

                    {/* Dynamic Filters based on Selection */}
                    {filters.searchType === 'state' && (
                        <div>
                            <label className="block text-sm font-medium text-gray-700 mb-1">State</label>
                            <select
                                className="w-full border-gray-300 rounded-lg shadow-sm"
                                value={filters.state}
                                onChange={(e) => setFilters({ ...filters, state: e.target.value })}
                            >
                                <option value="">Select State</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                            </select>
                        </div>
                    )}

                    {filters.searchType === 'soNo' && (
                        <div>
                            <label className="block text-sm font-medium text-gray-700 mb-1">Sales Order No</label>
                            <input
                                type="text"
                                className="w-full border-gray-300 rounded-lg shadow-sm"
                                value={filters.soNo}
                                onChange={(e) => setFilters({ ...filters, soNo: e.target.value })}
                            />
                        </div>
                    )}

                    {filters.searchType === 'date' && (
                        <>
                            <div>
                                <label className="block text-sm font-medium text-gray-700 mb-1">From Date</label>
                                <input
                                    type="date"
                                    className="w-full border-gray-300 rounded-lg shadow-sm"
                                    value={filters.dateFrom}
                                    onChange={(e) => setFilters({ ...filters, dateFrom: e.target.value })}
                                />
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-gray-700 mb-1">To Date</label>
                                <input
                                    type="date"
                                    className="w-full border-gray-300 rounded-lg shadow-sm"
                                    value={filters.dateTo}
                                    onChange={(e) => setFilters({ ...filters, dateTo: e.target.value })}
                                />
                            </div>
                        </>
                    )}

                    {filters.searchType === 'dealer' && (
                        <div>
                            <label className="block text-sm font-medium text-gray-700 mb-1">Dealer Name</label>
                            <input
                                type="text"
                                className="w-full border-gray-300 rounded-lg shadow-sm"
                                value={filters.dealer}
                                onChange={(e) => setFilters({ ...filters, dealer: e.target.value })}
                                placeholder="Search dealer..."
                            />
                        </div>
                    )}
                </div>

                <div className="flex justify-end">
                    <button
                        onClick={handleSearch}
                        className="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2"
                    >
                        <Search size={18} /> Generate Report
                    </button>
                </div>
            </div>

            <div className="card overflow-hidden bg-white shadow-sm rounded-xl border border-gray-200">
                {loading ? (
                    <div className="p-8 text-center text-gray-500">Loading Report Data...</div>
                ) : (
                    <div className="overflow-x-auto">
                        <table className="w-full text-sm text-left">
                            <thead className="text-xs uppercase bg-gray-50 text-gray-500">
                                <tr>
                                    <th className="px-6 py-3">Sr. No.</th>
                                    <th className="px-6 py-3">SO No.</th>
                                    <th className="px-6 py-3">DO Date</th>
                                    <th className="px-6 py-3">Dealer Name</th>
                                    <th className="px-6 py-3">Party Center</th>
                                    <th className="px-6 py-3">Contact Person</th>
                                    <th className="px-6 py-3">Contact No</th>
                                    <th className="px-6 py-3 text-center">Total Box</th>
                                    <th className="px-6 py-3 text-right">Total Amount</th>
                                    <th className="px-6 py-3">Executive</th>
                                    <th className="px-6 py-3">SO Date</th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-100">
                                {data.map((row, idx) => (
                                    <tr key={idx} className="hover:bg-gray-50">
                                        <td className="px-6 py-4">{idx + 1}</td>
                                        <td className="px-6 py-4 font-medium text-blue-600">{row.doid}</td>
                                        <td className="px-6 py-4">{row.Date}</td>
                                        <td className="px-6 py-4">{row.Dealer_Name}</td>
                                        <td className="px-6 py-4">{row.centre || '-'}</td>
                                        <td className="px-6 py-4">{row.Name || '-'}</td>
                                        <td className="px-6 py-4">{row.Mobile || '-'}</td>
                                        <td className="px-6 py-4 text-center">{row.Totalbox}</td>
                                        <td className="px-6 py-4 text-right">{row.roundoff}</td>
                                        <td className="px-6 py-4">{row.User_id}</td>
                                        <td className="px-6 py-4">{row.sodate}</td>
                                    </tr>
                                ))}
                                {data.length === 0 && (
                                    <tr>
                                        <td colSpan="11" className="px-6 py-12 text-center text-gray-500">
                                            No sales orders found. Adjust filters to search.
                                        </td>
                                    </tr>
                                )}
                            </tbody>
                            <tfoot className="bg-gray-50 font-bold">
                                <tr>
                                    <td colSpan={7} className="px-6 py-3 text-right">Total:</td>
                                    <td className="px-6 py-3 text-center">
                                        {data.reduce((sum, row) => sum + (parseInt(row.Totalbox) || 0), 0)} Boxes
                                    </td>
                                    <td className="px-6 py-3 text-right">
                                        Rs. {data.reduce((sum, row) => sum + (parseFloat(row.roundoff) || 0), 0).toFixed(2)}
                                    </td>
                                    <td colSpan={2}></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                )}
            </div>
        </div>
    );
};

export default SalesReport;
