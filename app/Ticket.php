<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['subject', 'priority', 'serviceArea', 'preferredContact', 'operatingSystem', 'description', 'status', 'userId'];

    public function raiseTicket() {
        return $this->hasMany('App\Comment');
    }

}
