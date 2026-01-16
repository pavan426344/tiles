import React, { useEffect, useState } from 'react';
import { TrendingUp, TrendingDown, Minus, Activity, IndianRupee, Users, Layers, ShoppingBag, Eye, RefreshCw } from 'lucide-react';
import api from '../api';

// --- Sub Components ---

const DashboardStats = ({ stats }) => {
    const getIcon = (label) => {
        const lower = label.toLowerCase();
        if (lower.includes('income')) return IndianRupee;
        if (lower.includes('traffic')) return Activity;
        if (lower.includes('processes')) return Layers;
        if (lower.includes('orders')) return ShoppingBag;
        if (lower.includes('active')) return Users;
        return Activity;
    };

    const getColorClass = (color) => {
        const colors = {
            blue: 'bg-blue-50 text-blue-600',
            purple: 'bg-purple-50 text-purple-600',
            green: 'bg-emerald-50 text-emerald-600',
            orange: 'bg-orange-50 text-orange-600',
            pink: 'bg-pink-50 text-pink-600'
        };
        return colors[color] || colors.blue;
    };

    return (
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
            {stats.map((stat, index) => {
                const Icon = getIcon(stat.label);
                return (
                    <div key={index} className="bg-white rounded-xl shadow-sm border border-slate-100 p-4 transition-all hover:shadow-md">
                        <div className="flex justify-between items-start mb-2">
                            <div className={`p-2 rounded-lg ${getColorClass(stat.color)}`}>
                                <Icon size={20} />
                            </div>
                            {stat.trend === 'up' && <TrendingUp size={16} className="text-emerald-500" />}
                            {stat.trend === 'down' && <TrendingDown size={16} className="text-red-500" />}
                            {stat.trend === 'neutral' && <Minus size={16} className="text-slate-400" />}
                        </div>
                        <div>
                            <p className="text-xs font-medium text-slate-500 uppercase tracking-wide">{stat.label}</p>
                            <h3 className="text-xl font-bold text-slate-800 mt-1">{stat.value}</h3>
                        </div>
                        {/* Simulated Sparkline Bar */}
                        <div className="flex gap-0.5 mt-3 h-1.5 items-end opacity-60">
                            {Array.from({ length: 8 }).map((_, i) => (
                                <div
                                    key={i}
                                    className={`w-full rounded-sm ${getColorClass(stat.color).split(' ')[1].replace('text-', 'bg-')}`}
                                    style={{ height: `${Math.random() * 80 + 20}%` }}
                                ></div>
                            ))}
                        </div>
                    </div>
                );
            })}
        </div>
    );
};

const DashboardTable = ({ title, subTitle, data, color = 'blue' }) => {
    return (
        <div className="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden mb-6 animate-fade-in-up">
            <div className="px-6 py-4 border-b border-slate-50 flex justify-between items-center bg-slate-50/50">
                <div>
                    <h2 className="text-lg font-bold text-slate-800">{title}</h2>
                    {subTitle && <p className="text-xs text-slate-500 uppercase tracking-wider">{subTitle}</p>}
                </div>
                <div className={`px-3 py-1 rounded-full text-xs font-medium bg-${color}-50 text-${color}-600 border border-${color}-100`}>
                    {data.length} Records
                </div>
            </div>

            <div className="overflow-x-auto">
                <table className="w-full text-left border-collapse">
                    <thead>
                        <tr className="bg-slate-50/80 text-slate-500 text-xs uppercase tracking-wider">
                            <th className="p-4 font-semibold border-b border-slate-100">DO No.</th>
                            <th className="p-4 font-semibold border-b border-slate-100">Date</th>
                            <th className="p-4 font-semibold border-b border-slate-100">Dealer Name</th>
                            <th className="p-4 font-semibold border-b border-slate-100">Party Center</th>
                            <th className="p-4 font-semibold border-b border-slate-100">Contact</th>
                            <th className="p-4 font-semibold border-b border-slate-100 text-center">Box</th>
                            <th className="p-4 font-semibold border-b border-slate-100 text-right">Amount</th>
                            <th className="p-4 font-semibold border-b border-slate-100">Executive</th>
                            <th className="p-4 font-semibold border-b border-slate-100">Brand</th>
                            <th className="p-4 font-semibold border-b border-slate-100 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody className="divide-y divide-slate-50 text-sm">
                        {data.length > 0 ? (
                            data.map((row, index) => (
                                <tr key={index} className="hover:bg-slate-50 transition-colors duration-150 group">
                                    <td className="p-4 font-medium text-blue-600">
                                        <a href="#" className="hover:underline">{row.doid}</a>
                                    </td>
                                    <td className="p-4 text-slate-600 whitespace-nowrap">{row.dodate}</td>
                                    <td className="p-4 text-slate-800 font-medium">{row.Dealer_Name}</td>
                                    <td className="p-4 text-slate-600">{row.centre}</td>
                                    <td className="p-4 text-slate-600">
                                        <div className="flex flex-col">
                                            <span>{row.Name}</span>
                                            <span className="text-xs text-slate-400">{row.Mobile}</span>
                                        </div>
                                    </td>
                                    <td className="p-4 text-center font-semibold text-slate-700">{row.Totalbox}</td>
                                    <td className="p-4 text-right font-mono text-slate-700">{row.roundoff}</td>
                                    <td className="p-4 text-slate-600">
                                        <div className="flex items-center gap-2">
                                            <div className="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center text-xs font-bold text-slate-500">
                                                {row.executive.charAt(0)}
                                            </div>
                                            {row.executive}
                                        </div>
                                    </td>
                                    <td className="p-4 text-slate-600">
                                        <span className="px-2 py-1 rounded text-xs bg-slate-100 text-slate-600 font-medium">
                                            {row.CompanyName}
                                        </span>
                                    </td>
                                    <td className="p-4 text-center">
                                        <button className="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-full transition-all opacity-0 group-hover:opacity-100">
                                            <Eye size={18} />
                                        </button>
                                    </td>
                                </tr>
                            ))
                        ) : (
                            <tr>
                                <td colSpan="10" className="p-8 text-center text-slate-400 italic">
                                    No records found for this category.
                                </td>
                            </tr>
                        )}
                    </tbody>
                </table>
            </div>
        </div>
    );
};

// --- Main Page Component ---

const Dashboard = () => {
    const [stats, setStats] = useState([]);
    const [loading, setLoading] = useState(true);
    const [tables, setTables] = useState({
        pending: [],
        approved: [],
        rejected: [],
        sales: []
    });

    // Simulate User Type for Demo (Change this to 1, 4, 7, 8 to test different views)
    // 1 = Admin, 4 = Executive, 7 = Sales, 8 = Manager (approximate mapping)
    const [userType, setUserType] = useState(1);

    const fetchData = async () => {
        setLoading(true);
        try {
            // Fetch Stats
            const statsRes = await api.get('/dashboard/stats');
            setStats(statsRes.data || []);

            // Fetch Tables based on logic
            const [pendingRes, approvedRes, rejectedRes, salesRes] = await Promise.all([
                api.get('/orders/pending'),
                api.get('/orders/approved'),
                api.get('/orders/rejected'),
                api.get('/orders/sales')
            ]);

            setTables({
                pending: pendingRes.data || [],
                approved: approvedRes.data || [],
                rejected: rejectedRes.data || [],
                sales: salesRes.data || []
            });

        } catch (error) {
            console.error("Error fetching dashboard data:", error);
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchData();
    }, []);

    // Render Logic based on User Type (mirroring home.php)
    const renderTables = () => {
        if (loading) {
            return (
                <div className="flex justify-center items-center py-20">
                    <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
                </div>
            );
        }

        // Admin (Type 1) & Standard View (Type 4/Others) often see similar sets in legacy, 
        // tailored by their user ID. Here we show the structure.
        if (userType === 1 || userType === 4) {
            return (
                <>
                    <DashboardTable
                        title="Pending Orders"
                        subTitle="For Approval"
                        data={tables.pending}
                        color="orange"
                    />
                    <DashboardTable
                        title="Approved Orders"
                        subTitle="Ready for Dispatch"
                        data={tables.approved}
                        color="emerald"
                    />
                    <DashboardTable
                        title="Rejected Orders"
                        subTitle="Action Required"
                        data={tables.rejected}
                        color="red"
                    />
                </>
            );
        }

        // Sales View (Type 7)
        if (userType === 7) {
            return (
                <DashboardTable
                    title="Sales Orders"
                    subTitle="Confirmed Sales"
                    data={tables.sales}
                    color="blue"
                />
            );
        }

        // Manager View (Type 8) - Shows Pending only in legacy code snippet
        if (userType === 8) {
            return (
                <DashboardTable
                    title="Pending Orders"
                    subTitle="For Approval"
                    data={tables.pending}
                    color="orange"
                />
            );
        }

        // Default Fallback
        return (
            <div className="text-center py-10 text-slate-500">
                Unknown User Type Configuration
            </div>
        );
    };

    return (
        <div className="p-6 max-w-7xl mx-auto space-y-8">
            <div className="flex justify-between items-center">
                <div>
                    <h1 className="text-3xl font-bold text-slate-800 tracking-tight">Dashboard Overview</h1>
                    <p className="text-slate-500 mt-1">Welcome back, here's what's happening today.</p>
                </div>
                <div className="flex items-center gap-4">
                    {/* Demo User Switcher - Remove in Production */}
                    <select
                        value={userType}
                        onChange={(e) => setUserType(Number(e.target.value))}
                        className="select select-sm border-slate-300 rounded-lg text-xs"
                    >
                        <option value={1}>View: Admin (Type 1)</option>
                        <option value={4}>View: Standard (Type 4)</option>
                        <option value={7}>View: Sales (Type 7)</option>
                        <option value={8}>View: Manager (Type 8)</option>
                    </select>

                    <button
                        onClick={fetchData}
                        className="p-2 hover:bg-slate-100 rounded-full transition-colors text-slate-500"
                        title="Refresh Data"
                    >
                        <RefreshCw size={20} className={loading ? 'animate-spin' : ''} />
                    </button>
                </div>
            </div>

            {/* Top Stats Cards */}
            <DashboardStats stats={stats} />

            {/* Main Content Area */}
            <div className="animate-fade-in">
                {renderTables()}
            </div>
        </div>
    );
};

export default Dashboard;
