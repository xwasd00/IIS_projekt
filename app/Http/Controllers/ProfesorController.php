<?php

namespace App\Http\Controllers;

use App\Test;
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

    public function createView()
    {
        return view('profesor.create');
    }
}
