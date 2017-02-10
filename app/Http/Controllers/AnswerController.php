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
    public function getAdminIndex()
    {
        $answers = Answer::orderBy('created_at', 'asc')->get();
        return view('admin.answers.index', ['answers' => $answers]);
    }

    public function getAdminCreate()
    {
        return view('admin.answers.create');
    }

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

    public function getAdminEdit($id)
    {
        $answer = Answer::find($id);

        return view('admin.answers.edit', ['answer' => $answer, 'answerId' => $id]);
    }

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

    public function answerAdminDelete($id)
    {
        $answer = Answer::find($id);
        $answer->delete();

        return redirect()->route('admin.answers.index')->with('info', 'Answer deleted:');
    }
}