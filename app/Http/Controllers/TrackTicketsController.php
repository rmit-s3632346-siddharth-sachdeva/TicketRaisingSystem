<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Ticket;
class TrackTicketsController extends Controller
{
    public function trackTickets(Request $request){
       /* $newComment = new Comment();
        //get previous comments and pass to views
       // $commentsList= Comment::orderBy('commentId','DESC')->paginate(1);
       $commentList = Comment::all();
        $problemDescription = Ticket::where('ticketId','=','59942bd4cb9f5')->pluck('description');
        return view('main.track_tickets',compact('commentList','problemDescription','newComment')) ->with('i', ($request->input('page', 1) - 1) * 5);
       // return view('main.track_tickets');*/
    }
    public function tractTicketCommentStore(AddCommentFormRequest $request){
       /* /*$ticketId=

        $emailId=
        */
       /* $commentId= uniqid();
        Comment::create(array_merge($request->all(),['ticketId'=>'cd','commentId'=>'kl','emailId'=>'test@test.com']));
        return Redirect::route('raiseTicket');*/
    }
}
