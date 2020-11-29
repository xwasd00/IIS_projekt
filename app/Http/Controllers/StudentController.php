<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\StudentAnswer;
use App\Test;
use App\TestInstance;
use DB;
use Illuminate\Http\Request;
use App\User;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $testinstances = auth()->user()->test_instances;
        return view('student.student', ['tests' => $testinstances]);
    }



    public function reg()
    {
        //nalezení dostupných testů
        $tests = Test::All()->where('start', ">", date("Y-m-d H:i:s"));
        $instances = auth()->user()->test_instances;

        // přidání atributu 'registered', v případě, že je student zaregistrován
        foreach ($tests as $test){
            $test->append('registred');
            if($instances->find($test->id)){
                $test->registred=true;
            }
            else{
                $test->registred=false;
            }
        }


        // $tests->sortBy('start');
        // $tests->sortBy('registered');

        return view('student.reg', ['tests' => $tests]);
    }

    public function register(Request $request)
    {

        // kontrola, zda metoda POST obsahuje potřebná data
        if ($request->has('test_id') && $request->input('test_id')){

            // kontrola správného id testu
            $testid = $request->input('test_id');
            Test::findOrFail($testid);

            // kontrola, zda je již zaregistrován
            $instance = auth()->user()->test_instances->contains('test_id', $testid);
            if($instance){
                return redirect('student/reg');
            }

            // registrace studenta
            DB::table('test_instances')->insert([
                'test_id' => $testid,
                'user_id' => auth()->user()->id,
            ]);
            return redirect('student/reg');
        }
        else{
            return redirect('student/reg');
        }
    }

    public function eval()
    {
        $testinstances = auth()->user()->test_instances;
        return view('student.eval', ['tests' => $testinstances]);
    }



    public function testshow($testid)
    {
        //kontrola správného testu
        $test = Test::findOrFail($testid);
        $hasinstance = auth()->user()->test_instances->contains('test_id', $testid);
        if( !$hasinstance ){// studentovi není přiřazen tento test
            return redirect('student');
        }


        /*
        // kontrola přístupnosti testu
        if($test->start > date("Y-m-d H:i:s") || $test->end < date("Y-m-d H:i:s")){
            return redirect('student');
        }*/

        $student_answers = auth()->user()->test_instances->where('test_id', '=', $testid)->first()->student_answers;
        $answers = null;
        foreach ($student_answers as $answer){
            $answers[$answer->question_id] = $answer->answer;
        }


        return view('student.testfill', ['test' => $test, 'questions' => $test->questions, 'answers' => $answers]);
    }



    public function testfill($testid, Request $request)
    {
        //kontrola správného testu
        $test = Test::findOrFail($testid);
        $hasinstance = auth()->user()->test_instances->contains('test_id', $testid);
        if( !$hasinstance ){// studentovi není přiřazen tento test
            return redirect('student');
        }
/*
        // kontrola přístupnosti testu
        if($test->start > date("Y-m-d H:i:s") || $test->end < date("Y-m-d H:i:s")){
            return redirect('student');
        }*/



        //získání otázek (a odpovědí k otázkám)
        $questions = ($request->input('questions'));
        if($questions === null){
            return redirect('student');
        }

        $testinstance = auth()->user()->test_instances->where('test_id', '=', $testid)->first();

        foreach ($questions as $question => $answer){
            Question::findOrFail($question);

            $student_answer = $testinstance->student_answers->where('question_id', '=', $question)->first();

            if($student_answer === null){
                if($answer === null){
                    $answer = "";
                }
                $student_answer = StudentAnswer::create([
                    'test_instance_id' => $testinstance->id,
                    'question_id' => $question,
                    'answer' => $answer,
                ]);
            }
            else {
                $student_answer->answer = $answer;
            }
            $student_answer->save();

        }

        return $this->testshow($testid);
    }




    public function profile()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('student.profile', ['user' => $user]);
    }
}
