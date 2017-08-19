<?php

namespace App\Http\Controllers;

use App\UserDetails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function loginStore(Request $request)
    {

        session()->put('emailId', $request->emailId);

        $role = UserDetails::where('emailId', '=', $request->emailId)->pluck('role');
        if (isset($role[0])) {

        session()->put('role', $role[0]);

        }

    return redirect()->route('viewTickets.index');

    }
}
