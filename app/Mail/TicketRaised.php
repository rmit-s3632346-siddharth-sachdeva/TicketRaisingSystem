<?php

namespace App\Mail;

use App\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketRaised extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $request;
    protected $ticketId;

    public function __construct(Request $request, $ticketId)
    {
        $this->request = $request;
        $this->ticketId = $ticketId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.TicketRaised')->with([

            'subject'=>$this->request->subject

        ])->subject('Ticket Raised: '.$this->ticketId);
    }
}
