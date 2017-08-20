<?php

namespace App\Http\Controllers;

use App\UserDetails;
use Illuminate\Http\Request;
use App\Ticket;
use App\Comment;
use Illuminate\Support\Facades\Session;

class ViewTicketsController extends Controller
{

    public function index(Request $request){
       $emailId =  Session::get('emailId');

           /*var_dump($emailId);
           exit;*/

       $role = UserDetails::where('emailId', '=', $emailId) ->pluck('role');

       if(isset($role[0]) && $role[0] == 'admin'){
           $ticketList= Ticket::orderBy('created_at','DESC')->paginate(7);
           $recentTickets = Ticket::orderBy('created_at','DESC')->limit(5)->get();
           return view('main.view_tickets_admin', compact('ticketList', 'recentTickets')) ->with('i', ($request->input('page', 1) - 1) * 5);
       }else{
           $ticketList= Ticket::orderBy('created_at','DESC')->where('emailId', '=', $emailId)->paginate(7);
           $recentTickets = Ticket::orderBy('created_at','DESC')->where('emailId', '=', $emailId)->limit(5)->get();
           return view('main.view_tickets', compact('ticketList', 'recentTickets')) ->with('i', ($request->input('page', 1) - 1) * 5);
       }

   }


    public function show($ticketId)
    {
        $emailId =  Session::get('emailId');
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
        $emailId =  Session::get('emailId');
        $commentId = uniqid();
        Comment::create(array_merge($request->all(),['ticketId'=>$ticketId,'commentId'=>$commentId,'emailId'=>$emailId]));
        return redirect()->back();
        /*return view(route('viewTickets.show', $ticketId));*/
    }

    public function update(Request $request, $ticketId )
    {
     /*var_dump($request->ticketId);*/
       /* var_dump($ticketId);*/



        $status = Ticket::where('ticketId', $ticketId)->pluck('status');

            if($status[0] == 'Closed'){
                $newStatus = 'Pending';
            }else{
                $newStatus = 'Closed';
            }
    /*    var_dump($newStatus);
        exit;*/
        Ticket::where('ticketId', $ticketId)->update(array('status'=>$newStatus));

        return redirect()->route('viewTickets.index') ->with('success','Ticket '.$newStatus.' successfully');
    }


    public function setEditable(Request $request){
        $ticket = json_decode($request->ticketObject, true);


/*        $ticket->setEditable = true;*/

        var_dump($ticket);
        var_dump($ticket[0]->ticketId);
        /*echo 'id:'.$ticket->ticketId;*/
        exit;
    }
    public function edit(Request $request, $ticketId)
    {
        Ticket::where('ticketId', $ticketId)->update(array('status'=>$request->status));
        return redirect()->back();
    }
}