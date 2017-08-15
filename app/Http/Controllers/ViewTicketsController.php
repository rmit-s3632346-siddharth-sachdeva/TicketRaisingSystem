<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class ViewTicketsController extends Controller
{
   public function viewTickets(Request $request){
       /*$ticketList = Ticket::all();*/
       /*return view('main.view_tickets', ['ticketList' => $ticketList]);*/
       $ticketList= Ticket::orderBy('ticketId','DESC')->paginate(1);
       return view('main.view_tickets',compact('ticketList')) ->with('i', ($request->input('page', 1) - 1) * 5);
   }
}