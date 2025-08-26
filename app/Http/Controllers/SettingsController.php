<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Establishment;
use App\Models\ppe_account;
use Validator;
use Carbon\Carbon;

class SettingsController extends Controller
{
    public function Establishment(){
        $estabs = Establishment::all();
        return view("backend.settings.establishments", compact("estabs"));
    }

    public function AddEstablishment(Request $request)
    {
        $valid = Validator::make($request->all(), [
            "estab_acronym"=>"required",
            "estab_name"=>"required",
            "estab_incharge"=>"required",
            "estab_position"=>"required",
            "estab_type"=>"required",
        ]);

        if($valid->fails()){
            return redirect()->route('estab')
                             ->with([
                                "message"=> "Error!, Try Again.",
                                "alert-type"=> "error",
                             ]);
        }
        Establishment::create([
            "estab_acronym"=>strtoupper($request->estab_acronym),
            "estab_code"=>$request->estab_code,
            "estab_name"=> ucwords($request->estab_name),
            "estab_incharge"=>strtoupper($request->estab_incharge),
            "estab_position"=>$request->estab_position,
            "estab_type"=>$request->estab_type,
        ]);
        
        return redirect()->route("estab")
                         ->with([
                            "message"=> "Establishment Added!",
                            "alert-type"=> "success",
                         ]);
    }
    
    public function EditEstablishment($id){
        $estab = Establishment::findOrFail($id);
        return response()->json([
            'estab'=>$estab,
        ]);
    }

    public function UpdateEstablishment(Request $request)
    {
        $estab_id = $request->id;
        
        $valid = Validator::make($request->all(), [
            "estab_acronym"=>"required",
            "estab_code"=>"required",
            "estab_name"=>"required",
            "estab_incharge"=>"required",
            "estab_position"=>"required",
            "estab_type"=>"required",
        ]);

        if($valid->fails()){
            return redirect()->route('estab')
                             ->with([
                                "message"=> "Error!, Try Again.",
                                "alert-type"=> "error",
                             ]);
        }
        
        Establishment::findorfail($estab_id)->update([
            "estab_acronym"=>strtoupper($request->estab_acronym),
            "estab_code"=>$request->estab_code,
            "estab_name"=> ucwords($request->estab_name),
            "estab_incharge"=>strtoupper($request->estab_incharge),
            "estab_position"=>$request->estab_position,
            "estab_type"=>$request->estab_type,
            'updated_at' => Carbon::now(),
        ]);
        
        return redirect()->route("estab")
                         ->with([
                            "message"=> "Establishment Updated!",
                            "alert-type"=> "success",
            ]);
    }

    public function DeleteEstablishment($id)
    {
        $estab_id = Establishment::findorfail($id)->delete();
        return redirect()->route("estab")
                         ->with([
                            "message"=> "Establishment Deleted!",
                            "alert-type"=> "warning",
                         ]);
    }

    public function PPEAccount(){
        $ppes = ppe_account::all();
        return view("backend.settings.ppe_account", compact("ppes"));
    }

    public function AddPPEAccount(Request $request)
    {
        $valid = Validator::make($request->all(), [
            "ppe_code"=> "required",
            "ppe_name"=> "required",
        ]);

        if($valid->fails()){
            return redirect()->route('ppe_acct')
                             ->with([
                                'message'=> 'Error, Try Again!',
                                'alert-type'=> 'error',
                             ]);
        }

        ppe_account::create([
            'ppe_code'=> $request->ppe_code,
            'ppe_life'=> $request->ppe_life,
            'ppe_name'=> $request->ppe_name,
        ]);

        return redirect()->route('ppe_acct')
                         ->with([
                            'message'=> 'PPE Account Added!',
                            'alert-type'=> 'success',
                        ]);
    }

    public function EditPPEAccount($id){
        $ppe_id = ppe_account::findorfail($id);
        return response()->json([
            'ppe'=>$ppe_id,
        ]);
    }

    public function UpdatePPEAccount(Request $request)
    {
        $ppe_id = $request->id;

        $valid = Validator::make($request->all(), [
            "ppe_code"=> "required",
            "ppe_life"=> "required",
            "ppe_name"=> "required",
        ]);

        if($valid->fails()){
            return redirect()->route('ppe_acct')
                             ->with([
                                'message'=> 'Error, Try Again!',
                                'alert-type'=> 'error',
                             ]);
        }

        ppe_account::findorfail($ppe_id)->update([
            'ppe_code'=> $request->ppe_code,
            'ppe_life'=> $request->ppe_life,
            'ppe_name'=> $request->ppe_name,
        ]);

        return redirect()->route('ppe_acct')
                         ->with([
                            'message'=> 'PPE Account Updated!',
                            'alert-type'=> 'success',
                        ]);
    }

    public function DeletePPEAccount($id)
    {
        ppe_account::findorfail($id)->delete();
        return redirect()->route("ppe_acct")
                         ->with([
                            "message"=> "PPE Account Deleted!",
                            "alert-type"=> "warning",
                         ]);
    }

}