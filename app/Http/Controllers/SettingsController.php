<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function Establishment(){
        return view("backend.settings.establishments");
    }

    public function PPEAccount(){
        return view("backend.settings.ppe_account");
    }

    public function UnitTypes(){
        return view("backend.settings.unit_types");
    }

    public function Classification(){
        return view("backend.settings.classes");
    }
}