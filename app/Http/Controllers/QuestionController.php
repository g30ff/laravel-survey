<?php
/**
 * Created by PhpStorm.
 * User: g
 * Date: 2/7/2017
 * Time: 11:58 AM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;
use App\Answer;

class QuestionController extends Controller
{
    /**
     * Admin landing page listing curated questions with assocaited answers.
     * Options available on this page are:
     *   - edit a question and associated answers
     *   - delete a question
     *   - create a new question
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdminIndex()
    {
        $questions = Question::orderBy('question', 'asc')->get();
        $answers = Answer::orderBy('created_at', 'asc')->get();
        return view('admin.questions.index', ['questions' => $questions, 'answers' => $answers]);
    }

    /**
     * Create question form with field to name question as well as ability to select answers that
     * will be associated with the question.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdminCreate()
    {
        $answers = Answer::all();
        return view('admin.questions.create', ['answers' => $answers]);
    }

    /**
     * Creates the question in the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function questionAdminCreate(Request $request)
    {
        $this->validate($request, [
            'question' => 'required|min:5'
        ]);

        $question = new Question([
            'question' =>  $request->input('question')
        ]);
        $question->save();
        $question->answers()->attach($request->input('answers') === null ? [] : $request->input('answers'));

        return redirect()->route('admin.questions.index')->with('info', 'Question created, Title is:' . $request->input('question'));
    }

    /**
     * Generates page for editing the question matching the id param.
     * Options available on this page are:
     *   - edit the question string
     *   - add or remove curated answers associated with the question
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdminEdit($id)
    {
        $question = Question::find($id);
        $answers = Answer::all();

        return view('admin.questions.edit', ['question' => $question, 'questionId' => $id, 'answers' => $answers]);
    }

    /**
     * Save the updated question to the database and then redirects to the question admin landing page.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function questionAdminUpdate(Request $request)
    {
        $this->validate($request, [
            'question' => 'required|min:5'
        ]);

        $question = Question::find($request->input('id'));
        $question->question = $request->input('question');

        $question->save();
        $question->answers()->sync($request->input('answers') === null ? [] : $request->input('answers'));

        return redirect()->route('admin.questions.index')->with('info', 'Question updated, Question is: ' . $request->input('question'));
    }

    /**
     * Deletes the question from the database, as well as it's associations to curated answers.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function questionAdminDelete($id)
    {
        $question = Question::find($id);
        $question->answers()->detach();
        $question->delete();

        return redirect()->route('admin.questions.index')->with('info', 'Question deleted:');
    }
}