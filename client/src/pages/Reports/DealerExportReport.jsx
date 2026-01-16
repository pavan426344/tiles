import React, { useEffect, useState } from 'react';
import api from '../../api';
import { Download } from 'lucide-react';

const DealerExportReport = () => {
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const res = await api.get('/reports/dealer-export');
                setData(res.data);
            } catch (err) {
                console.error(err);
            } finally {
                setLoading(false);
            }
        };
        fetchData();
    }, []);

    const handleExport = () => {
        // Mock export functionality
        alert("Exporting dealer data to Excel...");
    };

    return (
        <div className="p-6">
            <div className="flex justify-between items-center mb-6">
                <h1 className="text-2xl font-bold text-gray-800 flex items-center gap-2">
                    <Download className="text-purple-600" /> Dealer Export Report
                </h1>
                <button
                    onClick={handleExport}
                    className="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition"
                >
                    Download Excel
                </button>
            </div>

            <div className="card overflow-hidden bg-white shadow-sm rounded-xl border border-gray-200">
                {loading ? (
                    <div className="p-8 text-center text-gray-500">Loading...</div>
                ) : (
                    <div className="overflow-x-auto">
                        <table className="w-full text-sm text-left whitespace-nowrap">
                            <thead className="text-xs uppercase bg-gray-50 text-gray-500">
                                <tr>
                                    <th className="px-6 py-3">Company Name</th>
                                    <th className="px-6 py-3">Center</th>
                                    <th className="px-6 py-3">Contact Person</th>
                                    <th className="px-6 py-3">Address</th>
                                    <th className="px-6 py-3">City</th>
                                    <th className="px-6 py-3">State</th>
                                    <th className="px-6 py-3">Phone/Mobile</th>
                                    <th className="px-6 py-3">Email</th>
                                    <th className="px-6 py-3">TIN/CST/PAN</th>
                                    <th className="px-6 py-3">Turnover</th>
                                    <th className="px-6 py-3">Dealership</th>
                                    <th className="px-6 py-3">Executive</th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-100">
                                {data.map((row, idx) => (
                                    <tr key={idx} className="hover:bg-gray-50">
                                        <td className="px-6 py-4 font-medium text-gray-900">{row.CompanyName}</td>
                                        <td className="px-6 py-4">{row.centre}</td>
                                        <td className="px-6 py-4">{row.Name}</td>
                                        <td className="px-6 py-4 max-w-xs truncate" title={row.Address}>{row.Address}</td>
                                        <td className="px-6 py-4">{row.City}</td>
                                        <td className="px-6 py-4">{row.State}</td>
                                        <td className="px-6 py-4">{row.Mobile}</td>
                                        <td className="px-6 py-4">{row.Email}</td>
                                        <td className="px-6 py-4">
                                            <div className="text-xs">
                                                <div>TIN: {row.TIN}</div>
                                                <div>PAN: {row.PAN}</div>
                                            </div>
                                        </td>
                                        <td className="px-6 py-4">{row.AnnualTurnover}</td>
                                        <td className="px-6 py-4">{row.Dealership}</td>
                                        <td className="px-6 py-4">{row.executive}</td>
                                    </tr>
                                ))}
                                {data.length === 0 && (
                                    <tr>
                                        <td colSpan="12" className="px-6 py-12 text-center text-gray-500">
                                            No dealer data found.
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

export default DealerExportReport;
