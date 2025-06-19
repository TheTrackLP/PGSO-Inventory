<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceablesController extends Controller
{
    public function RPCPPEService()
    {
        return view("backend.items.serv_rpcppe");
    }

    public function ICSService()
    {
        return view("backend.items.serv_ics");
    }
}