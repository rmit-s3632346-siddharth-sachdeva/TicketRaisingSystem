<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function loginStore(Request $request){

    session()->put('emailId',$request->emailId);
    return redirect()->route('viewTickets.index');

    }
}
