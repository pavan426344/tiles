import axios from 'axios';

// Mock API for client-side development
console.warn("Using Mock API - Server has been removed");

const mockApi = {
    get: async (url) => {
        console.log(`[MockAPI] GET ${url}`);

        // Dashboard Stats
        if (url === '/dashboard/stats') {
            return {
                data: [
                    { label: 'Project Income', value: '₹23,989', trend: 'up', color: 'blue' },
                    { label: 'Site Traffic', value: '122,541', trend: 'down', color: 'purple' },
                    { label: 'Processes', value: '890', trend: 'up', color: 'green' },
                    { label: 'Orders', value: '₹23,989', trend: 'up', color: 'orange' },
                    { label: 'Active/New', value: '500/200', trend: 'neutral', color: 'pink' },
                ]
            };
        }

        // Mock Orders Data Helper
        const generateOrders = (count, status) => {
            return Array.from({ length: count }).map((_, i) => ({
                doid: `DO-${2023000 + i}`,
                dodate: '2023-11-15',
                Dealer_Name: `Tile Dealer ${String.fromCharCode(65 + i)}`,
                centre: 'Mumbai',
                Name: 'Rajesh Kumar',
                Mobile: '9876543210',
                Totalbox: Math.floor(Math.random() * 100) + 10,
                roundoff: (Math.random() * 10000).toFixed(2),
                executive: 'Amit Singh',
                CompanyName: 'Somany'
            }));
        };

        // Order Endpoints
        if (url === '/orders/pending') return { data: generateOrders(5, 'Pending') };
        if (url === '/orders/approved') return { data: generateOrders(8, 'Approved') };
        if (url === '/orders/rejected') return { data: generateOrders(3, 'Rejected') };
        if (url === '/orders/sales') return { data: generateOrders(12, 'Sales') };

        // Default empty array for list endpoints
        return { data: [] };
    },
    post: async () => ({ data: {} }),
    put: async () => ({ data: {} }),
    delete: async () => ({ data: {} }),
    // Mock interceptors to prevent crashes
    interceptors: {
        request: { use: () => { } },
        response: { use: () => { } }
    },
    defaults: { headers: { common: {} } }
};

export default mockApi;
