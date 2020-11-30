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
        $tests = Test::All()->where('end', ">", date("Y-m-d H:i:s", time()));
        $instances = auth()->user()->test_instances;

        // přidání atributu 'registered', v případě, že je student zaregistrován
        foreach ($tests as $test){
            $test->append('registred');
            if($instances->contains('test_id', $test->id)){
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
            $test = Test::findOrFail($testid);

            // kontrola, zda je již zaregistrován
            $instance = auth()->user()->test_instances->contains('test_id', $testid);
            if($instance){
                return redirect('student/reg');
            }

            // registrace studenta
            $testinstance = TestInstance::create([
                'test_id' => $testid,
                'user_id' => auth()->user()->id,
            ]);
            $testinstance->save();

            foreach ($test->questions as $question){
                $student_answer = StudentAnswer::create([
                    'test_instance_id' => $testinstance->id,
                    'question_id' => $question->id,
                    'answer' => "",
                ]);
                $student_answer->save();
            }


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

    public function showresult($instanceid)
    {
        $testinstance = auth()->user()->test_instances->where('id', '=', $instanceid)->first();
        if($testinstance === null){
            return redirect('student/eval');
        }

        // kontrola přístupnosti testu
        if($testinstance->test->end > date("Y-m-d H:i:s", time())){
            return redirect('student/eval');
        }


        if(!$testinstance->approved){
            return redirect('student/eval');
        }

        $student_answers = $testinstance->student_answers;
        $answers = null;
        $scores = null;
        $templates = null;
        foreach ($student_answers as $answer){
            $answers[$answer->question_id] = $answer->answer;
            $scores[$answer->question_id] = $answer->score;
            if($testinstance->test->configuration != 3) {
                $templates[$answer->question_id] = Answer::All()->where('question_id', '=', $answer->question_id)->where('true', '=', true)->first();
            }
            else{
                $templates[$answer->question_id] = Answer::All()->where('question_id', '=', $answer->question_id)->where('true', '=', true);
            }
            if($templates[$answer->question_id] === null){
                $templates[$answer->question_id] = '';
            }
        }


        return view('student.showresult', ['instance' => $testinstance, 'questions' => $testinstance->test->questions, 'answers' => $answers, 'scores' => $scores, 'templates'=>$templates]);
    }



    public function testshow($testid)
    {
        //kontrola správného testu
        $test = Test::findOrFail($testid);

        $hasinstance = auth()->user()->test_instances->contains('test_id', $testid);
        if( !$hasinstance ) {// studentovi není přiřazen tento test
            return redirect('student');
        }

        // kontrola přístupnosti testu
        if($test->start > date("Y-m-d H:i:s", time())){
            return redirect('student');
        }
        if($test->end < date("Y-m-d H:i:s", time())){
            return redirect('student');
        }

        //kontrola instance
        $testinstance = auth()->user()->test_instances->where('test_id', '=', $testid)->first();
        if(!$testinstance->approved){
            return redirect('student');
        }
        if($testinstance->finished){
            return redirect('student');
        }



        $student_answers = $testinstance->student_answers;
        $questions = $test->questions;
        $answers = null;
        foreach ($questions as $question){
            $answers[$question->id] = $student_answers->where('question_id', '=', $question->id)->first();
            if($answers[$question->id] === null){
                $answers[$question->id] = "";
            }
            else{
                $answers[$question->id] = $answers[$question->id]->answer;
            }
        }


        return view('student.testfill', ['test' => $test, 'questions' => $questions, 'answers' => $answers]);
    }



    public function testfill($testid, Request $request)
    {
        //kontrola správného testu
        $test = Test::findOrFail($testid);
        $hasinstance = auth()->user()->test_instances->contains('test_id', $testid);
        if( !$hasinstance ){// studentovi není přiřazen tento test
            return redirect('student');
        }

        // kontrola přístupnosti testu
        if($test->start > date("Y-m-d H:i:s", time())){
            return redirect('student');
        }
        if($test->end < date("Y-m-d H:i:s", time())){
            return redirect('student');
        }

        //kontrola instance
        $testinstance = auth()->user()->test_instances->where('test_id', '=', $testid)->first();
        if(!$testinstance->approved){
            return redirect('student');
        }
        if($testinstance->finished){
            return redirect('student');
        }

        //získání otázek (a odpovědí k otázkám)
        $questions = ($request->input('questions'));
        if($questions === null){
            return redirect('student');
        }

        foreach ($questions as $question => $answer){

            $student_answer = $testinstance->student_answers->where('question_id', '=', $question)->first();

            if($student_answer === null){
                return $this->testshow($testid);
            }
            else {
                //kontrola konfigurace
                if($test->configuration == 1) {
                    $student_answer->answer = $answer;
                }
                elseif ($test->configuration == 2){
                    $student_answer->answer = $answer;
                }
                else{
                    $student_answer->answer = implode(' ', $answer);
                }
            }
            $student_answer->save();

        }

        $saveorexit = ($request->input('save'));
        if($saveorexit === null){
            return redirect('student');
        }
        if($saveorexit == 'exit'){
            $testinstance->finished = true;
            $testinstance->save();
            return redirect('student');
        }

        return $this->testshow($testid);
    }


    public function profile()
    {
        return view('student.profile', ['user' => auth()->user(), 'edit' => false]);
    }

    public function profileedit()
    {
        return view('student.profile', ['user' => auth()->user(), 'edit' => true]);
    }

    public function profilesave(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|max:255',
        ]);

        auth()->user()->name = $data['name'];
        auth()->user()->save();
        return view('student.profile', ['user' => auth()->user(), 'edit' => false]);
    }
}
