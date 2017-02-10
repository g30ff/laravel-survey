<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question'];

    public function surveys()
    {
        return $this->belongsToMany('App\Survey', 'survey_question')->withTimestamps();
    }

    public function answers()
    {
        return $this->belongsToMany('App\Answer', 'question_answer')->withTimestamps();
    }

}
