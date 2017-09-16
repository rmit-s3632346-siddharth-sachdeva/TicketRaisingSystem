<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserDetails extends Authenticatable
{
    use Notifiable;

    protected $table = 'user_details';
    protected $primaryKey = "emailId";
    public $incrementing = false;
    protected $fillable = ['emailId', 'password','firstName', 'lastName', 'phoneNo', 'role'];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
