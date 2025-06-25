<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Establishment;
use App\Models\Establishment;

class AdminController extends Controller
{
    public function AdminDashboard(){

        return view('admin.dashboard');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('auth.login');
    }
}