<?php

namespace App\Http\Controllers;

use App\Test;
use App\Question;
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

    public function showTest($testid)
    {
        $test = Test::findOrFail($testid);
        return view('profesor.show', ['test' => $test]);
    }

    public function addqst($testid)
    {
        $test = Test::findOrFail($testid);
        return view('profesor.addqst', ['test' => $test]);
    }

    public function modifyqst($qstid)
    {
        $qst = Question::findOrFail($qstid);
        return view('profesor.modifyqst', ['qst' => $qst]);
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
