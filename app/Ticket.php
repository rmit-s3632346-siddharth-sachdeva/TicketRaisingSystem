<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'ticketId';
    public $incrementing = false;
    protected $fillable = ['ticketId', 'emailId','subject', 'priority', 'serviceArea', 'preferredContact', 'operatingSystem', 'description', 'status'];

    public function raiseTicket() {
        return $this->hasMany('App\Comment');
    }

}
