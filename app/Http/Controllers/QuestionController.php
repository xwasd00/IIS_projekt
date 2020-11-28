<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answers;
use App\Test;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function __construct(){}

    protected function create(Question $data)
    {
        $qst = Question::create([
            'test_id' => $data['test_id'],
            'name' => $data['name'],
            'task' => $data['task'],
            'scoreMax' => $data['scoreMax'],
        ]);

        return $qst;
    }

    public function delete($id)
    {
        $qst = Question::findOrFail($id);

        $test = Test::findOrFail($qst->test_id);
        Question::destroy($id);

        return view('profesor.show', ['test' => $test]);
    }

    public function add($id ,Request $request)
    {
           $qst = new Question;
           $qst->test_id = $id;
           $qst->name = $request->name;
           $qst->task = $request->task;
           $qst->scoreMax = $request->scoreMax;
           $this->create($qst);

           $test = Test::findOrFail($id);
           return view('profesor.show', ['test' => $test]);
    }
}
