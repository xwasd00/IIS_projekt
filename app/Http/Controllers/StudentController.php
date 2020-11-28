<?php

namespace App\Http\Controllers;

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
        $tests = Test::All()->where('start', ">", date("Y-m-d H:i:s"));
        $instances = auth()->user()->test_instances;

        // přidání atributu 'registered', vpřípadě, že je student zaregistrován
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
            $instance = auth()->user()->test_instances->find($testid);
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

    public function profile()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('student.profile', ['user' => $user]);
    }
}
