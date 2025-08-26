<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ppe_account;
use App\Models\Establishment;
use App\Models\pgso_numbers;
use App\Models\Serviceables;
use DB;
use Dotenv\Validator as DotenvValidator;
use Validator;

class ServiceablesController extends Controller
{

    public function AddServiceables()
    {
        $estabs = Establishment::all();
        $ppes = ppe_account::all();
        return view("backend.items.serv_add", compact("estabs", "ppes"));
    }

    public function EditServiceables(Request $request){
        $typeEdit = $request->typeEdit;
        $items_serv = Serviceables::select(
                     "serviceables.*",
                     DB::raw("CONCAT(establishments.estab_acronym) as estab"),
                     DB::raw("CONCAT(ppe_accounts.ppe_name) as ppe"),
                     )
                     ->join('establishments','establishments.id','=','serviceables.serv_estab')
                     ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                     ->where([
                        ['serviceables.serv_estab', '=', $request->estabEdit],
                        ['serviceables.serv_ppe', '=', $request->ppeEdit],
                        ['serviceables.serv_type', '=', $request->typeEdit],
                     ])->get();
                     
        return view("backend.items.serv_edit", compact('items_serv', 'typeEdit'));
    }

    public function UpdateServiceables(Request $request){
        foreach($request->inputs as $index => $value){
            Serviceables::where('id', $index)->update([
                "serv_remarks"=> $value["serv_remarks"],
                "serv_desc"=> $value["serv_desc"],
                "serv_date"=> $value["serv_date"],
                "serv_prop"=> $value["serv_prop"],
                "serv_acctg"=> $value["serv_acctg"],
                "serv_pgso"=> $value["serv_pgso"],
                "serv_unit"=> $value["serv_unit"],
                "serv_qty"=> $value["serv_qty"],
                "serv_value"=> $value["serv_value"],
            ]);
        }

        if($request->typeEdit == 1){
            $page = "serv.rpcppe";
        }elseif($request->typeEdit == 2){
            $page = "serv.ics";
        }
        
        return redirect()->route($page)->with([
            'message' => 'Item(s) Serviceable(s) Updated Successfully',
            'alert-type' => 'success',
        ]); 
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
                    $pgso_inc = $estab->estab_acronym. '-'.$ppe->ppe_code.'-'.$item_date.'-'.str_pad($inc_one, 2, "0", STR_PAD_LEFT);
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

    
    public function ICSService()
    {
        
        $serv_ics = Serviceables::select(
                     "serviceables.*",
            DB::raw("CONCAT(establishments.estab_acronym) as estab"),
                     DB::raw("CONCAT(ppe_accounts.ppe_name) as ppe"),
            )
                                ->join('establishments','establishments.id','=','serviceables.serv_estab')
                                ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                                ->orderBy('serv_pgso','asc')
                                ->where('serv_type', 2)->get();

            return view("backend.items.serv_ics", compact("serv_ics"));
        }

    public function ServiceableManage($id)
    {
            $itemData = Serviceables::select(
                                        "serviceables.*",
                                        DB::raw("CONCAT(establishments.estab_name) as estab"),
                                        DB::raw("CONCAT(ppe_accounts.ppe_code, ' | ', ppe_accounts.ppe_name) as ppe"),
                                    )
                                    ->join('establishments','establishments.id','=','serviceables.serv_estab')
                                    ->join('ppe_accounts','ppe_accounts.id','=','serviceables.serv_ppe')
                                    ->where("serviceables.id", $id)
                                    ->first();

            $estabs = Establishment::all();
            $ppes = ppe_account::all();
            
            return view("backend.items.serv_manage", compact("itemData", "estabs", "ppes"));
    }

    public function ServiceableUpdate(Request $request){
        $serv_id = $request->id;
        $page = '';

        if($request->serv_type == 1){
            $page = 'serv.rpcppe';
        } else if($request->serv_type == 2){
            $page = 'serv.ics';
        } else if($request->serv_type == 3){
            $page = '';
        }



        $valid = Validator::make($request->all(),[
            "serv_estab"=> "required",
            "serv_ppe"=> "required",
            "serv_type"=> "required",
        ]);

        if($valid->fails()){
            return redirect()->route($page)
                             ->with([
                                "message" => "Error, Try Again!",
                                "alert-type" => "error"
                             ]);
        }

        Serviceables::findorfail($serv_id)->update([
            "serv_estab"=> $request->serv_estab,
            "serv_ppe"=> $request->serv_ppe,
            "serv_type"=> $request->serv_type,
            "serv_prop"=> $request->serv_prop,
            "serv_acctg"=> $request->serv_acctg,
            "serv_pgso"=> $request->serv_pgso,
            "serv_date"=> $request->serv_date,
            "serv_unit"=> $request->serv_unit,
            "serv_qty"=> $request->serv_qty,
            "serv_value"=> $request->serv_value,
            "serv_remarks"=> $request->serv_remarks,
            "serv_desc"=> $request->serv_desc,
        ]);

        return redirect()->route($page)
                         ->with([
                            'message'=>"Item(s) Updated Successfully!",
                            "alert-type"=> "success"
                         ]);
    }
}