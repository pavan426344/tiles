import React, { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import api from '../../api';
import { Save, AlertCircle, CheckCircle, Shield, ArrowLeft } from 'lucide-react';

const ProfileSettings = () => {
    const { id } = useParams(); // Executive ID/Username
    const navigate = useNavigate();
    const [executives, setExecutives] = useState([]);
    const [selectedExecutive, setSelectedExecutive] = useState(id || '');
    const [permissions, setPermissions] = useState({
        group_master: '0',
        item_master: '0',
        production_master: '0',
        state_master: '0',
        mrp_master: '0',
        executive_master: '0',
        dealer_master: '0',
        order_entry: '0',
        report_master: '0',
        edit_po: '0',
        approve_po: '0',
        reject_po: '0',
        delete_po: '0',
        confirm_po: '0',
        packing_list: '0',
        edit_approve_do: '0',
        view_order: '0'
    });
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState('');
    const [successMsg, setSuccessMsg] = useState('');

    useEffect(() => {
        const fetchExecutives = async () => {
            try {
                const res = await api.get('/executives');
                setExecutives(Array.isArray(res.data) ? res.data : []);
            } catch (err) {
                console.error("Failed to fetch executives", err);
            }
        };
        fetchExecutives();
    }, []);

    useEffect(() => {
        if (selectedExecutive) {
            fetchPermissions(selectedExecutive);
        }
    }, [selectedExecutive]);

    const fetchPermissions = async (execId) => {
        try {
            setLoading(true);
            const res = await api.get(`/permissions/${execId}`);
            if (res.data) {
                // Map backend response key names to state keys if different
                // Assuming backend returns object with same keys as PHP logic
                setPermissions({
                    group_master: res.data.group_master || '0',
                    item_master: res.data.item_master || '0',
                    production_master: res.data.pro_master || '0',
                    state_master: res.data.state_master || '0',
                    mrp_master: res.data.mrp_master || '0',
                    executive_master: res.data.exe_master || '0',
                    dealer_master: res.data.dealer_master || '0',
                    order_entry: res.data.new_order || '0',
                    report_master: res.data.report_master || '0',
                    edit_po: res.data.edit_po || '0',
                    approve_po: res.data.approve_po || '0',
                    reject_po: res.data.reject_po || '0',
                    delete_po: res.data.delete_po || '0',
                    confirm_po: res.data.confirm_po || '0',
                    packing_list: res.data.packing_list || '0',
                    edit_approve_do: res.data.edit_approve_order || '0',
                    view_order: res.data.view_order || '0'
                });
            }
        } catch (err) {
            // If 404, valid case where no permissions set yet, defaults apply
            if (err.response?.status !== 404) {
                setError('Failed to fetch permissions.');
            }
        } finally {
            setLoading(false);
        }
    };

    const handlePermissionChange = (key, value) => {
        setPermissions(prev => ({ ...prev, [key]: value }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        setSuccessMsg('');
        setLoading(true);

        try {
            await api.post(`/permissions/${selectedExecutive}`, permissions);
            setSuccessMsg('Permissions updated successfully.');
            window.scrollTo(0, 0);
        } catch (err) {
            setError(err.response?.data?.error || 'Error updating permissions.');
        } finally {
            setLoading(false);
        }
    };

    const PermissionRow = ({ label, pKey }) => (
        <div className="flex items-center justify-between py-3 border-b hover:bg-slate-50 transition p-2 rounded">
            <span className="text-slate-700 font-medium">{label}</span>
            <div className="flex gap-4">
                <label className="flex items-center gap-2 cursor-pointer">
                    <input
                        type="radio"
                        name={pKey}
                        checked={permissions[pKey] === '1'}
                        onChange={() => handlePermissionChange(pKey, '1')}
                        className="radio radio-success radio-sm"
                    />
                    <span className="text-sm">Yes</span>
                </label>
                <label className="flex items-center gap-2 cursor-pointer">
                    <input
                        type="radio"
                        name={pKey}
                        checked={permissions[pKey] === '0'}
                        onChange={() => handlePermissionChange(pKey, '0')}
                        className="radio radio-sm"
                    />
                    <span className="text-sm text-slate-500">No</span>
                </label>
            </div>
        </div>
    );

    return (
        <div className="p-6 max-w-4xl mx-auto space-y-6">
            <div className="flex items-center gap-4 mb-2">
                <button
                    onClick={() => navigate('/executives/list')}
                    className="p-2 hover:bg-slate-100 rounded-full text-slate-500"
                >
                    <ArrowLeft size={20} />
                </button>
                <div>
                    <h1 className="text-3xl font-bold text-slate-800 tracking-tight">Permission Settings</h1>
                    <p className="text-slate-500 mt-1">Configure access rights for executives.</p>
                </div>
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

            <div className="card bg-white shadow-xl ring-1 ring-slate-900/5 p-8 rounded-xl">
                <div className="mb-8">
                    <label className="label font-bold text-slate-700 mb-2 block">Select Executive</label>
                    <div className="relative">
                        <input
                            list="exec-list"
                            className="input w-full max-w-md text-lg"
                            placeholder="Type to search executive..."
                            value={selectedExecutive}
                            onChange={(e) => setSelectedExecutive(e.target.value)}
                        />
                        <datalist id="exec-list">
                            {executives.map(ex => (
                                <option key={ex.username} value={ex.username}>{ex.Name} ({ex.CompanyName})</option>
                            ))}
                        </datalist>
                    </div>
                </div>

                {selectedExecutive && (
                    <form onSubmit={handleSubmit} className="animate-fade-in">
                        <div className="space-y-8">
                            <div>
                                <h3 className="text-lg font-bold text-slate-800 flex items-center gap-2 mb-4 bg-slate-50 p-3 rounded">
                                    <Shield size={20} className="text-blue-600" /> Master Data Access
                                </h3>
                                <div className="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-2">
                                    <PermissionRow label="Group Master" pKey="group_master" />
                                    <PermissionRow label="Item Master" pKey="item_master" />
                                    <PermissionRow label="Production Master" pKey="production_master" />
                                    <PermissionRow label="State Master" pKey="state_master" />
                                    <PermissionRow label="MRP Master" pKey="mrp_master" />
                                    <PermissionRow label="Executive Master" pKey="executive_master" />
                                    <PermissionRow label="Dealer Master" pKey="dealer_master" />
                                    <PermissionRow label="Report Master" pKey="report_master" />
                                </div>
                            </div>

                            <div>
                                <h3 className="text-lg font-bold text-slate-800 flex items-center gap-2 mb-4 bg-slate-50 p-3 rounded">
                                    <Shield size={20} className="text-emerald-600" /> Order Management Access
                                </h3>
                                <div className="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-2">
                                    <PermissionRow label="New Order Entry" pKey="order_entry" />
                                    <PermissionRow label="View Orders List" pKey="view_order" />
                                    <PermissionRow label="Edit Pending Order" pKey="edit_po" />
                                    <PermissionRow label="Approve Pending Order" pKey="approve_po" />
                                    <PermissionRow label="Reject Pending Order" pKey="reject_po" />
                                    <PermissionRow label="Delete Pending Order" pKey="delete_po" />
                                    <PermissionRow label="Confirm Pending Order" pKey="confirm_po" />
                                    <PermissionRow label="Packing List" pKey="packing_list" />
                                    <PermissionRow label="Edit Approved Order" pKey="edit_approve_do" />
                                </div>
                            </div>

                            <div className="pt-6 flex justify-end">
                                <button
                                    type="submit"
                                    className="btn btn-primary shadow-lg shadow-blue-500/30 flex items-center gap-2 px-8"
                                    disabled={loading}
                                >
                                    <Save size={18} />
                                    {loading ? 'Saving...' : 'Save Permissions'}
                                </button>
                            </div>
                        </div>
                    </form>
                )}

                {!selectedExecutive && (
                    <div className="py-12 text-center text-slate-400 italic">
                        Select an executive to configure permissions.
                    </div>
                )}
            </div>
        </div>
    );
};

export default ProfileSettings;
