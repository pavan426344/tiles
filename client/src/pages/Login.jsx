import React, { useState } from 'react';
import axios from 'axios'; // Direct axios use or api instance
import { useNavigate } from 'react-router-dom';
import { User, Lock, ChevronRight } from 'lucide-react';
// import api from '../api'; // existing api instance

const Login = () => {
    const navigate = useNavigate();
    const [formData, setFormData] = useState({
        username: '',
        password: '',
        usertype: '5' // Default to Super Admin (5) as per screenshot/common usage
    });
    const [error, setError] = useState('');

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        // Mock login for client-side only mode
        const mockUser = {
            id: 1,
            username: formData.username,
            usertype: formData.usertype,
            name: 'Test User'
        };
        // Simulate delay
        await new Promise(resolve => setTimeout(resolve, 500));

        // Store mock token and user
        localStorage.setItem('token', 'mock_token_' + Date.now());
        localStorage.setItem('user', JSON.stringify(mockUser));
        // Navigate to Dashboard
        window.location.href = '/';
    };

    return (
        <div className="min-h-screen flex items-center justify-center bg-[#0d1b2a] relative overflow-hidden"
            style={{
                backgroundImage: 'url("https://www.transparenttextures.com/patterns/cubes.png"), linear-gradient(to bottom right, #0F2027, #203A43, #2C5364)'
            }}>
            {/* Overlay for geometric effect if needed, simpler using CSS gradient/pattern above */}

            <div className="bg-white rounded-lg shadow-2xl w-full max-w-md p-8 z-10 mx-4">
                <div className="text-center mb-8">
                    <h2 className="text-3xl font-light text-gray-700">Login to ERP</h2>
                    <div className="h-1 w-20 bg-gray-200 mx-auto mt-4"></div>
                </div>

                {error && (
                    <div className="mb-6 p-3 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm">
                        {error}
                    </div>
                )}

                <form onSubmit={handleSubmit} className="space-y-6">
                    <div className="relative">
                        <label className="block text-xs font-bold text-gray-500 uppercase mb-1">User Name</label>
                        <div className="flex items-center border border-gray-300 rounded overflow-hidden">
                            <input
                                type="text"
                                name="username"
                                value={formData.username}
                                onChange={handleChange}
                                className="w-full px-4 py-3 outline-none text-gray-700"
                                required
                            />
                            <div className="px-3 text-gray-400 bg-gray-50 h-full flex items-center border-l">
                                <User size={18} />
                            </div>
                        </div>
                    </div>

                    <div className="relative">
                        <label className="block text-xs font-bold text-gray-500 uppercase mb-1">Password</label>
                        <div className="flex items-center border border-gray-300 rounded overflow-hidden">
                            <input
                                type="password"
                                name="password"
                                value={formData.password}
                                onChange={handleChange}
                                className="w-full px-4 py-3 outline-none text-gray-700"
                                required
                            />
                            <div className="px-3 text-gray-400 bg-gray-50 h-full flex items-center border-l">
                                <Lock size={18} />
                            </div>
                        </div>
                    </div>

                    <div className="relative">
                        <label className="block text-xs font-bold text-gray-500 uppercase mb-1">Login As</label>
                        <div className="relative">
                            <select
                                name="usertype"
                                value={formData.usertype}
                                onChange={handleChange}
                                className="w-full px-4 py-3 outline-none border border-gray-300 rounded text-gray-700 appearance-none bg-white"
                            >
                                <option value="1">Sub Executive</option>
                                <option value="2">Executive</option>
                                <option value="3">Zonal Head</option>
                                <option value="6">Dispatch Dept.</option>
                                <option value="4">Admin</option>
                                <option value="7">Account Dept.</option>
                                <option value="8">Director</option>
                                <option value="5">Super Admin</option>
                            </select>
                            <div className="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-gray-400">
                                <ChevronRight size={18} className="rotate-90" />
                            </div>
                        </div>
                    </div>

                    <div className="pt-4">
                        <button
                            type="submit"
                            className="w-full bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-4 rounded transition duration-200"
                        >
                            Log in
                        </button>
                    </div>
                </form>

                <div className="mt-8 text-center text-xs text-gray-400">
                    <p className="font-bold text-gray-500 mb-1">ABC COMPANY</p>
                    <p>Created by M&P Soft Technology</p>
                </div>
            </div>
        </div>
    );
};

export default Login;
