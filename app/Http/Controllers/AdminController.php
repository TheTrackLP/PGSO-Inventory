<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ppe_account;
use App\Models\Office;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $ppes = ppe_account::all();
        $offices = Office::orderBy("office_sequence", "asc")->get();

        $items_rpcppe = DB::table('serviceables')
                        ->select(
                            'serviceables.serv_ppe', 
                            'serviceables.serv_ofc', 
                            'serviceables.serv_type', 
                            DB::raw("SUM(serviceables.serv_qty) as total_qty"), 
                            DB::raw("SUM(serviceables.serv_value * serviceables.serv_qty) as grand_total"), 
                            DB::raw("CONCAT(ppe_accounts.ppe_code) as ppe_code"), 
                            DB::raw("CONCAT(offices.office_acronym, ' | ', offices.office_name) as office"),
                            DB::raw("CONCAT(offices.office_sequence) as order1")
                        )
                        ->join('offices','offices.id','=','serviceables.serv_ofc')
                        ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                        ->where('serviceables.serv_type', 1)
                        ->groupBy('offices.id','ppe_accounts.id','serviceables.serv_type')
                        ->orderBy('offices.office_sequence', 'asc')
                        ->get();

        $items_ics = DB::table('serviceables')
                        ->select(
                            'serviceables.serv_ppe', 
                            'serviceables.serv_ofc', 
                            'serviceables.serv_type', 
                            DB::raw("SUM(serviceables.serv_qty) as total_qty"), 
                            DB::raw("SUM(serviceables.serv_value * serviceables.serv_qty) as grand_total"), 
                            DB::raw("CONCAT(ppe_accounts.ppe_code) as ppe_code"), 
                            DB::raw("CONCAT(offices.office_name) as office")
                        )
                        ->join('offices','offices.id','=','serviceables.serv_ofc')
                        ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                        ->where('serviceables.serv_type', 2)
                        ->groupBy('offices.id','ppe_accounts.id','serviceables.serv_type')
                        ->orderBy('offices.office_sequence', 'asc')
                        ->get();

        $office_rpcppe = DB::table('serviceables')
                            ->select(
                              'serviceables.serv_ppe', 
                              'serviceables.serv_ofc', 
                              'serviceables.serv_type', 
                              DB::raw("SUM(serviceables.serv_qty) as total_qty"), 
                              DB::raw("SUM(serviceables.serv_value * serviceables.serv_qty) as grand_total"), 
                              DB::raw("CONCAT(ppe_accounts.ppe_name) as ppe_name"), 
                              DB::raw("CONCAT(ppe_accounts.ppe_code) as ppe_code"), 
                              DB::raw("CONCAT(offices.office_acronym, ' | ', offices.office_name) as office"),
                            )               
                            ->join('offices','offices.id','=','serviceables.serv_ofc')
                            ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                            ->where('serviceables.serv_type', 1)
                            ->groupBy('offices.id','ppe_accounts.id','serviceables.serv_type')
                            ->orderBy('ppe_accounts.ppe_code', 'asc')
                            ->get();

        $office_ics = DB::table('serviceables')
                            ->select(
                              'serviceables.serv_ppe', 
                              'serviceables.serv_ofc', 
                              'serviceables.serv_type', 
                              DB::raw("SUM(serviceables.serv_qty) as total_qty"), 
                              DB::raw("SUM(serviceables.serv_value * serviceables.serv_qty) as grand_total"), 
                              DB::raw("CONCAT(ppe_accounts.ppe_name) as ppe_name"), 
                              DB::raw("CONCAT(ppe_accounts.ppe_code) as ppe_code"), 
                              DB::raw("CONCAT(offices.office_acronym, ' | ', offices.office_name) as office")
                            )               
                            ->join('offices','offices.id','=','serviceables.serv_ofc')
                            ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                            ->where('serviceables.serv_type', 2)
                            ->groupBy('offices.id','ppe_accounts.id','serviceables.serv_type')
                            ->orderBy('ppe_accounts.ppe_code', 'asc')
                            ->get();

        return view('admin.dashboard', compact('ppes', 'offices', 'items_rpcppe', 'items_ics', 'office_rpcppe', 'office_ics'));
    }
}