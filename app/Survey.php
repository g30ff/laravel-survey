<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Survey extends Model
{
    protected $fillable = ['user_id', 'survey'];

    public function questions()
    {
        return $this->belongsToMany('App\Question', 'survey_question')->withTimestamps();
    }

    public function answers()
    {
        return $this->hasManyThrough('App\Answer', 'App\Question');
    }

    protected function getSurveyFromDB($id)
    {
        $results = DB::select(
            "select s.id as survey_id, s.survey as survey_name, q.id as question_id, q.question, a.id as answer_id, a.answer 
             from surveys as s join survey_question as sq on s.id = sq.survey_id
             join questions as q on sq.question_id = q.id 
             join question_answer as qa on q.id = qa.question_id 
             join answers as a on qa.answer_id = a.id
             where s.id = ?", [$id]);

        return $results;

    }
    public function getSurvey($id)
    {
        $results = $this->getSurveyFromDB($id);

        foreach ($results as $result)
        {
            $survey["id"] = $result->survey_id;
            $survey["survey_name"] = $result->survey_name;
            $survey["questions"][$result->question_id] = $result->question;
            $survey["answers"][$result->question_id][$result->answer_id] = $result->answer;

        }

        return $survey;
    }
}
