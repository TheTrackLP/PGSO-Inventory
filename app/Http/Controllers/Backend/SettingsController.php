<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Office;
use App\Models\ppe_account;
use App\Models\Unit_type;
use App\Models\Class_report;

class SettingsController extends Controller
{
    public function AllOffices(){
        $offices = Office::orderBy("office_sequence", "asc")->get();
        return view('backend.settings.office.offices', compact('offices'));
    }

    public function AddOffices(Request $request){
        $valid = Validator::make($request->all(), [
            'office_acronym' => 'required',
            'office_name' => 'required',
            'office_incharge' => 'required',
            'office_position' => 'required',
            'office_type' => 'required',
        ]);
        
        if ($valid->fails()) {
            return redirect()->route('all.offices')
                ->withErrors($valid)
                ->with([
                    'message' => 'Error, Try Again',
                    'alert-type' => 'error',
                ]);
        }

        Office::create([
            'office_acronym' => strtoupper($request->office_acronym),
            'office_code' => $request->office_code,
            'office_name' => $request->office_name,
            'office_incharge' => strtoupper($request->office_incharge),
            'office_position' => $request->office_position,
            'office_type' => $request->office_type,
        ]);

        return redirect()->route('all.offices')->with([
            'message' => 'Office added Successfully',
            'alert-type' => 'success',
        ]);
        
    }

    public function EditOffices($id){
        $ofc = Office::findorfail($id);
        return response()->json([
            'status'=>200,
            'ofc'=>$ofc,
        ]);
    }

    public function UpdateOffices(Request $request){
        $ofc = $request->id;

        $valid = Validator::make($request->all(), [
            'office_acronym' => 'required',
            'office_name' => 'required',
            'office_incharge' => 'required',
            'office_position' => 'required',
            'office_type' => 'required',
        ]);
        
        if ($valid->fails()) {
            return redirect()->route('all.offices')
                ->withErrors($valid)
                ->with([
                    'message' => 'Error, Try Again',
                    'alert-type' => 'error',
                ]);
        }

        Office::findorfail($ofc)->update([
            'office_acronym' => strtoupper($request->office_acronym),
            'office_code' => $request->office_code,
            'office_name' => $request->office_name,
            'office_incharge' => strtoupper($request->office_incharge),
            'office_position' => $request->office_position,
            'office_type' => $request->office_type,
        ]);

        return redirect()->route('all.offices')->with([
            'message' => 'Office updated Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function SequenceOffice(Request $request){
        $valid = Validator::make($request->all(),[
            'inputs.*.id' => 'required',
            'inputs.*.office_sequence' => 'required',
        ]);
        
        if($valid->fails()){
            return redirect()->route('all.offices')
            ->withErrors($valid)
            ->with([
                'message' => 'Error, Try Again',
                'alert-type' => 'error',
            ]);
        }
        foreach ($request->inputs as $key => $sequence) {
            // dump($sequence);
            Office::where('id', $sequence['id'])->update([
                'office_sequence' => $sequence['office_sequence'],
            ]);
        }
        
        return redirect()->route('all.offices')->with([
            'message' => 'Offices/Hospitals Sequence Updated successfully',
            'alert-type' => 'success',
        ]);
        
    }

    
    public function SequenceHospital(Request $request){
        $valid = Validator::make($request->all(),[
            'inputs.*.id' => 'required',
            'inputs.*.office_sequence' => 'required',
        ]);
        
        if($valid->fails()){
            return redirect()->route('all.offices')
            ->withErrors($valid)
            ->with([
                'message' => 'Error, Try Again',
                'alert-type' => 'error',
            ]);
        }
        foreach ($request->inputs as $key => $sequence) {
            // dump($sequence);
            Office::where('id', $sequence['id'])->update([
                'office_sequence' => $sequence['office_sequence'],
            ]);
        }
        
        return redirect()->route('all.offices')->with([
            'message' => 'Offices/Hospitals Sequence Updated successfully',
            'alert-type' => 'success',
        ]);
        
    }

    public function AllPPEAccount(){
        $ppes = ppe_account::paginate(9);
        return view('backend.settings.ppe.ppe_account', compact('ppes'));
    }

    public function StorePPEAccount(Request $request){
        $valid = Validator::make($request->all(), [
            'ppe_code' => 'required',    
            'ppe_name' => 'required', 
        ]);

        if($valid->fails()){
            return redirect()->route('all.ppe')
                            ->withErrors($valid)
                            ->with([
                                'message' => 'Error, Try Again',
                                'alert-type' => 'error',
                            ]);
        }

        ppe_account::create($request->all());

        return redirect()->route('all.ppe')->with([
            'message' => 'PPE Account added Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function AllUnitTypes(){
        $units = Unit_type::all();
        return view('backend.settings.unit.unit_types', compact('units'));
    }

    public function AddUnitTypes(Request $request){
        $valid = Validator::make($request->all(), [
            'unit_name' => 'required',
        ]);

        if($valid->fails()){
            return redirect()->route('all.units')
                             ->withErrors($valid)
                             ->with([
                                'message' => 'Error, Try Again,',
                                'alert-type' => 'error'
                             ]);
        }

        Unit_type::create($request->all());

        return redirect()->route('all.units')->with([
            'message' => 'Unit Type added Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function AllAccounts(){
        return view('backend.settings.account.accounts');
    }

    public function AllClassReports(){
        $reports = Class_report::all();
        return view('backend.settings.class.reports', compact('reports'));
    }

    public function AddClassReports(Request $request){
        $valid = Validator::make($request->all(), [
            'class_name' => 'required',
            'class_acronym' => 'required',
            'class_desc' => 'required',
        ]);

        if($valid->fails()){
            return redirect()->route('all.class')
                             ->withErrors($valid)
                             ->with([
                                'message' => 'Error, Try Again,',
                                'alert-type' => 'error'
                             ]); 
        }

        Class_report::create($request->all());

        return redirect()->route('all.class')->with([
            'message' => 'Class Report Successfully',
            'alert-type' => 'success',
        ]);
    }
}