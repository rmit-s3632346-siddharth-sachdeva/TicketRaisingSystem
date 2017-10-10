<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = "commentId";
    //since generating custom unique keys
    public $incrementing = false;
    protected $fillable = ['commentId','description','emailId','ticketId'];

    //Cardinality
    public function comments() {
        return $this->hasOne('App\Ticket');
    }

}
