<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'ticketId';
    //since generating custom unique keys
    public $incrementing = false;
    protected $fillable = ['ticketId', 'emailId','subject', 'priority', 'serviceArea', 'preferredContact', 'operatingSystem', 'description', 'status'];

    //Cardinality
    public function ticket() {
        return $this->hasMany('App\Comment');
    }

}
