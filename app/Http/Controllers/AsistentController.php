<?php

namespace App\Http\Controllers;

use App\Question;
use App\StudentAnswer;
use App\Test;
use App\TestInstance;
use Illuminate\Http\Request;

class AsistentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_asistent');
    }

    public function index()
    {
        $testinstances = TestInstance::All();
        $testinstances->sortBy('user_id');
        $testinstances->sortBy('test_id');
        return view('asistent.asistent', ['instances' => $testinstances]);
    }

    public function reg(Request $request)
    {
        // kontrola, zda metoda POST obsahuje potřebná data
        if ($request->has('test_id') && $request->input('test_id')) {

            // kontrola správného id testu
            $testid = $request->input('test_id');
            $testinstance = TestInstance::findOrFail($testid);
            $testinstance->approved = true;
            $testinstance->save();
            return redirect('asistent');
        }
        else{
            return redirect('asistent');
        }
    }

    public function eval()
    {
        $testinstances = TestInstance::All();
        $testinstances->sortBy('user_id');
        $testinstances->sortBy('test_id');
        $testinstances->sortBy('evaluated');
        return view('asistent.eval', ['instances' => $testinstances]);
    }

    public function evaluate($instanceid)
    {
        //kontrola správné instance
        $instance = TestInstance::findOrFail($instanceid);



        // kontrola přístupnosti testu
        if($instance->test->end > date("Y-m-d H:i:s")){
            return redirect('asistent/eval');
        }


        if(!$instance->approved){
            return redirect('asistent/eval');
        }

        $student_answers = $instance->student_answers;
        $answers = null;
        foreach ($student_answers as $answer){
            $answers[$answer->question_id] = $answer->answer;
            $scores[$answer->question_id] = $answer->score;
        }



        return view('asistent.evaluate', ['instance' => $instance, 'questions' => $instance->test->questions, 'answers' => $answers, 'scores' => $scores]);
    }

    public function evaluatesave($instanceid, Request $request)
    {
        //kontrola správné instance
        $instance = TestInstance::findOrFail($instanceid)->first();



        // kontrola přístupnosti testu
        if($instance->test->end > date("Y-m-d H:i:s")){
            return redirect('asistent/eval');
        }

        if(!$instance->approved){
            return redirect('asistent/eval');
        }

        $total = 0;
        $scores = $request->input('scores');
        foreach ($scores as $question_id => $score){
            $answer = StudentAnswer::All()->where('question_id', '=', $question_id)->first();
            if($answer === null){
                return redirect('asistent/eval');
            }
            $answer->score = $score;
            $answer->save();
            $total += $score;
        }

        $instance->score = $total;
        $instance->evaluated = true;
        $instance->save();

        return redirect('asistent/eval');
    }
}
