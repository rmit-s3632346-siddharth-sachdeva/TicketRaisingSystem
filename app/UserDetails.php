<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'user_details';
    protected $fillable = ['emailId', 'password','firstName', 'lastName', 'phoneNo', 'role'];

}
