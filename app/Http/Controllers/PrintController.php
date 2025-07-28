<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serviceables;
use App\Models\Establishment;
use App\Models\ppe_account;
use App\Models\unit_type;
use DB;

class PrintController extends Controller
{
    public function printRPCPPEServ(Request $request)
    {
        $ppe_acct = $request->print_ppe ? ppe_account::findorfail($request->print_ppe) : null;
        $establishment = $request->print_estab ? Establishment::findorfail($request->print_estab) : null;

        $query = DB::table("serviceables")
            ->select(
                'serviceables.*',
                'ppe_accounts.ppe_name',
                'ppe_accounts.ppe_code',
                'establishments.estab_acronym',
                'unit_types.unit_name as unit',
            )
            ->join('establishments', 'establishments.id', '=', 'serviceables.serv_estab')
            ->join('ppe_accounts', 'ppe_accounts.id', '=', 'serviceables.serv_ppe')
            ->join('unit_types', 'unit_types.id', '=', 'serviceables.serv_unit');

        if ($request->print_estab) {
            $query->where('serviceables.serv_estab', $request->print_estab);
        }

        if ($request->print_ppe) {
            $query->where('serviceables.serv_ppe', $request->print_ppe);
        }

        $total = DB::table('serviceables')
            ->selectRaw("SUM(serv_qty) as total_qty, SUM(serv_value) as total_value, SUM(serv_value * serv_qty) as grand_value")
            ->when($request->print_estab, function ($query) use ($request) {
                return $query->where("serv_estab", $request->print_estab);
            })
            ->when($request->print_ppe, function ($query) use ($request) {
                return $query->where("serv_ppe", $request->print_ppe);
            })
            ->where('serviceables.serv_type', 1)
            ->first();

        $items_rpcppe = $query->orderBy('serviceables.serv_pgso', 'asc')
            ->orderBy('serviceables.serv_prop', 'asc')
            ->where('serviceables.serv_type', 1)
            ->get();

        return view('backend.print.print_rpcppe', compact('items_rpcppe', 'establishment', 'ppe_acct', 'total'));
    }
    public function printTopRPCPPEServ(Request $request)
    {
        $establishment = $request->print_estab ? Establishment::findOrFail($request->print_estab) : null;

        $top_rpcppe = DB::table("serviceables")
                          ->select(
                            'serviceables.serv_ppe',
                            'serviceables.serv_estab',
                            'establishments.estab_name',
                            'ppe_accounts.ppe_name',
                            'ppe_accounts.ppe_code',
                            DB::raw("SUM(serviceables.serv_qty) as total_qty"),
                            DB::raw("SUM(serviceables.serv_value) as total_value"),
                            DB::raw('SUM(CASE WHEN serviceables.serv_qty = 0 THEN serviceables.serv_value ELSE serviceables.serv_value * serviceables.serv_qty END) as grand_total')
                          )
                          ->join('establishments','establishments.id','=','serviceables.serv_estab')
                          ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                          ->where([
                            ['serviceables.serv_estab', '=', $request->print_estab],
                            ['serviceables.serv_type','=', 1],
                          ])
                           ->groupBy('serviceables.serv_ppe', 'serviceables.serv_estab')
                           ->orderBy('ppe_accounts.ppe_code', 'asc')
                           ->get();

        $overall_grand_total = 0;

        foreach ($top_rpcppe as $value) {
            if($value->total_qty == 0){
                $value->grand_total = $value->total_value;
            }
            $overall_grand_total += $value->grand_total;
        }
        return view('backend.print.print_toprpcppe', compact('establishment', 'top_rpcppe', 'overall_grand_total'));
    }

    public function printICSServ(Request $request)
    {
        $ppe_acct = $request->print_ppe ? ppe_account::findorfail($request->print_ppe) : null;
        $establishment = $request->print_estab ? Establishment::findorfail($request->print_estab) : null;

        $query = DB::table("serviceables")
            ->select(
                'serviceables.*',
                'ppe_accounts.ppe_name',
                'ppe_accounts.ppe_code',
                'establishments.estab_acronym',
                'unit_types.unit_name as unit',
            )
            ->join('establishments', 'establishments.id', '=', 'serviceables.serv_estab')
            ->join('ppe_accounts', 'ppe_accounts.id', '=', 'serviceables.serv_ppe')
            ->join('unit_types', 'unit_types.id', '=', 'serviceables.serv_unit');

        if ($request->print_estab) {
            $query->where('serviceables.serv_estab', $request->print_estab);
        }

        if ($request->print_ppe) {
            $query->where('serviceables.serv_ppe', $request->print_ppe);
        }

        $total = DB::table('serviceables')
            ->selectRaw("SUM(serv_qty) as total_qty, SUM(serv_value) as total_value, SUM(serv_value * serv_qty) as grand_value")
            ->when($request->print_estab, function ($query) use ($request) {
                return $query->where("serv_estab", $request->print_estab);
            })
            ->when($request->print_ppe, function ($query) use ($request) {
                return $query->where("serv_ppe", $request->print_ppe);
            })
            ->where('serviceables.serv_type', 1)
            ->first();

        $items_ics = $query->orderBy('serviceables.serv_pgso', 'asc')
            ->orderBy('serviceables.serv_prop', 'asc')
            ->where('serviceables.serv_type', 2)
            ->get();

        return view('backend.print.print_ics', compact('items_ics', 'establishment', 'ppe_acct', 'total'));
    }

        public function printTopICSServ(Request $request)
    {
        $establishment = $request->print_estab ? Establishment::findOrFail($request->print_estab) : null;

        $top_ics = DB::table("serviceables")
                          ->select(
                            'serviceables.serv_ppe',
                            'serviceables.serv_estab',
                            'establishments.estab_name',
                            'ppe_accounts.ppe_name',
                            'ppe_accounts.ppe_code',
                            DB::raw("SUM(serviceables.serv_qty) as total_qty"),
                            DB::raw("SUM(serviceables.serv_value) as total_value"),
                            DB::raw('SUM(CASE WHEN serviceables.serv_qty = 0 THEN serviceables.serv_value ELSE serviceables.serv_value * serviceables.serv_qty END) as grand_total')
                          )
                          ->join('establishments','establishments.id','=','serviceables.serv_estab')
                          ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                          ->where([
                            ['serviceables.serv_estab', '=', $request->print_estab],
                            ['serviceables.serv_type','=', 2],
                          ])
                           ->groupBy('serviceables.serv_ppe', 'serviceables.serv_estab')
                           ->orderBy('ppe_accounts.ppe_code', 'asc')
                           ->get();

        $overall_grand_total = 0;

        foreach ($top_ics as $value) {
            if($value->total_qty == 0){
                $value->grand_total = $value->total_value;
            }
            $overall_grand_total += $value->grand_total;
        }
        return view('backend.print.print_topics', compact('establishment', 'top_ics', 'overall_grand_total'));
    }

    public function printEachCodeServ(Request $request){
        $ppe = $request->print_ppe ? ppe_account::findOrFail($request->print_ppe) : null;
        $type = $request->print_type;

        $eachcode = DB::table('serviceables')
                       ->select(
                        'serviceables.serv_type',
                        'serviceables.serv_estab',
                        'serviceables.serv_ppe',
                        'establishments.estab_type',
                            DB::raw("SUM(serviceables.serv_qty) as total_qty"),
                            DB::raw("SUM(serviceables.serv_value * serv_qty) as total_value"),
                            DB::raw("CONCAT(establishments.estab_name) as estab")
                       )
                       ->join('establishments','establishments.id','=','serviceables.serv_estab')
                       ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                       ->where([
                        ['serviceables.serv_type','=', $request->print_type],
                        ['serviceables.serv_ppe','=', $request->print_ppe],
                       ])
                       ->groupBy('establishments.id','ppe_accounts.id', 'serviceables.serv_type')
                       ->get();

        return view('backend.print.print_eachcode', compact('eachcode', 'ppe', 'type'));
    }

    public function PrintPropertyCard(Request $request){
        $ppe = $request->print_ppe ? ppe_account::findorfail($request->print_ppe) : null;
        $estab = $request->print_estab ? Establishment::findorfail($request->print_estab) : null;

        $query = DB::table("serviceables")
            ->select(
                'serviceables.*',
                'ppe_accounts.ppe_name',
                'ppe_accounts.ppe_code',
                'establishments.estab_acronym',
                'unit_types.unit_name as unit',
            )
            ->join('establishments', 'establishments.id', '=', 'serviceables.serv_estab')
            ->join('ppe_accounts', 'ppe_accounts.id', '=', 'serviceables.serv_ppe')
            ->join('unit_types', 'unit_types.id', '=', 'serviceables.serv_unit');

        if ($request->print_estab) {
            $query->where('serviceables.serv_estab', $request->print_estab);
        }

        if ($request->print_ppe) {
            $query->where('serviceables.serv_ppe', $request->print_ppe);
        }

        $total = DB::table('serviceables')
            ->selectRaw("SUM(serv_qty) as total_qty, SUM(serv_value) as total_value, SUM(serv_value * serv_qty) as grand_value")
            ->when($request->print_estab, function ($query) use ($request) {
                return $query->where("serv_estab", $request->print_estab);
            })
            ->when($request->print_ppe, function ($query) use ($request) {
                return $query->where("serv_ppe", $request->print_ppe);
            })
            ->where('serviceables.serv_type', $request->print_type)
            ->first();

        $item_serv = $query->orderBy('serviceables.serv_pgso', 'asc')
            ->orderBy('serviceables.serv_prop', 'asc')
            ->where('serviceables.serv_type', $request->print_type)
            ->get();

        return view('backend.print.print_propertyCard', compact('item_serv', 'total', 'ppe', 'estab'));
    }

    public function PrintConsolidated(Request $request) {
        $type = $request->print_type;

        $ppes = DB::table("serviceables")
                    ->select(
                        'ppe_accounts.*',
                    )
                    ->leftJoin("establishments", "establishments.id", "=", "serviceables.serv_ppe")
                    ->leftJoin("ppe_accounts", "ppe_accounts.id", "=", "serviceables.serv_ppe")
                    ->where('serviceables.serv_type', $request->print_type)
                    ->groupBy("ppe_accounts.id")
                    ->orderBy('ppe_accounts.ppe_code', 'asc')
                    ->get();
        $estabs = Establishment::where("estab_type", $request->print_estabtype)->get();
        $item_serv = DB::table("serviceables")
                        ->select(
                            'serviceables.serv_ppe',
                            'serviceables.serv_estab',
                            'serviceables.serv_type',
                            'establishments.estab_type',
                            DB::raw("SUM(serviceables.serv_qty) as total_qty"), 
                            DB::raw("CONCAT(ppe_accounts.ppe_name) as ppe_code"), 
                            DB::raw("SUM(serviceables.serv_value * serviceables.serv_qty) as grand_total"), 
                        )
                        ->join("establishments", "establishments.id", "=", "serviceables.serv_estab")
                        ->join("ppe_accounts", "ppe_accounts.id", "=", "serviceables.serv_ppe")
                        ->where([
                            ['serviceables.serv_type', $request->print_type],
                            ['establishments.estab_type', $request->print_estabtype],
                            ])
                        ->groupBy('establishments.id','ppe_accounts.id','serviceables.serv_type', 'establishments.estab_type')
                        ->get();
        return view('backend.print.print_consolidated', compact("item_serv", 'ppes', 'estabs', 'type'));
    }
}