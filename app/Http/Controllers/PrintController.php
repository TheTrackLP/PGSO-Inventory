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

        return view('backend.print.print_rpcppe', compact('items_ics', 'establishment', 'ppe_acct', 'total'));
    }
}
