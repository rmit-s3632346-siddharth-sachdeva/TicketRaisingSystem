<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackTicketsController extends Controller
{
    public function trackTickets(){
        return view('main.track_tickets');
    }
}
