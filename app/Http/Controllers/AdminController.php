<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Establishment;
use App\Models\ppe_account;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $estabs = Establishment::all();
        $ppes = ppe_account::all();

        $items_rpcppe = DB::table("serviceables")
                            ->select(
                                'serviceables.serv_ppe',
                                'serviceables.serv_estab',
                                'serviceables.serv_type',
                                DB::raw("CONCAT(establishments.estab_acronym, ' | ', establishments.estab_name) as estab"),
                                DB::raw("CONCAT(ppe_accounts.ppe_code, ' | ', ppe_accounts.ppe_name) as ppe"),
                                DB::raw("SUM(serviceables.serv_qty) as total_qty"),
                                DB::raw("SUM(serviceables.serv_value * serviceables.serv_qty) as grand_total"),
                            )
                            ->join("establishments","establishments.id","=","serviceables.serv_estab")
                            ->join("ppe_accounts","ppe_accounts.id","=","serviceables.serv_ppe")
                            ->where("serviceables.serv_type", 1)
                            ->groupBy("establishments.id", "ppe_accounts.id", "serviceables.serv_type")
                            ->get();

        $items_ics = DB::table("serviceables")
                            ->select(
                                'serviceables.serv_ppe',
                                'serviceables.serv_estab',
                                'serviceables.serv_type',
                                DB::raw("CONCAT(establishments.estab_acronym, ' | ', establishments.estab_name) as estab"),
                                DB::raw("CONCAT(ppe_accounts.ppe_code, ' | ', ppe_accounts.ppe_name) as ppe"),
                                DB::raw("SUM(serviceables.serv_qty) as total_qty"),
                                DB::raw("SUM(serviceables.serv_value * serviceables.serv_qty) as grand_total"),
                            )
                            ->join("establishments","establishments.id","=","serviceables.serv_estab")
                            ->join("ppe_accounts","ppe_accounts.id","=","serviceables.serv_ppe")
                            ->where("serviceables.serv_type", 2)
                            ->groupBy("establishments.id", "ppe_accounts.id", "serviceables.serv_type")
                            ->get();

        return view('admin.dashboard', compact('estabs','ppes', 'items_rpcppe', 'items_ics'));
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('auth.login');
    }
}