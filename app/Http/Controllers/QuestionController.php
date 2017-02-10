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
    public function getAdminIndex()
    {
        $questions = Question::orderBy('question', 'asc')->get();
        $answers = Answer::orderBy('created_at', 'asc')->get();
        return view('admin.questions.index', ['questions' => $questions, 'answers' => $answers]);
    }

    public function getAdminCreate()
    {
        $answers = Answer::all();
        return view('admin.questions.create', ['answers' => $answers]);
    }

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

    public function getAdminEdit($id)
    {
        $question = Question::find($id);
        $answers = Answer::all();

        return view('admin.questions.edit', ['question' => $question, 'questionId' => $id, 'answers' => $answers]);
    }

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

    public function questionAdminDelete($id)
    {
        $question = Question::find($id);
        $question->answers()->detach();
        $question->delete();

        return redirect()->route('admin.questions.index')->with('info', 'Question deleted:');
    }
}