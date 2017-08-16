<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Illuminate\Support\Facades\Session;

class ViewTicketsController extends Controller
{
   public function viewTickets(Request $request){

       $ticketList= Ticket::orderBy('created_at','DESC')->paginate(3);

       /*$ticketList = Ticket::where('ticketId', '=', '5992bb41d33c9')->get();*/

       if(!Session::has('recentTickets')){
           $recentTickets = $ticketList;
           session()->put('recentTickets', $recentTickets);
       }

       return view('main.view_tickets', compact('ticketList')) ->with('i', ($request->input('page', 1) - 1) * 5);
   }

    public function viewTicketsAdmin(Request $request){

        $ticketList= Ticket::orderBy('created_at','DESC')->paginate(1);

        if(!Session::has('recentTickets')){
            $recentTickets = $ticketList;
            session()->put('recentTickets', $recentTickets);
        }

        return view('main.view_tickets_admin', compact('ticketList')) ->with('i', ($request->input('page', 1) - 1) * 5);
    }

}