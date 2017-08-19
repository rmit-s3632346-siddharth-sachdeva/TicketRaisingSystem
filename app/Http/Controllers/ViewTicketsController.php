<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Comment;
use Illuminate\Support\Facades\Session;

class ViewTicketsController extends Controller
{

    public function index(Request $request){

       $emailId =  Session::get('emailId');
       $ticketList= Ticket::orderBy('created_at','DESC')->where('emailId', '=', $emailId)->paginate(7);

     /*  var_dump($emailId);
        var_dump($ticketList);
        exit;*/

        $recentTickets = Ticket::orderBy('created_at','DESC')->where('emailId', '=', $emailId)->limit(5)->get();

       return view('main.view_tickets', compact('ticketList', 'recentTickets')) ->with('i', ($request->input('page', 1) - 1) * 5);
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
        /*var_dump($status[0]);*/
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



    public function viewTicketsAdmin(Request $request){

        $ticketList= Ticket::orderBy('created_at','DESC')->paginate(5);

        if(!Session::has('recentTicketsAdmin')){
            $recentTicketsAdmin = $ticketList;
            session()->put('recentTicketsAdmin', $recentTicketsAdmin);
        }

        return view('main.view_tickets_admin', compact('ticketList')) ->with('i', ($request->input('page', 1) - 1) * 5);
    }

}