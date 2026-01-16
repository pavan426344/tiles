import React, { useState } from 'react';
import { NavLink, useLocation } from 'react-router-dom';
import { LayoutDashboard, Layers, Box, FileText, Settings, LogOut, ChevronDown, ChevronRight, Users, ShoppingCart } from 'lucide-react';
import styles from './Sidebar.module.css';

const Sidebar = () => {
    const location = useLocation();
    const [expandedGroups, setExpandedGroups] = useState({
        'Group Master': false
    });

    const toggleGroup = (label) => {
        setExpandedGroups(prev => ({
            ...prev,
            [label]: !prev[label]
        }));
    };

    const navItems = [
        { path: '/', label: 'Dashboard', icon: LayoutDashboard },
        {
            label: 'Group Master',
            icon: Layers,
            children: [
                { path: '/company-groups', label: 'Company Group' },
                { path: '/companies', label: 'Company' },
                { path: '/brands', label: 'Brand' },
                { path: '/product-types', label: 'Product Type' },
                { path: '/main-series', label: 'Main Series' },
                { path: '/series', label: 'Series' },
                { path: '/sizes', label: 'Size' },
                { path: '/grades', label: 'Grade' },
                { path: '/designs', label: 'Design' },
                { path: '/plants', label: 'Plant/Unit' },
                { path: '/punches', label: 'Punch' },
                { path: '/glazs', label: 'Glaz' },
                { path: '/godowns', label: 'Godown' },
            ]
        },
        { path: '/items', label: 'Item Master', icon: Box },
        { path: '/production', label: 'Production', icon: Layers },
        { path: '/states', label: 'State Master', icon: FileText },
        { path: '/mrp', label: 'MRP', icon: Settings },
        {
            label: 'Executive',
            icon: Users,
            children: [
                { path: '/executives/new', label: 'New Executive' },
                { path: '/executives/list', label: 'Executive List' },
                { path: '/executives/profile/current', label: 'Profile Setting' }, // Placeholder ID
            ]
        },
        {
            label: 'Dealer',
            icon: Users,
            children: [
                { path: '/dealers/new', label: 'New Dealer' },
                { path: '/dealers/assign-executive', label: 'Dealer Assign' },
                { path: '/dealers/list', label: 'Dealer List' },
            ]
        },
        { path: '/new-do', label: 'New DO', icon: ShoppingCart },
        {
            label: 'Order',
            icon: Box, // Using Box as placeholder for Order icon if needed, or maybe FileText
            children: [
                { path: '/orders/pending', label: 'Pending Order' },
                { path: '/orders/dispatch', label: 'Dispatch Order' },
                { path: '/orders/sales', label: 'Sales Order' },
                { path: '/orders/rejected', label: 'Rejected Order' },
            ]
        },
        {
            label: 'Reports',
            icon: FileText,
            children: [
                { path: '/reports/pending-orders', label: 'Pending Order' },
                { path: '/reports/sales-reports', label: 'Sales Reports' },
                { path: '/reports/dealer-export', label: 'Dealer Export' },
                { path: '/reports/security-cheque', label: 'Security Cheque' },
                { path: '/reports/without-security-cheque', label: 'Without Security' },
            ]
        },
    ];

    return (
        <aside className={styles.sidebar}>
            <div className={styles.brand}>
                <span className={styles.logo}>ERP</span>
            </div>

            <nav className={styles.nav}>
                {navItems.map((item, index) => {
                    if (item.children) {
                        const isExpanded = expandedGroups[item.label];
                        return (
                            <div key={index} className={styles.group}>
                                <div
                                    className={styles.groupLabel}
                                    onClick={() => toggleGroup(item.label)}
                                >
                                    <div className="flex items-center gap-2" style={{ display: 'flex', alignItems: 'center', gap: '0.75rem' }}>
                                        <item.icon size={18} />
                                        <span>{item.label}</span>
                                    </div>
                                    {isExpanded ? <ChevronDown size={16} /> : <ChevronRight size={16} />}
                                </div>
                                <div className={`${styles.subnav} ${isExpanded ? styles.expanded : ''} `}>
                                    {item.children.map((child, cIndex) => (
                                        <NavLink
                                            key={cIndex}
                                            to={child.path}
                                            className={({ isActive }) =>
                                                `${styles.link} ${isActive ? styles.active : ''} `
                                            }
                                        >
                                            {child.label}
                                        </NavLink>
                                    ))}
                                </div>
                            </div>
                        );
                    }
                    return (
                        <NavLink
                            key={index}
                            to={item.path}
                            className={({ isActive }) =>
                                `${styles.link} ${isActive ? styles.active : ''} `
                            }
                        >
                            <item.icon size={18} />
                            <span>{item.label}</span>
                        </NavLink>
                    );
                })}
            </nav>

            <div className={styles.footer}>
                <button
                    className={styles.logoutBtn}
                    onClick={() => {
                        // Clear any auth tokens if stored (e.g., localStorage.removeItem('token'))
                        // For now just redirect to login or reload which resets state
                        window.location.href = '/login'; // Or just reload if no login page yet
                    }}
                >
                    <LogOut size={18} />
                    <span>Logout</span>
                </button>
            </div>
        </aside>
    );
};

export default Sidebar;
