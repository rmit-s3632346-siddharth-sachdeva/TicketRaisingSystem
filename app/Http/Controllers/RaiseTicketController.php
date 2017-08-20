<?php
namespace App\Http\Controllers;
use App\Http\Requests\RaiseTicketFormRequest;
use App\Mail\TicketRaised;
use App\Ticket;
use App\UserDetails;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Mail;

class RaiseTicketController extends Controller
{
    public function raiseTicketCreate(){

        $ticket = new Ticket();


        return view('main.raise_ticket', ['ticket' => $ticket]);
    }
    public function raiseTicketStore(RaiseTicketFormRequest $request){

        $ticketId = uniqid();
        $status = "Pending";

        if(!UserDetails::where('emailId', '=', $request->emailId)->exists()){
            UserDetails::create(array_merge($request->all(), ['password'=>'password', 'role'=>'user']));
        }

        if($request->preferredContact ==  'Email'){
            $contact = $request->emailId;
        }
        else if($request->preferredContact ==  'Phone'){
            $contact = $request-> phoneNo;
        }
        session()->put('success', 'Thanks '.$request->firstName.' for contacting us, your ticket id is '.$ticketId.', we will contact you via '.$request->preferredContact.' on '.$contact.' shortly.');

        Ticket::create(array_merge($request->all(),['ticketId'=>$ticketId, 'status'=>$status]));

        Mail::to($request->emailId)->send(new TicketRaised($request,$ticketId));

        return Redirect::route('raiseTicket');
    }
}
?>