<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Comment;
use Illuminate\Support\Facades\Session;

class ViewTicketsController extends Controller
{
   /*public function viewTickets(Request $request){*/
    public function index(Request $request){

       $emailId =  $_COOKIE['emailId'];
       $ticketList= Ticket::orderBy('created_at','DESC')->where('emailId', '=', $emailId)->paginate(3);

       /*var_dump($emailId);
        var_dump($ticketList);
        exit;*/
       /*$ticketList = Ticket::where('ticketId', '=', '5992bb41d33c9')->get();*/

        $recentTickets = Ticket::orderBy('created_at','DESC')->where('emailId', '=', $emailId)->limit(3)->get();

       /*if(!Session::has('recentTickets')){
           $recentTickets = $ticketList;
           session()->put('recentTickets', $recentTickets);
       }*/

       return view('main.view_tickets', compact('ticketList', 'recentTickets')) ->with('i', ($request->input('page', 1) - 1) * 5);
   }


    public function show($ticketId)
    {
        $emailId =  $_COOKIE['emailId'];
        session()->put('ticketId', $ticketId);
        $ticket = Ticket::where('ticketId', '=', $ticketId)->get();
        $commentList = Comment::where('ticketId', '=', $ticketId)->get();
        $recentTickets = Ticket::orderBy('created_at','DESC')->where('emailId', '=', $emailId)->limit(3)->get();
        return view('main.track_tickets',compact('ticket', 'commentList', 'recentTickets'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);
        $ticketId = Session::get('ticketId');
        $emailId =  $_COOKIE['emailId'];
        $commentId = uniqid();
        Comment::create(array_merge($request->all(),['ticketId'=>$ticketId,'commentId'=>$commentId,'emailId'=>$emailId]));
        return redirect()->back();
        /*return view(route('viewTickets.show', $ticketId));*/
    }





    public function viewTicketsAdmin(Request $request){

        $ticketList= Ticket::orderBy('created_at','DESC')->paginate(5);

        if(!Session::has('recentTicketsAdmin')){
            $recentTicketsAdmin = $ticketList;
            session()->put('recentTicketsAdmin', $recentTicketsAdmin);
        }

        return view('main.view_tickets_admin', compact('ticketList')) ->with('i', ($request->input('page', 1) - 1) * 5);
    }

}