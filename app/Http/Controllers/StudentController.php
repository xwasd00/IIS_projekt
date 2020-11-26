<?php

namespace App\Http\Controllers;

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
        return view('student.student');
    }


    public function reg()
    {
        return view('student.reg');
    }


    public function profile()
    {
       $users = User::where('name', 'student')->get();
       return view('student.profile', ['users' => $users]);
    }


}
