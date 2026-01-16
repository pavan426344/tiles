import React, { useEffect } from 'react';
import { Outlet, useNavigate } from 'react-router-dom';
import Sidebar from '../components/Layout/Sidebar';

const DashboardLayout = () => {
    const navigate = useNavigate();

    useEffect(() => {
        const token = localStorage.getItem('token');
        if (!token) {
            navigate('/login');
        }
    }, [navigate]);

    return (
        <div style={{ display: 'flex' }}>
            <Sidebar />
            <main style={{
                flex: 1,
                marginLeft: '260px',
                padding: '4rem',
                minHeight: '100vh',
                backgroundColor: 'var(--bg-body)'
            }}>
                <Outlet />
            </main>
        </div>
    );
};

export default DashboardLayout;
