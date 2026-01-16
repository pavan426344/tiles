import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import api from '../../api';
import { Save, ArrowLeft, Users, AlertCircle, CheckCircle } from 'lucide-react';

const AssignExecutive = () => {
    const navigate = useNavigate();
    const [executives, setExecutives] = useState([]);
    const [oldExecutive, setOldExecutive] = useState('');
    const [newExecutive, setNewExecutive] = useState('');
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState('');
    const [successMsg, setSuccessMsg] = useState('');

    useEffect(() => {
        const fetchExecutives = async () => {
            try {
                const res = await api.get('/executives');
                // Filter to likely candidates if needed, but original PHP shows all
                setExecutives(Array.isArray(res.data) ? res.data : []);
            } catch (err) {
                console.error("Error fetching executives", err);
            }
        };
        fetchExecutives();
    }, []);

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (!oldExecutive || !newExecutive) {
            setError('Please select both old and new executives.');
            return;
        }

        setError('');
        setSuccessMsg('');
        setLoading(true);

        try {
            await api.post('/dealers/reassign-executive', {
                oldExecutiveUsername: oldExecutive,
                newExecutiveUsername: newExecutive
            });
            setSuccessMsg('Dealers successfully reassigned.');
            setOldExecutive('');
            setNewExecutive('');
        } catch (err) {
            setError(err.response?.data?.error || 'Failed to reassign dealers.');
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="p-6 max-w-xl mx-auto space-y-6">
            <div className="flex items-center gap-4">
                <button
                    onClick={() => navigate('/dealers/list')}
                    className="p-2 hover:bg-slate-100 rounded-full text-slate-500"
                >
                    <ArrowLeft size={20} />
                </button>
                <div>
                    <h1 className="text-3xl font-bold text-slate-800 tracking-tight">Assign Executive</h1>
                    <p className="text-slate-500 mt-1">Transfer all dealers from one executive to another.</p>
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

            <form onSubmit={handleSubmit} className="card bg-white shadow-xl ring-1 ring-slate-900/5 p-8 rounded-xl space-y-6">
                <div className="bg-blue-50 p-4 rounded-lg flex gap-3 text-blue-800 mb-2">
                    <Users className="shrink-0 mt-1" size={20} />
                    <div className="text-sm">
                        This action will update all dealers currently assigned to the "Old Executive" to be managed by the "New Executive".
                    </div>
                </div>

                <div>
                    <label className="label">Old Executive <span className="text-red-500">*</span></label>
                    <input
                        type="text"
                        list="execList"
                        value={oldExecutive}
                        onChange={(e) => setOldExecutive(e.target.value)}
                        className="input w-full"
                        placeholder="Search executive..."
                        required
                    />
                </div>

                <div className="flex justify-center -my-2 opacity-50">
                    <div className="h-8 w-px bg-slate-300"></div>
                </div>

                <div>
                    <label className="label">New Executive <span className="text-red-500">*</span></label>
                    <input
                        type="text"
                        list="execList"
                        value={newExecutive}
                        onChange={(e) => setNewExecutive(e.target.value)}
                        className="input w-full"
                        placeholder="Search executive..."
                        required
                    />
                </div>

                <datalist id="execList">
                    {executives.map(ex => (
                        <option key={ex.username} value={ex.username}>{ex.Name} ({ex.CompanyName})</option>
                    ))}
                </datalist>

                <div className="pt-4">
                    <button
                        type="submit"
                        className="btn btn-primary w-full shadow-lg shadow-blue-500/30 flex justify-center items-center gap-2"
                        disabled={loading}
                    >
                        <Save size={18} />
                        {loading ? 'Processing...' : 'Transfer Dealers'}
                    </button>
                </div>
            </form>
        </div>
    );
};

export default AssignExecutive;
