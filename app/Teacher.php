<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use Notifiable;
    protected $table = 'teachers';

    protected $fillable = [
        'name','username','email'
    ];

    protected $hidden = [
        'password'
    ];

}
