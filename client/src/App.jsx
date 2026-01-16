import React from 'react';
import { Routes, Route } from 'react-router-dom';
import DashboardLayout from './layouts/DashboardLayout';
import Dashboard from './pages/Dashboard';
import NewDo from './pages/NewDo';
import Brands from './pages/groupMaster/Brands';
import CompanyGroups from './pages/groupMaster/CompanyGroups';
import Companies from './pages/groupMaster/Companies';
import ProductTypes from './pages/groupMaster/ProductTypes';
import MainSeries from './pages/groupMaster/MainSeries';
import Series from './pages/groupMaster/Series';
import Sizes from './pages/groupMaster/Sizes';
import Grades from './pages/groupMaster/Grades';
import Designs from './pages/groupMaster/Designs';
import Plants from './pages/groupMaster/Plants';
import Punches from './pages/groupMaster/Punches';
import Glazs from './pages/groupMaster/Glazs';
import Godowns from './pages/groupMaster/Godowns';
import Items from './pages/Items';
import Production from './pages/Production';
import States from './pages/States';
import MRP from './pages/MRP';

import PendingOrder from './pages/Order/PendingOrder';
import DispatchOrder from './pages/Order/DispatchOrder';
import SalesOrder from './pages/Order/SalesOrder';
import RejectedOrder from './pages/Order/RejectedOrder';
import NewExecutive from './pages/Executive/NewExecutive';
import ExecutiveList from './pages/Executive/ExecutiveList';
import ProfileSettings from './pages/Executive/ProfileSettings';
import NewDealer from './pages/Dealer/NewDealer';
import DealerList from './pages/Dealer/DealerList';
import AssignExecutive from './pages/Dealer/AssignExecutive';

import Login from './pages/Login';
import PendingOrderReport from './pages/Reports/PendingOrderReport';
import SalesReport from './pages/Reports/SalesReport';
import DealerExportReport from './pages/Reports/DealerExportReport';
import SecurityChequeReport from './pages/Reports/SecurityChequeReport';
import WithoutSecurityChequeReport from './pages/Reports/WithoutSecurityChequeReport';

function App() {
  return (
    <Routes>
      <Route path="/login" element={<Login />} />
      <Route path="/" element={<DashboardLayout />}>
        <Route index element={<Dashboard />} />
        <Route path="brands" element={<Brands />} />
        <Route path="company-groups" element={<CompanyGroups />} />
        <Route path="companies" element={<Companies />} />
        <Route path="product-types" element={<ProductTypes />} />
        <Route path="main-series" element={<MainSeries />} />
        <Route path="series" element={<Series />} />
        <Route path="sizes" element={<Sizes />} />
        <Route path="grades" element={<Grades />} />
        <Route path="designs" element={<Designs />} />
        <Route path="plants" element={<Plants />} />
        <Route path="punches" element={<Punches />} />
        <Route path="glazs" element={<Glazs />} />
        <Route path="godowns" element={<Godowns />} />
        <Route path="items" element={<Items />} />
        <Route path="production" element={<Production />} />
        <Route path="states" element={<States />} />
        <Route path="mrp" element={<MRP />} />
        <Route path="executives/new" element={<NewExecutive />} />
        <Route path="executives/list" element={<ExecutiveList />} />
        <Route path="executives/profile/:id" element={<ProfileSettings />} />
        <Route path="dealers/new" element={<NewDealer />} />
        <Route path="dealers/edit/:id" element={<NewDealer />} />
        <Route path="dealers/list" element={<DealerList />} />
        <Route path="dealers/assign-executive" element={<AssignExecutive />} />
        <Route path="new-do" element={<NewDo />} />
        <Route path="orders/pending" element={<PendingOrder />} />
        <Route path="orders/dispatch" element={<DispatchOrder />} />
        <Route path="orders/sales" element={<SalesOrder />} />
        <Route path="orders/rejected" element={<RejectedOrder />} />
        <Route path="reports/pending-orders" element={<PendingOrderReport />} />
        <Route path="reports/sales-reports" element={<SalesReport />} />
        <Route path="reports/dealer-export" element={<DealerExportReport />} />
        <Route path="reports/security-cheque" element={<SecurityChequeReport />} />
        <Route path="reports/without-security-cheque" element={<WithoutSecurityChequeReport />} />
      </Route>
    </Routes>
  );
}

export default App;
