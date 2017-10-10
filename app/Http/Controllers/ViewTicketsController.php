<?php

namespace App\Http\Controllers;

use App\UserDetails;
use Illuminate\Http\Request;
use App\Ticket;
use App\Comment;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AddCommentRequest;
use Illuminate\Support\Facades\Auth;


class ViewTicketsController extends Controller
{
    //Calling middleware to make sure user is logged in or not.
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Showing comments.
    public function index(Request $request){

        $emailId =  Auth::id();

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

    //Showing comments
    public function show($ticketId)
    {
        $emailId =  Auth::id();
        session()->put('ticketId', $ticketId);
        $ticket = Ticket::where('ticketId', '=', $ticketId)->get();
        $commentList = Comment::where('ticketId', '=', $ticketId)->get();
        $recentTickets = Ticket::orderBy('created_at','DESC')->where('emailId', '=', $emailId)->limit(3)->get();

        return view('main.track_tickets',compact('ticket', 'commentList', 'recentTickets'));
    }

    //Adding comments
    public function store(AddCommentRequest $request)
    {
        $ticketId = Session::get('ticketId');
        $emailId =  Auth::id();
        //$emailId =  Session::get('emailId');
        $commentId = uniqid();
        Comment::create(array_merge($request->all(),['ticketId'=>$ticketId,'commentId'=>$commentId,'emailId'=>$emailId]));
        return redirect()->back();

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

    //Update ticket
    public function edit(Request $request, $ticketId)
    {
        Ticket::where('ticketId', $ticketId)->update(array('status'=>$request->status));
        return redirect()->back();
    }

    //Search ticket by id.
    public function search(Request $request){

        $this->validate($request, [
            'search' => 'required',

        ]);

        $ticketId = $request->search;
        $emailId =  Auth::id();
        $role = UserDetails::where('emailId', '=', $emailId) ->pluck('role');

        if(isset($role[0]) && $role[0] == 'admin'){
            $ticketList= Ticket::orderBy('created_at','DESC')->where('ticketId', '=', $ticketId)->paginate(7);
            $recentTickets = Ticket::orderBy('created_at','DESC')->limit(5)->get();
            return view('main.view_tickets_admin', compact('ticketList', 'recentTickets')) ->with('i', ($request->input('page', 1) - 1) * 5);
        }else{
            $ticketList= Ticket::orderBy('created_at','DESC')->where('emailId', '=', $emailId)->where('ticketId', '=', $ticketId)->paginate(7);
            $recentTickets = Ticket::orderBy('created_at','DESC')->where('emailId', '=', $emailId)->limit(5)->get();

            return view('main.view_tickets', compact('ticketList', 'recentTickets')) ->with('i', ($request->input('page', 1) - 1) * 5);
        }

    }

}