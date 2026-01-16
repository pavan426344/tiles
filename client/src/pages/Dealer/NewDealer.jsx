import React, { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import api from '../../api';
import { Save, X, AlertCircle, CheckCircle, Building, User, MapPin, CreditCard, FileText, Briefcase } from 'lucide-react';

const NewDealer = () => {
    const navigate = useNavigate();
    const { id } = useParams();
    const [loading, setLoading] = useState(false);
    const [states, setStates] = useState([]);
    const [executives, setExecutives] = useState([]);

    // Form State
    const [formData, setFormData] = useState({
        // Company Info
        companyName: '',
        centre: '',
        annualTurnover: '',
        dealership: '',

        // Contact Info
        contactPerson: '',
        email: '',
        phone: '',
        mobile: '',
        address: '',
        city: '',
        state: '',
        country: '',
        pincode: '',

        // KYC / Tax Info
        aadharNo: '',
        aadharAddress: '',
        tin: '',
        cst: '',
        gstin: '',
        pan: '',

        // Security Cheque Info
        bankName: '',
        accountName: '',
        accountNo: '',
        branch: '',
        chequeNo: '', // Maps to IFCI in PHP? Using chequeNo for clarity
        signingAuthority: '',

        // Mapped Executive
        executive: '', // username
    });

    const [error, setError] = useState('');
    const [successMsg, setSuccessMsg] = useState('');

    useEffect(() => {
        const fetchDropdowns = async () => {
            try {
                const [stateRes, execRes] = await Promise.all([
                    api.get('/states'),
                    api.get('/executives')
                ]);
                setStates(Array.isArray(stateRes.data) ? stateRes.data : []);
                setExecutives(Array.isArray(execRes.data) ? execRes.data : []);
            } catch (err) {
                console.error("Error fetching dropdowns", err);
            }
        };

        fetchDropdowns();

        if (id) {
            fetchDealerDetails(id);
        }
    }, [id]);

    const fetchDealerDetails = async (dealerId) => {
        try {
            setLoading(true);
            const res = await api.get(`/dealers/${dealerId}`);
            if (res.data) {
                const d = res.data;
                setFormData({
                    companyName: d.CompanyName || '',
                    centre: d.centre || '',
                    annualTurnover: d.AnnualTurnover || '',
                    dealership: d.Dealership || '',
                    contactPerson: d.Name || '',
                    email: d.Email || '',
                    phone: d.Phone || '',
                    mobile: d.Mobile || '',
                    address: d.Address || '',
                    city: d.City || '',
                    state: d.State || '',
                    country: d.Country || '',
                    pincode: d.Pincode || '',
                    aadharNo: d.Aadhar_no || '',
                    aadharAddress: d.Aadhar_address || '',
                    tin: d.TIN || '',
                    cst: d.CST || '',
                    gstin: d.gstin_uin || '',
                    pan: d.PAN || '',
                    bankName: d.BankName || '', // May need to fetch from dealer_security_cheque if separate
                    accountName: d.NameOfAcc || '',
                    accountNo: d.AccNo || '',
                    branch: d.Branch || '',
                    chequeNo: d.cheque_no || '',
                    signingAuthority: d.SignAuth || '',
                    executive: d.executiveusername || '' // Assuming we store mapping
                });
            }
        } catch (err) {
            setError('Failed to fetch dealer details.');
        } finally {
            setLoading(false);
        }
    };

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData(prev => ({ ...prev, [name]: value }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        setSuccessMsg('');
        setLoading(true);

        try {
            // Find selected executive to get details (replicated logic from PHP)
            const selectedExec = executives.find(ex => ex.username === formData.executive);
            const submissionData = {
                ...formData,
                executiveName: selectedExec?.Name || '',
                executiveContact: selectedExec?.Phone || '',
                executiveUsername: selectedExec?.username || ''
            };

            if (id) {
                await api.put(`/dealers/${id}`, submissionData);
                setSuccessMsg('Dealer updated successfully.');
            } else {
                await api.post('/dealers', submissionData);
                setSuccessMsg('Dealer created successfully.');
                // Optional: Reset form
            }
            window.scrollTo(0, 0);
        } catch (err) {
            setError(err.response?.data?.error || 'Error saving dealer.');
            window.scrollTo(0, 0);
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="p-6 max-w-7xl mx-auto space-y-6">
            <div className="flex items-center justify-between">
                <div>
                    <h1 className="text-3xl font-bold text-slate-800 tracking-tight">
                        {id ? 'Update Dealer' : 'New Dealer'}
                    </h1>
                    <p className="text-slate-500 mt-1">
                        {id ? 'Edit dealer details and security info.' : 'Register a new dealer.'}
                    </p>
                </div>
                <button
                    onClick={() => navigate('/dealers/list')}
                    className="btn btn-ghost hover:bg-slate-100 text-slate-600"
                >
                    <X className="mr-2" size={20} /> Cancel
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

            <form onSubmit={handleSubmit} className="card border-0 shadow-xl ring-1 ring-slate-900/5 bg-white p-8 rounded-xl space-y-8">

                {/* 1. Company Information */}
                <div>
                    <h3 className="text-lg font-semibold text-slate-800 border-b pb-2 mb-4 flex items-center gap-2">
                        <Building size={20} className="text-blue-600" /> Company Information
                    </h3>
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label className="label">Company Name <span className="text-red-500">*</span></label>
                            <input type="text" name="companyName" value={formData.companyName} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">Centre <span className="text-red-500">*</span></label>
                            <input type="text" name="centre" value={formData.centre} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">Contact Person <span className="text-red-500">*</span></label>
                            <input type="text" name="contactPerson" value={formData.contactPerson} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">Annual Turnover</label>
                            <input type="text" name="annualTurnover" value={formData.annualTurnover} onChange={handleChange} className="input w-full" />
                        </div>
                        <div>
                            <label className="label">Dealership Details</label>
                            <input type="text" name="dealership" value={formData.dealership} onChange={handleChange} className="input w-full" placeholder="e.g. Premium" />
                        </div>
                        <div>
                            <label className="label">Assign Executive</label>
                            <input
                                type="text"
                                list="execs"
                                name="executive"
                                value={formData.executive}
                                onChange={handleChange}
                                className="input w-full"
                                placeholder="Search executive..."
                            />
                            <datalist id="execs">
                                {executives.map(ex => (
                                    <option key={ex.username} value={ex.username}>{ex.Name} ({ex.CompanyName})</option>
                                ))}
                            </datalist>
                        </div>
                    </div>
                </div>

                {/* 2. Contact & Address */}
                <div>
                    <h3 className="text-lg font-semibold text-slate-800 border-b pb-2 mb-4 flex items-center gap-2">
                        <MapPin size={20} className="text-blue-600" /> Contact & Address
                    </h3>
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div className="md:col-span-2">
                            <label className="label">Address <span className="text-red-500">*</span></label>
                            <textarea name="address" value={formData.address} onChange={handleChange} className="input w-full h-12 pt-2" required />
                        </div>
                        <div>
                            <label className="label">City <span className="text-red-500">*</span></label>
                            <input type="text" name="city" value={formData.city} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">State <span className="text-red-500">*</span></label>
                            <select name="state" value={formData.state} onChange={handleChange} className="input w-full" required>
                                <option value="">Select State</option>
                                {states.map(s => <option key={s.T_State_Id} value={s.T_State_Name}>{s.T_State_Name}</option>)}
                            </select>
                        </div>
                        <div>
                            <label className="label">Country <span className="text-red-500">*</span></label>
                            <input type="text" name="country" value={formData.country} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">Pincode <span className="text-red-500">*</span></label>
                            <input type="text" name="pincode" value={formData.pincode} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">Email <span className="text-red-500">*</span></label>
                            <input type="email" name="email" value={formData.email} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">Phone <span className="text-red-500">*</span></label>
                            <input type="text" name="phone" value={formData.phone} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">Mobile <span className="text-red-500">*</span></label>
                            <input type="text" name="mobile" value={formData.mobile} onChange={handleChange} className="input w-full" required />
                        </div>
                    </div>
                </div>

                {/* 3. KYC & Tax Info */}
                <div>
                    <h3 className="text-lg font-semibold text-slate-800 border-b pb-2 mb-4 flex items-center gap-2">
                        <FileText size={20} className="text-blue-600" /> KYC & Tax Information
                    </h3>
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label className="label">Aadhar No. <span className="text-red-500">*</span></label>
                            <input type="text" name="aadharNo" value={formData.aadharNo} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div className="md:col-span-2">
                            <label className="label">Aadhar Address <span className="text-red-500">*</span></label>
                            <input type="text" name="aadharAddress" value={formData.aadharAddress} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">TIN <span className="text-red-500">*</span></label>
                            <input type="text" name="tin" value={formData.tin} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">CST <span className="text-red-500">*</span></label>
                            <input type="text" name="cst" value={formData.cst} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">GSTIN / UIN <span className="text-red-500">*</span></label>
                            <input type="text" name="gstin" value={formData.gstin} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">PAN <span className="text-red-500">*</span></label>
                            <input type="text" name="pan" value={formData.pan} onChange={handleChange} className="input w-full" required />
                        </div>
                    </div>
                </div>

                {/* 4. Security Cheque Details */}
                <div>
                    <h3 className="text-lg font-semibold text-slate-800 border-b pb-2 mb-4 flex items-center gap-2">
                        <CreditCard size={20} className="text-blue-600" /> Security Cheque Details
                    </h3>
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label className="label">Bank Name <span className="text-red-500">*</span></label>
                            <input type="text" name="bankName" value={formData.bankName} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">Account Name <span className="text-red-500">*</span></label>
                            <input type="text" name="accountName" value={formData.accountName} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">Account No. <span className="text-red-500">*</span></label>
                            <input type="text" name="accountNo" value={formData.accountNo} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">Branch <span className="text-red-500">*</span></label>
                            <input type="text" name="branch" value={formData.branch} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">Cheque No. <span className="text-red-500">*</span></label>
                            <input type="text" name="chequeNo" value={formData.chequeNo} onChange={handleChange} className="input w-full" required />
                        </div>
                        <div>
                            <label className="label">Signing Authority</label>
                            <input type="text" name="signingAuthority" value={formData.signingAuthority} onChange={handleChange} className="input w-full" />
                        </div>
                    </div>
                </div>

                <div className="pt-6 border-t flex gap-4 justify-end">
                    <button
                        type="button"
                        onClick={() => navigate('/dealers/list')}
                        className="btn hover:bg-slate-100"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        className="btn btn-primary shadow-lg shadow-blue-500/30 flex items-center gap-2"
                        disabled={loading}
                    >
                        <Save size={18} />
                        {loading ? 'Saving...' : (id ? 'Update Dealer' : 'Register Dealer')}
                    </button>
                </div>
            </form>
        </div>
    );
};

export default NewDealer;
