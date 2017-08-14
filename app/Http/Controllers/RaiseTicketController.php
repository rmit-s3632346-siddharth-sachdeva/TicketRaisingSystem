<?php

namespace App\Http\Controllers;

use App\Http\Requests\RaiseTicketFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Session;

class RaiseTicketController extends Controller
{
    public function raiseTicketCreate(){

        $emailId =  $_COOKIE['emailId'];

        return view('main.raise_ticket', ['key'=>$emailId]);
    }

    public function raiseTicketStore(RaiseTicketFormRequest $request){
        if($request->preferredContact ==  'Email'){
            $contact = $request->emailId;
        }
        else if($request->preferredContact ==  'Phone'){
            $contact = $request-> phoneNo;
        }

        session()->put('success', 'Thanks '.$request->name.' for contacting us, we will contact you via '.$request->preferredContact.' on '.$contact.' shortly.');

        return Redirect::route('raiseTicket');
    }
}
?>

