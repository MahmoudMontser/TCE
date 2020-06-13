<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function Items(){
        return $this->hasMany(QuestionItem::class);
    }
}
