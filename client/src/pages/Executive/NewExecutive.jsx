import React, { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import api from '../../api';
import { Save, X, AlertCircle, CheckCircle, User, MapPin, Phone, Mail, Briefcase, Lock, Calendar } from 'lucide-react';

const NewExecutive = () => {
    const navigate = useNavigate();
    const { id } = useParams(); // For update mode
    const [loading, setLoading] = useState(false);
    const [companies, setCompanies] = useState([]);
    const [states, setStates] = useState([]);
    const [executives, setExecutives] = useState([]);
    const [formData, setFormData] = useState({
        company: '',
        name: '',
        address: '',
        city: '',
        state: '',
        country: '',
        pincode: '',
        email: '',
        phone: '',
        idProofName: '',
        idProofNo: '',
        designation: '',
        underExecutive: '',
        registerAs: '2', // Default to Executive
        username: '',
        password: '',
        joiningDate: '',
        relievingDate: ''
    });
    const [error, setError] = useState('');
    const [successMsg, setSuccessMsg] = useState('');

    useEffect(() => {
        const fetchDropdowns = async () => {
            try {
                const [compRes, stateRes, execRes] = await Promise.all([
                    api.get('/companies'),
                    api.get('/states'),
                    api.get('/executives') // Assuming this endpoint exists or will exist
                ]);
                setCompanies(Array.isArray(compRes.data) ? compRes.data : []);
                setStates(Array.isArray(stateRes.data) ? stateRes.data : []);
                setExecutives(Array.isArray(execRes.data) ? execRes.data : []);
            } catch (err) {
                console.error("Error fetching dropdowns", err);
            }
        };
        fetchDropdowns();

        if (id) {
            fetchExecutiveDetails(id);
        }
    }, [id]);

    const fetchExecutiveDetails = async (execId) => {
        try {
            setLoading(true);
            const res = await api.get(`/executives/${execId}`);
            if (res.data) {
                setFormData({
                    company: res.data.CompanyName || '',
                    name: res.data.Name || '',
                    address: res.data.Address || '',
                    city: res.data.City || '',
                    state: res.data.State || '',
                    country: res.data.Country || '',
                    pincode: res.data.Pincode || '',
                    email: res.data.Email || '',
                    phone: res.data.Phone || '',
                    idProofName: res.data.Idproofname1 || '',
                    idProofNo: res.data.Idproof1 || '',
                    designation: res.data.Designation || '',
                    underExecutive: res.data.uexecutive || '',
                    registerAs: res.data.UserType || '2',
                    username: res.data.username || '',
                    password: '', // Don't populate password for security, let user reset if needed
                    joiningDate: res.data.joining_date || '',
                    relievingDate: res.data.leave_date || ''
                });
            }
        } catch (err) {
            setError('Failed to fetch executive details.');
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
            if (id) {
                await api.put(`/executives/${id}`, formData);
                setSuccessMsg('Executive updated successfully.');
            } else {
                await api.post('/executives', formData);
                setSuccessMsg('Executive created successfully.');
                // Reset form on success if creating
                setFormData({
                    company: '', name: '', address: '', city: '', state: '', country: '', pincode: '',
                    email: '', phone: '', idProofName: '', idProofNo: '', designation: '', underExecutive: '',
                    registerAs: '2', username: '', password: '', joiningDate: '', relievingDate: ''
                });
            }
            window.scrollTo(0, 0);
        } catch (err) {
            setError(err.response?.data?.error || 'Error saving executive.');
            window.scrollTo(0, 0);
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="p-6 max-w-5xl mx-auto space-y-6">
            <div className="flex items-center justify-between">
                <div>
                    <h1 className="text-3xl font-bold text-slate-800 tracking-tight">
                        {id ? 'Update Executive' : 'New Executive'}
                    </h1>
                    <p className="text-slate-500 mt-1">
                        {id ? 'Edit executive details and permissions.' : 'Register a new executive or staff member.'}
                    </p>
                </div>
                <button
                    onClick={() => navigate('/executives/list')}
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

                {/* Personal Details Section */}
                <div>
                    <h3 className="text-lg font-semibold text-slate-800 border-b pb-2 mb-4 flex items-center gap-2">
                        <User size={20} className="text-blue-600" /> Personal Details
                    </h3>
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label className="label">Company <span className="text-red-500">*</span></label>
                            <select
                                name="company"
                                value={formData.company}
                                onChange={handleChange}
                                className="input w-full"
                                required
                            >
                                <option value="">-- Select Company --</option>
                                {companies.map(c => (
                                    <option key={c.T_Company_Id} value={c.T_Company_Name}>{c.T_Company_Name}</option>
                                ))}
                                <option value="Any">Any</option>
                            </select>
                        </div>
                        <div>
                            <label className="label">Executive Name <span className="text-red-500">*</span></label>
                            <input
                                type="text"
                                name="name"
                                value={formData.name}
                                onChange={handleChange}
                                className="input w-full"
                                required
                            />
                        </div>
                        <div className="md:col-span-2">
                            <label className="label">Address <span className="text-red-500">*</span></label>
                            <textarea
                                name="address"
                                value={formData.address}
                                onChange={handleChange}
                                className="input w-full h-24 pt-2"
                                required
                            />
                        </div>
                        <div>
                            <label className="label">City <span className="text-red-500">*</span></label>
                            <input
                                type="text"
                                name="city"
                                value={formData.city}
                                onChange={handleChange}
                                className="input w-full"
                                required
                            />
                        </div>
                        <div>
                            <label className="label">State <span className="text-red-500">*</span></label>
                            <select
                                name="state"
                                value={formData.state}
                                onChange={handleChange}
                                className="input w-full"
                                required
                            >
                                <option value="">-- Select State --</option>
                                {states.map(s => (
                                    <option key={s.T_State_Id} value={s.T_State_Name}>{s.T_State_Name}</option>
                                ))}
                            </select>
                        </div>
                        <div>
                            <label className="label">Country <span className="text-red-500">*</span></label>
                            <input
                                type="text"
                                name="country"
                                value={formData.country}
                                onChange={handleChange}
                                className="input w-full"
                                required
                            />
                        </div>
                        <div>
                            <label className="label">Pin Code <span className="text-red-500">*</span></label>
                            <input
                                type="text"
                                name="pincode"
                                value={formData.pincode}
                                onChange={handleChange}
                                pattern="[0-9]{6}"
                                className="input w-full"
                                required
                            />
                        </div>
                    </div>
                </div>

                {/* Contact & Professional Section */}
                <div>
                    <h3 className="text-lg font-semibold text-slate-800 border-b pb-2 mb-4 flex items-center gap-2">
                        <Briefcase size={20} className="text-blue-600" /> Professional Info
                    </h3>
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label className="label">Email <span className="text-red-500">*</span></label>
                            <div className="relative">
                                <Mail className="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" size={18} />
                                <input
                                    type="email"
                                    name="email"
                                    value={formData.email}
                                    onChange={handleChange}
                                    className="input w-full pl-10"
                                    required
                                />
                            </div>
                        </div>
                        <div>
                            <label className="label">Phone <span className="text-red-500">*</span></label>
                            <div className="relative">
                                <Phone className="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" size={18} />
                                <input
                                    type="tel"
                                    name="phone"
                                    value={formData.phone}
                                    onChange={handleChange}
                                    pattern="[0-9]{10,12}"
                                    className="input w-full pl-10"
                                    required
                                />
                            </div>
                        </div>
                        <div>
                            <label className="label">ID Proof Name</label>
                            <input type="text" name="idProofName" value={formData.idProofName} onChange={handleChange} className="input w-full" />
                        </div>
                        <div>
                            <label className="label">ID Proof No.</label>
                            <input type="text" name="idProofNo" value={formData.idProofNo} onChange={handleChange} className="input w-full" />
                        </div>
                        <div>
                            <label className="label">Designation</label>
                            <input type="text" name="designation" value={formData.designation} onChange={handleChange} className="input w-full" />
                        </div>
                        <div>
                            <label className="label">Reporting Head</label>
                            <input
                                type="text"
                                list="executivesList"
                                name="underExecutive"
                                value={formData.underExecutive}
                                onChange={handleChange}
                                className="input w-full"
                                placeholder="Search executive..."
                            />
                            <datalist id="executivesList">
                                {executives.map(ex => (
                                    <option key={ex.UserRegistration_id} value={`${ex.username} - ${ex.Name}`} />
                                ))}
                            </datalist>
                        </div>
                        <div>
                            <label className="label">Register As</label>
                            <select name="registerAs" value={formData.registerAs} onChange={handleChange} className="input w-full">
                                <option value="1">Sub Executive</option>
                                <option value="2">Executive</option>
                                <option value="3">Zonal Head</option>
                                <option value="6">Dispatch Dept.</option>
                                <option value="4">Admin</option>
                                <option value="7">Account Dept.</option>
                                <option value="8">Director</option>
                                <option value="5">Super Admin</option>
                            </select>
                        </div>
                    </div>
                </div>

                {/* Login Details Section */}
                <div>
                    <h3 className="text-lg font-semibold text-slate-800 border-b pb-2 mb-4 flex items-center gap-2">
                        <Lock size={20} className="text-blue-600" /> Login & Dates
                    </h3>
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label className="label">Username <span className="text-red-500">*</span></label>
                            <input
                                type="text"
                                name="username"
                                value={formData.username}
                                onChange={handleChange}
                                className="input w-full"
                                required
                                disabled={!!id} // Disable username editing if updating
                            />
                        </div>
                        <div>
                            <label className="label">Password {!id && <span className="text-red-500">*</span>}</label>
                            <input
                                type="password"
                                name="password"
                                value={formData.password}
                                onChange={handleChange}
                                className="input w-full"
                                required={!id}
                                placeholder={id ? "Leave blank to keep unchanged" : ""}
                            />
                        </div>
                        <div>
                            <label className="label">Joining Date</label>
                            <div className="relative">
                                <Calendar className="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" size={18} />
                                <input
                                    type="date"
                                    name="joiningDate"
                                    value={formData.joiningDate}
                                    onChange={handleChange}
                                    className="input w-full pl-10"
                                />
                            </div>
                        </div>
                        <div>
                            <label className="label">Relieving Date</label>
                            <div className="relative">
                                <Calendar className="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" size={18} />
                                <input
                                    type="date"
                                    name="relievingDate"
                                    value={formData.relievingDate}
                                    onChange={handleChange}
                                    className="input w-full pl-10"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div className="pt-6 border-t flex gap-4 justify-end">
                    <button
                        type="button"
                        onClick={() => navigate('/executives/list')}
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
                        {loading ? 'Saving...' : (id ? 'Update Executive' : 'Register Executive')}
                    </button>
                </div>

            </form>
        </div>
    );
};

export default NewExecutive;
