<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //
    public function __construct(){}

    protected function create(Answer $data)
    {
        $ans = Answer::create([
            'question_id' => $data['question_id'],
            'answer' => $data['answer'],
        ]);

        return $ans;
    }

    public function add($qst_id, Request $request)
    {
        $data = request()->validate([
            'answer' => 'required'
        ]);

        $ans = new Answer;
        $ans->question_id = $qst_id;
        $ans->answer = $request->answer;

        $this->create($ans);

        $qst = Question::findOrFail($qst_id);
        return view('profesor.modifyqst', ['qst'=>$qst ]);
    }
}
