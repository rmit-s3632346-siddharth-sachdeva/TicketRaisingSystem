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

    //Creating ticket model object
    public function raiseTicketCreate(){

        $ticket = new Ticket();


        return view('main.raise_ticket', ['ticket' => $ticket]);
    }

    //Storing ticket details in DB.
    public function raiseTicketStore(RaiseTicketFormRequest $request){

        $ticketId = uniqid();
        $status = "Pending";
        $priority = "";

        if(!UserDetails::where('emailId', '=', $request->emailId)->exists()){
            UserDetails::create(array_merge($request->all(), ['password'=>'password', 'role'=>'user']));
        }

        if($request->preferredContact ==  'Email'){
            $contact = $request->emailId;
        }
        else if($request->preferredContact ==  'Phone'){
            $contact = $request-> phoneNo;
        }
        //Displaying success message.
        session()->put('success', 'Thanks '.$request->firstName.' for contacting us, your ticket id is '.$ticketId.', we will contact you via '.$request->preferredContact.' on '.$contact.' shortly.');

        //Inserting ticket into DB.
        Ticket::create(array_merge($request->all(),['ticketId'=>$ticketId, 'status'=>$status, 'priority'=>$priority]));

        //Sending email to user and admin.
        Mail::to($request->emailId)->send(new TicketRaised($request,$ticketId));

        return Redirect::route('raiseTicket');
    }
}
?>