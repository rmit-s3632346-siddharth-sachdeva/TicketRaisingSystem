<?php
namespace App\Http\Controllers;
use App\Http\Requests\RaiseTicketFormRequest;
use App\Ticket;
use App\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Session;
class RaiseTicketController extends Controller
{
    public function raiseTicketCreate(){

        $ticket = new Ticket();


        return view('main.raise_ticket', ['ticket' => $ticket]);
    }
    public function raiseTicketStore(RaiseTicketFormRequest $request){

        $ticketId = uniqid();
        $status = "Pending";

        /*$result = UserDetails::where('emailId', '=', $request->emailId)->first();*/



        if(!UserDetails::where('emailId', '=', $request->emailId)->exists()){

            UserDetails::create(array_merge($request->all(), ['password'=>'password']));

        }

        if($request->preferredContact ==  'Email'){
            $contact = $request->emailId;
        }
        else if($request->preferredContact ==  'Phone'){
            $contact = $request-> phoneNo;
        }
        session()->put('success', 'Thanks '.$request->firstName.' for contacting us, your ticket id is '.$ticketId.', we will contact you via '.$request->preferredContact.' on '.$contact.' shortly.');

        Ticket::create(array_merge($request->all(),['ticketId'=>$ticketId, 'status'=>$status]));

        /*Ticket::create($request->all());*/
        return Redirect::route('raiseTicket');
    }
}
?>