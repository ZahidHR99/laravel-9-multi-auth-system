<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function adminDashboard(){
        return view('backend.dashboard.admin_dashboard');
    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect('login/admin');
    }
}
