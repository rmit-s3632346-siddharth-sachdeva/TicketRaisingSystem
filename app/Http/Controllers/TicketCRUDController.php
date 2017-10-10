<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketCRUDController extends Controller
{
    //Show all tickets
    public function index(Request $request)
    {
        $tickets= Ticket::all();
        return $tickets;
    }

    //Inserting ticket into DB.
    public function store(Request $request)
    {
        try {
            $ticket = new Ticket;
            $ticket->ticketId = uniqid();
            $ticket->emailId = $request->emailId;
            $ticket->subject = $request->subject;
            $ticket->priority = $request->priority;
            $ticket->serviceArea = $request->serviceArea;
            $ticket->preferredContact = $request->preferredContact;
            $ticket->operatingSystem = $request->operatingSystem;
            $ticket->description = $request->description;
            $ticket->status = $request->status;
            $saved = $ticket->save();

            if(!$saved){
                return array("status" => "ERROR");
            }
        }

        catch(Exception $e) {
            return array("status" => "ERROR");
        }

        return array("status" => "SUCCESS");
    }

    //Show ticket by id.
    public function show($id)
    {
        $ticket= Ticket::find($id);
        return $ticket;
    }

    public function update(Request $request, $id)
    {
        try {
            $ticket = Ticket::find($id);
            $ticket->emailId = $request->emailId;
            $ticket->subject = $request->subject;
            $ticket->priority = $request->priority;
            $ticket->serviceArea = $request->serviceArea;
            $ticket->preferredContact = $request->preferredContact;
            $ticket->operatingSystem = $request->operatingSystem;
            $ticket->description = $request->description;
            $ticket->status = $request->status;

            $saved = $ticket->save();

            if(!$saved){
                return array("response_status" => "ERROR");
            }
        }
        catch(Exception $e) {
            return array("response_status" => "ERROR");
        }

        return array("response_status" => "SUCCESS");;
    }

    public function destroy($id)
    {
        try {
            $ticket = Ticket::find($id);
            if ($ticket != null) {
                $ticket->delete();
            } else {
                return array("status" => "ERROR");
            }
        }
        catch(Exception $e) {
            return array("status" => "ERROR");
        }

        return array("status" => "SUCCESS");;
    }

}
