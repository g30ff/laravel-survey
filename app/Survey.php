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

    /**
     * Query database to retrieve the specific survey info with curated questions and answers.
     *
     * @param $id
     * @return mixed
     */
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

    /**
     * Get specific survey represented by id form database, prep it for use in blade template form.
     *
     * @param $id
     * @return mixed
     */
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

    /**
     * Get questions and answers of survey taken by user with user_id.  These results are then
     * used to display survey details.
     *
     * @param $id
     * @param $user_id
     * @return array
     */
    public function getResults($id, $user_id)
    {
        $survey_results = DB::select(
            "SELECT srd.question_id, srd.answer_id FROM surveys as s
             join survey_results as sr on s.id = sr.survey_id 
             join survey_results_detail as srd on sr.id = srd.survey_results_id 
             WHERE s.id = ?
             and s.user_id = ?", [$id, $user_id]);

        $results = [];

        foreach($survey_results as $result)
        {
            $results[] = get_object_vars($result);
        }

        return $results;
    }
}
