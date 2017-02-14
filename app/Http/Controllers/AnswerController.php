<?php
/**
 * Created by PhpStorm.
 * User: g
 * Date: 2/7/2017
 * Time: 12:20 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Answer;

use App\Http\Requests;

class AnswerController extends Controller
{
    /**
     * Admin landing page listing curated answers.
     * Options available on this page are:
     *   - edit an answer
     *   - delete an answer
     *   - create a new answer
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdminIndex()
    {
        $answers = Answer::orderBy('created_at', 'asc')->get();
        return view('admin.answers.index', ['answers' => $answers]);
    }

    /**
     * Create answer form with field to enter answer.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdminCreate()
    {
        return view('admin.answers.create');
    }

    /**
     * Creates the answer in the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function answerAdminCreate(Request $request)
    {
        $this->validate($request, [
            'answer' => 'required|min:5'
        ]);

        $answer = new Answer([
            'answer' =>  $request->input('answer')
        ]);
        $answer->save();

        return redirect()->route('admin.answers.index')->with('info', 'Answer created, Answer is:' . $request->input('answer'));
    }

    /**
     * Generates page for editing the answer matching the id param.
     * Options available on this page are:
     *   - edit the answer string
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdminEdit($id)
    {
        $answer = Answer::find($id);

        return view('admin.answers.edit', ['answer' => $answer, 'answerId' => $id]);
    }

    /**
     * Save the updated answer to the database and then redirects to the answer admin landing page.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function answerAdminUpdate(Request $request)
    {
        $this->validate($request, [
            'answer' => 'required|min:5'
        ]);

        $answer = Answer::find($request->input('id'));
        $answer->answer = $request->input('answer');

        $answer->save();

        return redirect()->route('admin.answers.index')->with('info', 'Answer updated, Answer is: ' . $request->input('answer'));
    }

    /**
     * Deletes the answer from the database.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function answerAdminDelete($id)
    {
        $answer = Answer::find($id);
        $answer->delete();

        return redirect()->route('admin.answers.index')->with('info', 'Answer deleted:');
    }
}