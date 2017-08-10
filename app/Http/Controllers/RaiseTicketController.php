<?php

namespace App\Http\Controllers;
use App\Model\Tickets;
use Illuminate\Http\Request;

class RaiseTicketController extends Controller
{
    public function raiseTicket(){
        $ticket = new Tickets;
        return view('main.raise_ticket',['ticket' => $ticket]);
    }

    public function create(Request $request){

    }
}
