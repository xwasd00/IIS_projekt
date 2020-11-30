<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use App\Test;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('is_profesor');

    }

    protected function createQ(Question $data)
    {
        $qst = Question::create([
            'test_id' => $data['test_id'],
            'name' => $data['name'],
            'task' => $data['task'],
            'scoreMax' => $data['scoreMax'],
        ]);

        return $qst;
    }

    protected function createA(Answer $data)
    {
        $ans = Answer::create([
            'question_id' => $data['question_id'],
            'answer' => $data['answer'],
        ]);

        return $ans;
    }

    public function deleteQ($id)
    {
        $qst = Question::findOrFail($id);

        $test = Test::findOrFail($qst->test_id);
        Question::destroy($id);

        return view('profesor.show', ['test' => $test]);
    }

    public function deleteA($id)
    {
        $ans = Answer::findOrFail($id);
        $qst = Question::findOrFail($ans->question_id);
        Answer::destroy($id);

        return view('profesor.modifyqst', ['qst' => $qst]);
    }

    public function modify($id, Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'task' => 'required',
            'scoreMax' => 'required'
        ]);

        $qst = Question::where('id', $id)->update([
            'name' => $request->name,
            'task' => $request->task,
            'scoreMax' => $request->scoreMax
        ]);

        $qst = Question::findOrFail($id);

        return view('profesor.modifyqst', ['qst'=>$qst]);
    }

    public function add($id ,Request $request)
    {
           $data = request()->validate([
                'name' => 'required',
                'task' => 'required',
                'scoreMax' => 'required',
                'answer' => 'required'
           ]);

           $qst = new Question;
           $qst->test_id = $id;
           $qst->name = $request->name;
           $qst->task = $request->task;
           $qst->scoreMax = $request->scoreMax;
           $testtmp = $this->createQ($qst);

           $test = Test::findOrFail($id);

           $ans = new Answer;
           $ans->question_id = $testtmp->id;
           $ans->answer = $request->answer;
           $this->createA($ans);

           return view('profesor.show', ['test' => $test]);
    }
}
