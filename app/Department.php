<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function Teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function Students(){
        return $this->belongsToMany(Student::class);
    }
    public function Results(){
        return $this->hasMany(Result::class);
    }
}
