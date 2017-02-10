<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer'];

    public function questions()
    {
        return $this->belongsToMany('App\Question', 'question_answer')->withTimestamps();
    }
}
