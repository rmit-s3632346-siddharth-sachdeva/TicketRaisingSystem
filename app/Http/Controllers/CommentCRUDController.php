<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentCRUDController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::all();
        return $comments;
    }

    public function store(Request $request)
    {
        try {
            $comment = new Comment();
            $comment->commentId = uniqid();
            $comment->description = $request->description;
            $comment->emailId = $request->emailId;
            $comment->ticketId = $request->ticketId;
            $saved = $comment->save();

            if(!$saved){
                return array("response_status" => "ERROR");
            }else{
                return array("response_status" => "SUCCESS");
            }
        }

        catch(Exception $e) {
            return array("status" => "ERROR");
        }

        return array("status" => "SUCCESS");
    }

    public function show($id)
    {
        $comment= Comment::find($id);
        return $comment;
    }

    public function update(Request $request, $id)
    {
        try {
            $comment = Comment::find($id);

            $comment->description = $request->description;
            $comment->emailId = $request->emailId;
            $comment->ticketId = $request->ticketId;
            $saved = $comment->save();

            if(!$saved){
                return array("status" => "ERROR");
            }
        }
        catch(Exception $e) {
            return array("status" => "ERROR");
        }

        return array("status" => "SUCCESS");;
    }

    public function destroy($id)
    {
        try {
            $comment = Comment::find($id);
            if ($comment != null) {
                $comment->delete();
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
