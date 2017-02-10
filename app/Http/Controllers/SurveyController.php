<?php
/**
 * Created by PhpStorm.
 * User: g
 * Date: 2/8/2017
 * Time: 5:24 AM
 */

namespace App\Http\Controllers;
use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Survey;
use App\Question;






class SurveyController extends Controller
{
    public function getAdminIndex()
    {
        $surveys = Survey::orderBy('survey', 'asc')->get();
        $questions = Question::orderBy('created_at', 'asc')->get();

        return view('admin.surveys.index', ['surveys' => $surveys, 'questions' => $questions]);
    }

    public function getAdminCreate()
    {
        $questions = Question::all();
        $user = Auth::user();
        return view('admin.surveys.create', ['questions' => $questions, 'userID' => $user->id]);
    }

    public function surveyAdminCreate(Request $request)
    {
        $this->validate($request, [
            'survey' => 'required|min:5'
        ]);

        $survey = new Survey([
            'survey' =>  $request->input('survey'),
            'user_id' => $request->input('user_id')
        ]);
        $survey->save();
        $survey->questions()->attach($request->input('questions') === null ? [] : $request->input('questions'));

        return redirect()->route('admin.surveys.index')->with('info', 'Survey created, Title is:' . $request->input('survey'));
    }

    public function getAdminEdit($id)
    {
        $survey = Survey::find($id);
        $questions = Question::all();

        return view('admin.surveys.edit', ['survey' => $survey, 'surveyId' => $id, 'questions' => $questions]);
    }

    public function surveyAdminUpdate(Request $request)
    {
        $this->validate($request, [
            'survey' => 'required|min:5'
        ]);

        $survey = Survey::find($request->input('id'));
        $survey->survey = $request->input('survey');

        $survey->save();

        $survey->questions()->sync($request->input('questions') === null ? [] : $request->input('questions'));
        return redirect()->route('admin.surveys.index')->with('info', 'Survey updated, Survey is: ' . $request->input('survey'));
    }

    public function surveyAdminDelete($id)
    {
        $survey = Survey::find($id);
        $survey->questions()->detach();
        $survey->delete();

        return redirect()->route('admin.surveys.index')->with('info', 'Survey deleted:');
    }

    public function getIndex()
    {
        $surveys = Survey::orderBy('survey', 'asc')->get();
        $questions = Question::orderBy('created_at', 'asc')->get();

        return view('survey.index', ['surveys' => $surveys, 'questions' => $questions]);


    }

    public function takeSurvey($id)
    {

        $user_id = Auth::user()->id;
        $survey = new Survey();
        $surveys[] = $survey->getSurvey($id);
        $survey_name = $surveys[0]["survey_name"];
        $survey_id = $surveys[0]["id"];

        return view('survey.take', ['surveys' => $surveys, 'survey_name' => $survey_name, 'survey_id' => $survey_id, 'userID' => $user_id]);
    }

    public function surveyCreate(Request $request)
    {
        $user_id = $request->input('user_id');
        $survey_id = $request->input('survey_id');

        $last_insert_id = DB::table('survey_results')->insertGetId([
            'survey_id' =>  $survey_id,
            'user_id' => $user_id]
        );

        $questions = $request->input('question');
        foreach ($questions as $key => $value)
        {
            DB::insert('insert into survey_results_detail(survey_results_id, question_id,answer_id) values (?,?,?)', [$last_insert_id,$key, $value]);
        }



        return redirect()->route('survey.index')->with('info', 'Survey taken, Thank you:');

     }

     public function surveyResults()
     {
         echo "here";
     }

}