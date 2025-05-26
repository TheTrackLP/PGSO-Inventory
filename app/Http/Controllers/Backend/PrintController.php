<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Serviceable;
use App\Models\Office;
use App\Models\ppe_account;
use App\Models\Unit_types;
use App\Models\Class_report;

class PrintController extends Controller
{
    public function PrintICSServ(Request $request){
        $ppe_acct = $request->print_ppe ? ppe_account::findorfail($request->print_ppe) : null;
        $ofc = $request->print_ofc ? Office::findorfail($request->print_ofc) : null;

        $query = DB::table('serviceables')
                    ->join('ppe_accounts', 'ppe_accounts.id', '=', 'serviceables.serv_ppe')
                    ->join('offices', 'offices.id', '=', 'serviceables.serv_ofc')
                    ->join('unit_types', 'unit_types.id', '=', 'serviceables.serv_unit')
                    ->select(
                        'serviceables.*',
                        'ppe_accounts.ppe_code',
                        'ppe_accounts.ppe_name',
                        'ppe_accounts.ppe_life',
                        'offices.office_acronym as office',
                        'unit_types.unit_name as unit'
                    );

        if($request->print_ofc){
            $query->where('serviceables.serv_ofc', $request->print_ofc);
        }

        if($request->print_ppe){
            $query->where('serviceables.serv_ppe', $request->print_ppe);
        }

        $total = DB::table('serviceables')
                ->selectRaw("SUM(serv_qty) as total_qty, SUM(serv_value) as total_value, SUM(serv_value * serv_qty) as grand_value")
                ->when($request->print_ofc, function ($query) use ($request){
                    return $query->where('serv_ofc', $request->print_ofc);
                })
                ->when($request->print_ppe, function ($query) use ($request){
                    return $query->where('serv_ppe', $request->print_ppe);
                })
                ->where('serviceables.serv_type', 2)
                ->first();

        $items_ics = $query->orderBy('serviceables.serv_pgso', 'asc')
                       ->orderBy('serviceables.serv_prop', 'asc')
                       ->where('serviceables.serv_type', 2)->get();

        return view('backend.print.print_ics', compact('items_ics', 'ppe_acct', 'ofc', 'total'));
    }

    public function PrintICSTop(Request $request){
        $office = $request->print_ofc ? Office::findorfail($request->print_ofc) : null;

        $overall_total = DB::table('serviceables')
                            ->where('serv_ofc', $request->print_ofc)
                            ->sum('serv_value');

        $top_ics = DB::table('serviceables')
                            ->select(
                                'serviceables.serv_ofc', 
                                'serviceables.serv_ppe',
                                'offices.office_name as office',
                                'ppe_accounts.ppe_name as ppe_name', 
                                'ppe_accounts.ppe_code as ppe_code', 
                                DB::raw('SUM(serviceables.serv_qty) as total_qty'), 
                                DB::raw('SUM(serviceables.serv_value) as total_value'),
                                DB::raw('SUM(CASE WHEN serviceables.serv_qty = 0 THEN serviceables.serv_value ELSE serviceables.serv_value * serviceables.serv_qty END) as grand_total')
                            )
                            ->join('offices', 'offices.id', '=', 'serviceables.serv_ofc')
                            ->join('ppe_accounts', 'ppe_accounts.id', '=', 'serviceables.serv_ppe')
                            ->where([
                                ['serviceables.serv_ofc', '=', $request->print_ofc],
                                ['serviceables.serv_type', '=', 2]
                            ])
                            ->groupBy('serviceables.serv_ppe')
                            ->orderBy('ppe_accounts.ppe_code', 'asc')
                            ->get();
                            
        $overall_grand_total = 0;
        foreach ($top_ics as $schedule) {
            if($schedule->total_qty == 0){
                $schedule->grand_total = $schedule->total_value;
            }
                $overall_grand_total += $schedule->grand_total;
        }

        return view('backend.print.print_topics', compact('office', 'top_ics', 'overall_grand_total'));
    }

    public function PrintRPCPPEServ(Request $request){
        $ppe_acct = $request->print_ppe ? ppe_account::findorfail($request->print_ppe) : null;
        $ofc = $request->print_ofc ? Office::findorfail($request->print_ofc) : null;

        $query = DB::table('serviceables')
                    ->join('ppe_accounts', 'ppe_accounts.id', '=', 'serviceables.serv_ppe')
                    ->join('offices', 'offices.id', '=', 'serviceables.serv_ofc')
                    ->join('unit_types', 'unit_types.id', '=', 'serviceables.serv_unit')
                    ->select(
                        'serviceables.*',
                        'ppe_accounts.ppe_code',
                        'ppe_accounts.ppe_name',
                        'ppe_accounts.ppe_life',
                        'offices.office_acronym as office',
                        'unit_types.unit_name as unit'
                    );

        if($request->print_ofc){
            $query->where('serviceables.serv_ofc', $request->print_ofc);
        }

        if($request->print_ppe){
            $query->where('serviceables.serv_ppe', $request->print_ppe);
        }

        $total = DB::table('serviceables')
                ->selectRaw("SUM(serv_qty) as total_qty, SUM(serv_value) as total_value, SUM(serv_value * serv_qty) as grand_value")
                ->when($request->print_ofc, function ($query) use ($request){
                    return $query->where('serv_ofc', $request->print_ofc);
                })
                ->when($request->print_ppe, function ($query) use ($request){
                    return $query->where('serv_ppe', $request->print_ppe);
                })
                ->where('serviceables.serv_type', 1)
                ->first();

        $items_rpcppe = $query->orderBy('serviceables.serv_pgso', 'asc')
                       ->orderBy('serviceables.serv_prop', 'asc')
                       ->where('serviceables.serv_type', 1)->get();

        return view('backend.print.print_rpcppe', compact('items_rpcppe', 'ppe_acct', 'ofc', 'total'));
    }

    public function PrintTopRPCPPE(Request $request){
        $office = $request->print_ofc ? Office::findorfail($request->print_ofc) : null;

        $top_rpcppe = DB::table('serviceables')
                            ->select(
                                'serviceables.serv_ofc', 
                                'serviceables.serv_ppe',
                                'offices.office_name as office',
                                'ppe_accounts.ppe_name as ppe_name', 
                                'ppe_accounts.ppe_code as ppe_code', 
                                DB::raw('SUM(serviceables.serv_qty) as total_qty'), 
                                DB::raw('SUM(serviceables.serv_value) as total_value'),
                                DB::raw('SUM(CASE WHEN serviceables.serv_qty = 0 THEN serviceables.serv_value ELSE serviceables.serv_value * serviceables.serv_qty END) as grand_total')
                            )
                            ->join('offices', 'offices.id', '=', 'serviceables.serv_ofc')
                            ->join('ppe_accounts', 'ppe_accounts.id', '=', 'serviceables.serv_ppe')
                            ->where([
                                ['serviceables.serv_ofc', '=', $request->print_ofc],
                                ['serviceables.serv_type', '=', 1]
                            ])
                            ->groupBy('serviceables.serv_ppe')
                            ->orderBy('ppe_accounts.ppe_code', 'asc')
                            ->get();
                            
        $overall_grand_total = 0;
        foreach ($top_rpcppe as $schedule) {
            if($schedule->total_qty == 0){
                $overall_grand_total = $schedule->total_value;
            }
                $overall_grand_total += $schedule->grand_total;
        }

        return view('backend.print.print_toprpcppe', compact('office', 'top_rpcppe', 'overall_grand_total'));
    }

    public function PrintICSConsolidated(Request $request){
        $class = $request->print_type ? Class_report::findorfail($request->print_type) : null;
        
        $ppes = DB::table('serviceables')
                            ->select(
                                'ppe_accounts.ppe_name',
                                'ppe_accounts.id',
                                'ppe_accounts.ppe_code'
                                )
                            ->leftJoin('offices','offices.id','=','serviceables.serv_ppe')
                            ->leftJoin('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                            ->where('serviceables.serv_type','=',$request->print_type)
                            ->groupBy('ppe_accounts.ppe_name')
                            ->orderBy('ppe_accounts.ppe_code', 'asc')
                            ->get();
        // $ppes = ppe_account::orderBy('ppe_code', 'asc')->get();
        $offices = Office::orderBy('office_sequence', 'asc')->
                            where('office_type', $request->print_estab)->get();
        
        $office_ics = DB::table('serviceables')
                            ->select(
                              'serviceables.serv_ppe', 
                              'serviceables.serv_ofc', 
                              'serviceables.serv_type', 
                              'offices.office_type',
                              DB::raw("SUM(serviceables.serv_qty) as total_qty"), 
                              DB::raw("CONCAT(ppe_accounts.ppe_name) as ppe_code"), 
                              DB::raw("SUM(serviceables.serv_value * serviceables.serv_qty) as grand_total"), 
                            )               
                            ->join('offices','offices.id','=','serviceables.serv_ofc')
                            ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                            ->where([
                                ['serviceables.serv_type', $request->print_type],
                                ['offices.office_type', $request->print_estab],
                            ])
                            ->groupBy('offices.id','ppe_accounts.id','serviceables.serv_type', 'offices.office_type')
                            ->orderBy('offices.office_sequence', 'asc')
                            ->get();
                            
        return view('backend.print.ics_consolidated', compact('ppes', 'offices', 'office_ics', 'class'));
    }

    public function PrintEachCode(Request $request){
        $class = $request->print_type ? CLass_report::findorfail($request->print_type) : null;
        $ppe = $request->print_ppe2 ? ppe_account::findorfail($request->print_ppe2) : null;
        $serv_data = DB::table('serviceables')
                        ->select(
                            'serviceables.serv_ppe', 
                            'serviceables.serv_ofc', 
                            'serviceables.serv_type', 
                            'offices.office_type',
                            DB::raw("SUM(serviceables.serv_qty) as total_qty"), 
                            DB::raw("SUM(serviceables.serv_value * serviceables.serv_qty) as grand_total"), 
                            DB::raw("CONCAT(offices.office_name) as office")
                        )
                        ->join('offices','offices.id','=','serviceables.serv_ofc')
                        ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                        ->where([
                            ['serviceables.serv_type', $request->print_type],
                            ['serviceables.serv_ppe', $request->print_ppe2]
                        ])
                        ->groupBy('offices.id','ppe_accounts.id','serviceables.serv_type')
                        ->orderBy('offices.office_sequence', 'asc')
                        ->get();

        return view('backend.print.print_eachcode', compact('serv_data', 'class', 'ppe'));
    }
}