<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\ppe_account;
use App\Models\Unit_type;
use App\Models\Office;
use App\Models\pgso_number;
use App\Models\Serviceable;
use Validator;

class ServiceableController extends Controller
{
    public function AddServiceables(){
        $offices = Office::all();
        $ppes = ppe_account::all();
        $units = Unit_type::all();
        return view('backend.items.add_serviceables', compact('offices', 'units', 'ppes'));
    }

    public function StoreServiceables(Request $request){
        $valid = Validator::make($request->all(),[
            'inputs.*.serv_ofc' => 'required',
            'inputs.*.serv_ppe' => 'required',
            'inputs.*.serv_type' => 'required',
        ]);

        if($valid->fails()){
            return redirect()->route('add.service')
                             ->with([
                                'message' => 'Error, Try Again',
                                'alert-type' => 'error',
                             ]);
        }

        foreach ($request->inputs as $key => $value) {
            $current_date = date('Y-m-d H:i:s');

            $ppe = ppe_account::where('id', $value['serv_ppe'])->first();
            $office = Office::where('id', $value['serv_ofc'])->first();
            $inc_one = pgso_number::where([
                ['ofc_id', $value['serv_ofc']],
                ['ppe_id', $value['serv_ppe']],
                ['serv_type', $value['serv_type']],
            ])->max('inc_pgso') + $key;

            if($value['serv_type'] == 1){
                $item_date = date('Y', strtotime($value['serv_date']));
                if($item_date < 2023){
                    $item_date = 2023;
                } else{
                    $item_date = date('Y', strtotime($value['serv_date']));
                }
            } elseif ($value['serv_type'] == 2 ) {
                if(empty($value['serv_date'])){
                    $item_date = 23;
                } else {
                    $item_date = date('y', strtotime($value['serv_date']));
                }
            } else {
                $item_date = "Error";
            }
            
            if($value['serv_qty'] > 1){
                if($value['serv_type'] == 1){
                    $pgso_numbers = $office->office_code.'-'.$ppe->ppe_code.'-'.$item_date.'-'.str_pad($inc_one, 4, "0", STR_PAD_LEFT).'('.$value['serv_qty'].')';
                } else if ($value['serv_type'] == 2) {
                    $pgso_numbers = $office->office_acronym.'-'.$ppe->ppe_code.'-'.$item_date.'-'.str_pad($inc_one, 2, "0", STR_PAD_LEFT).'('.$value['serv_qty'].')';
                }
            } else {
                if($value['serv_type'] == 1){
                    $pgso_numbers = $office->office_code.'-'.$ppe->ppe_code.'-'.$item_date.'-'.str_pad($inc_one, 4, "0", STR_PAD_LEFT);;
                } else if ($value['serv_type'] == 2) {
                    $pgso_numbers = $office->office_acronym.'-'.$ppe->ppe_code.'-'.$item_date.'-'.str_pad($inc_one, 2, "0", STR_PAD_LEFT);;
                }
            }

            $data = [
                'serv_article' => $value['serv_article'],
                'serv_desc' => $value['serv_desc'],
                'serv_prop' => $value['serv_prop'],
                'serv_acctg' => $value['serv_acctg'],
                'serv_pgso' => $pgso_numbers,
                'serv_date' => $value['serv_date'],
                'serv_unit' => $value['serv_unit'],
                'serv_qty' => $value['serv_qty'],
                'serv_value' => $value['serv_value'],
                'serv_remarks' => $value['serv_remarks'],
                'serv_ofc' => $value['serv_ofc'],
                'serv_ppe' => $value['serv_ppe'],
                'serv_status' => $value['serv_status'],
                'serv_type' => $value['serv_type'],
                // 'created_at' => $current_date,
            ];

            Serviceable::create($data);
            // dump($data);


        }

        $items = $request->input('inputs');
        $page = '';
        if(is_array($items) && !empty($items)){
            $newInput = end($items);

            $check = pgso_number::where([
                ['ofc_id', $newInput['serv_ofc']],
                ['ppe_id', $newInput['serv_ppe']],
                ['serv_type', $newInput['serv_type']],
            ])->first();

            if(is_null($check)){
                pgso_number::create([
                    'ofc_id' => $newInput['serv_ofc'],
                    'ppe_id' => $newInput['serv_ppe'],
                    'serv_type' => $newInput['serv_type'],
                    'inc_pgso' => $inc_one,
                ]);
            } else {
                pgso_number::where([
                    ['ofc_id', $newInput['serv_ofc']],
                    ['ppe_id', $newInput['serv_ppe']],
                    ['serv_type', $newInput['serv_type']],
                ])->update([
                    'inc_pgso' => $inc_one,
                    'updated_at' => $current_date,
                ]);
            }

            if($newInput['serv_type'] == 1){
                $page = "all.rpcppe";
            } elseif ($newInput['serv_type'] == 2) {
                $page = "all.ics";
            }
        }
        return redirect()->route($page)->with([
            'message' => 'Item(s) Serviceable(s) added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function RPCPPEServiceables(){
        $offices = Office::all();
        $ppes = ppe_account::all();
        $items_rpcppe = Serviceable::where('serv_type', 1)->get();
        return view('backend.items.rpcppe.serv_rpcppe', compact('offices', 'ppes', 'items_rpcppe'));
    }

    public function EditServiceable($id){
        $serv_item = Serviceable::findorfail($id);
        $offices = Office::all();
        $ppes = ppe_account::all();
        $units = Unit_type::all();
        return view('backend.items.edit_serviceables', compact('serv_item', 'offices', 'ppes', 'units'));
    }

    public function UpdateServiceable(Request $request){
        $rpcppe_id = $request->id;

        $valid = Validator::make($request->all(),[
            'serv_ofc' => 'required',
            'serv_ppe' => 'required',
        ]);

        if($valid->fails()){
            return redirect()->route('all.rpcppe')->with([
                'message' => 'Error, Try Again',
                'alert-type' => 'error',
            ]);
        }

        Serviceable::findorfail($rpcppe_id)->update([
            'serv_article' => $request->serv_article,
            'serv_prop' => $request->serv_prop,
            'serv_acctg' => $request->serv_acctg,
            'serv_pgso' => $request->serv_pgso,
            'serv_date' => $request->serv_date,
            'serv_unit' => $request->serv_unit,
            'serv_qty' => $request->serv_qty,
            'serv_value' => $request->serv_value,
            'serv_remarks' => $request->serv_remarks,
            'serv_desc' => $request->serv_desc,
            'serv_ofc' => $request->serv_ofc,
            'serv_ppe' => $request->serv_ppe,
            'serv_status' => $request->serv_status,
        ]);

        $page = "";
        if($request->serv_type == 1){
            $page = "all.rpcppe";
        } elseif ($request->serv_type == 2) {
            $page = "all.ics";
        }
        return redirect()->route($page)->with([
            'message' => 'Item Serviceable updated Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function ICSServiceables(){
        $offices = Office::all();
        $ppes = ppe_account::all();

        $items_ics = DB::table('serviceables')
                        ->select(
                            'serviceables.*',
                            DB::raw("CONCAT(offices.office_acronym) as office"),
                            DB::raw("CONCAT(ppe_accounts.ppe_code,' | ', ppe_accounts.ppe_name) as ppe"),
                          )
                        ->join('offices', 'offices.id', '=', 'serviceables.serv_ofc')
                        ->join('ppe_accounts', 'ppe_accounts.id', '=', 'serviceables.serv_ppe')
                        ->where('serviceables.serv_type', 2)
                        ->orderBy('serviceables.serv_pgso', 'asc')
                        ->get();
                        
        return view('backend.items.ics.serv_ics', compact('offices', 'ppes', 'items_ics'));
    }
}