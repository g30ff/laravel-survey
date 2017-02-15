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
    /**
     * Show a list of surveys that have been curated: ( questions have been selected with their associated answers).
     * Options available on this page are:
     *   - edit a survey to add or remove questions
     *   - delete a survey
     *   - create a new survey
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdminIndex()
    {
        $surveys = Survey::orderBy('survey', 'asc')->get();
        $questions = Question::orderBy('created_at', 'asc')->get();

        return view('admin.surveys.index', ['surveys' => $surveys, 'questions' => $questions]);
    }

    /**
     * Create survey form with field to name survey as well as ability to select curated questions that
     * will appear on the survey.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdminCreate()
    {
        $questions = Question::all();
        $user = Auth::user();
        return view('admin.surveys.create', ['questions' => $questions, 'userID' => $user->id]);
    }

    /**
     * Creates the survey in the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Generates page for editing the survey matching the id param.
     * Options available on this page are:
     *   - rename the survey
     *   - add or remove curated questions
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdminEdit($id)
    {
        $survey = Survey::find($id);
        $questions = Question::all();

        return view('admin.surveys.edit', ['survey' => $survey, 'surveyId' => $id, 'questions' => $questions]);
    }

    /**
     * Save the updated survey to the database and then redirects to the survey admin page.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Deletes the survey from the database, as well as it's associations to curated questions.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function surveyAdminDelete($id)
    {
        $survey = Survey::find($id);
        $survey->questions()->detach();
        $survey->delete();

        return redirect()->route('admin.surveys.index')->with('info', 'Survey deleted:');
    }

    /**
     * Landing page for logged in users to see and select survey to take.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $surveys = Survey::orderBy('survey', 'asc')->get();
        $questions = Question::orderBy('created_at', 'asc')->get();

        return view('survey.index', ['surveys' => $surveys, 'questions' => $questions]);
    }

    /**
     * Generates page rendering form containing survey matching id param.  Once survey is complete, user can submit
     * results.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function takeSurvey($id)
    {

        $user_id = Auth::user()->id;
        $survey = new Survey();
        $surveys[] = $survey->getSurvey($id);
        $survey_name = $surveys[0]["survey_name"];
        $survey_id = $surveys[0]["id"];

        return view('survey.take', ['surveys' => $surveys, 'survey_name' => $survey_name, 'survey_id' => $survey_id, 'userID' => $user_id]);
    }

    /**
     * Inserts result from survey taken into database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function surveyCreate(Request $request)
    {
        $user_id = $request->input('user_id');
        $survey_id = $request->input('survey_id');

        $this->validate($request, [
            'question' => 'required'
        ]);

        /* *
         * insert survey id and user id into surve_results table and
         * retrieve insert id for use to insert details into the
         * survey results detail page.
         */
        $last_insert_id = DB::table('survey_results')->insertGetId([
            'survey_id' =>  $survey_id,
            'user_id' => $user_id]
        );

        /**
         * retrieve the radio type questions from request object and prep info for
         * insertion into survey_results_detail table.
         */
        $questions = $request->input('question');
        foreach ($questions as $key => $value)
        {
            DB::insert('insert into survey_results_detail(survey_results_id, question_id,answer_id) values (?,?,?)', [$last_insert_id,$key, $value]);
        }

        return redirect()->route('survey.results',array($survey_id))->with('info', 'Survey taken, reusults shown below. Thank you:');
     }

    /**
     * After user takes survey, they are redirected to results page which shows the survey they just took with answers.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function surveyResults($id)
     {
         $user_id = Auth::user()->id;
         $survey = new Survey();
         $surveys[] = $survey->getSurvey($id);
         $survey_name = $surveys[0]["survey_name"];
         $survey_id = $surveys[0]["id"];
         $survey_results = $survey->getResults($id, $user_id);

         return view('survey.output', ['surveys' => $surveys, 'survey_name' => $survey_name, 'survey_results' => $survey_results, 'survey_id' => $survey_id, 'userID' => $user_id]);

     }

}