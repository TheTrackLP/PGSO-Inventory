<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ppe_account;
use App\Models\Establishment;
use App\Models\unit_type;
use App\Models\pgso_numbers;
use App\Models\Serviceables;
use DB;
use Validator;

class ServiceablesController extends Controller
{

    public function AddServiceables()
    {
        $estabs = Establishment::all();
        $ppes = ppe_account::all();
        $units = unit_type::all();
        return view("backend.items.serv_add", compact("estabs", "ppes","units"));
    }

    public function StoreServiceables(Request $request)
    {
        $valid = Validator::make($request->all(), [
            "inputs.*.serv_ppe"=> "required",
            "inputs.*.serv_estab"=> "required",
            "inputs.*.serv_type"=> "required",
        ]);

        if ($valid->fails()) {
            return redirect()->route("serv.add")
                             ->with([
                                "message" => "Error, Try Again!",
                                "alert-type" => "error"
                             ]);
        }

        foreach ($request->inputs as $key => $value) {
            $curr_date = date("Y-m-d H:i:s");
            $estab = Establishment::where('id', $value['serv_estab'])->first();
            $ppe = ppe_account::where('id', $value['serv_ppe'])->first();

            $inc_one = pgso_numbers::where([
                ['estab_id','=', $value['serv_estab']],
                ['ppe_id','=', $value['serv_ppe']],
                ['serv_type','=', $value['serv_type']],
            ])->max('inc_pgso') + $key;

            if($value['serv_type'] == 1){
                $item_date = date('Y', strtotime($value['serv_date']));
                if($item_date < 2023){
                    $item_date = 2023;
                } else {
                    $item_date = date('Y', strtotime($value['serv_date']));
                }
            } else if ($value['serv_type'] == 2){
                if(empty($value['serv_date'])){
                    $item_date = 23;
                } else {
                    $item_date = date('y', strtotime($value['serv_date']));
                }
            } else {
                $item_date = '0000-00-00';
            }

            if($value['serv_qty'] > 1){
                if($value['serv_type'] == 1){
                    $pgso_inc = $estab->estab_code. '-'.$ppe->ppe_code.'-'.$item_date.'-'.str_pad($inc_one, 4, "0", STR_PAD_LEFT).'('.$value['serv_qty'].')';
                } else if ($value['serv_type'] == 2){
                    $pgso_inc = $estab->estab_acronym. '-'.$ppe->ppe_code.'-'.$item_date.'-'.str_pad($inc_one, 2, "0", STR_PAD_LEFT).'('.$value['serv_qty'].')';
                }
            } else {
                if($value['serv_type'] == 1){
                    $pgso_inc = $estab->estab_code. '-'.$ppe->ppe_code.'-'.$item_date.'-'.str_pad($inc_one, 4, "0", STR_PAD_LEFT);
                } else if ($value['serv_type'] == 2){
                    $pgso_inc = $estab->estab_code. '-'.$ppe->ppe_code.'-'.$item_date.'-'.str_pad($inc_one, 2, "0", STR_PAD_LEFT);
                }
            }

            $data = [
                    "serv_remarks"=> $value["serv_remarks"],
                    "serv_desc"=> $value["serv_desc"],
                    "serv_date"=> $value["serv_date"],
                    "serv_prop"=> $value["serv_prop"],
                    "serv_acctg"=> $value["serv_acctg"],
                    "serv_pgso"=> $pgso_inc,
                    "serv_unit"=> $value["serv_unit"],
                    "serv_qty"=> $value["serv_qty"],
                    "serv_value"=> $value["serv_value"],
                    "serv_estab"=> $value["serv_estab"],
                    "serv_ppe"=> $value["serv_ppe"],
                    "serv_type"=> $value["serv_type"],
                ];
                
                Serviceables::create($data);
                // dump(vars: $data);
            }

            $items = $request->input('inputs');
            $page = '';
            if(is_array($items) && !empty($items)){
                $newInput = end($items);

                $check = pgso_numbers::where([
                    ['estab_id','=', $newInput['serv_estab']],
                    ['ppe_id','=', $newInput['serv_ppe']],
                    ['serv_type','=', $newInput['serv_type']],
                ])->first();

                if(is_null($check)){
                    pgso_numbers::create([
                        'estab_id'=> $newInput['serv_estab'],
                        'ppe_id'=> $newInput['serv_ppe'],
                        'serv_type'=> $newInput['serv_type'],
                        'inc_pgso'=> $inc_one,
                    ]);
                } else {
                    pgso_numbers::where([
                        'estab_id'=> $newInput['serv_estab'],
                        'ppe_id'=> $newInput['serv_ppe'],
                        'serv_type'=> $newInput['serv_type'],
                    ])->update([
                        'inc_pgso'=> $inc_one,
                        'updated_at'=> $curr_date,
                    ]);
                }

                if($newInput['serv_type'] == 1){
                    $page = "serv.rpcppe";
                } elseif ($newInput['serv_type'] == 2) {
                    $page = "serv.ics";
                }
        }

        return redirect()->route($page)->with([
            'message' => 'Item(s) Serviceable(s) added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function RPCPPEService()
    {
        $serv_rpcppe = Serviceables::select(
                     "serviceables.*",
            DB::raw("CONCAT(establishments.estab_acronym) as estab"),
                     DB::raw("CONCAT(ppe_accounts.ppe_name) as ppe"),
            )
                                ->join('establishments','establishments.id','=','serviceables.serv_estab')
                                ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                                ->orderBy('serv_pgso','asc')
                                ->where('serv_type' ,1)->get();

        return view("backend.items.serv_rpcppe", compact("serv_rpcppe"));
    }

    public function ServiceableManage($id)
    {
        $itemData = Serviceables::findOrFail($id);
        return view("backend.items.serv_manage", compact("itemData"));
    }

    public function ICSService()
    {
        
        $serv_ics = Serviceables::select(
            DB::raw("CONCAT(establishments.estab_acronym) as estab"),
                     DB::raw("CONCAT(ppe_accounts.ppe_name) as ppe"),
            )
                                ->join('establishments','establishments.id','=','serviceables.serv_estab')
                                ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                                ->orderBy('serv_pgso','asc')
                                ->where('serv_type' ,2)->get();
        return view("backend.items.serv_ics", compact("serv_ics"));
    }
}