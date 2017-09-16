<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = "commentId";
    public $incrementing = false;
    protected $fillable = ['commentId','description','emailId','ticketId'];

}
