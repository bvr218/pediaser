<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ControllerRedirectPdv extends Controller
{
    public function initial(Request $request){
      

        switch(Auth::user()->level){
            case "0":
                return redirect()->route("administrator.home");
                break;
            case "1":
                return redirect()->route("PDV.home");
                break;
        }
    }
}
