<?php

namespace App\Http\Controllers;

use App\Test;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_profesor');
    }

    public function index()
    {
        $tests = Test::all();
        return view('profesor.profesor', ['tests' => $tests]);
    }

    public function mytests()
    {
        $mytests = Test::all()->where('creator_id', auth()->user()->id);
        return view('profesor.mytests', ['tests' => $mytests]);
    }

    public function profile()
    {
        $user = auth()->user();
        return view('profesor.profile', ['user' => $user]);
    }

    public function showTest($testid)
    {
        $test = Test::findOrFail($testid);
        return view('profesor.show', ['test' => $test]);
    }

    public function addqst($testid)
    {
        $test = Test::findOrFail($testid);
        switch($test->configuration){
            case 1:
                $counter = 1;
                $validity = 0;
                break;
            case 2:
                $counter = 3;
                $validity = 0;
                break;
            case 3:
                $counter = 4;
                $validity = 1;
                break;
        }
        return view('profesor.addqst', ['test' => $test, 'counter' => $counter, 'validity' => $validity]);
    }

    public function modifyqst($qstid)
    {
        $qst = Question::findOrFail($qstid);
        return view('profesor.modifyqst', ['qst' => $qst]);
    }

    public function addans($qstid)
    {
        $qst = Question::findOrFail($qstid);
        return view('profesor.addans', [ 'qst' => $qst]);
    }

    public function createView()
    {
        return view('profesor.create');
    }

    public function addTest()
    {
        return view('profesor.addtest');
    }
}
