<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;
    protected $table = 'students';
    //
    protected $fillable = [
        'name','username','email'
    ];
    protected $hidden = [
        'password'
    ];


    public function Departments(){
        return $this->belongsToMany(Department::class);
    }
    public function Results(){
        return $this->hasMany(Result::class);
    }
}
