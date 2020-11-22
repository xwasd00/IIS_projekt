<?php

namespace App\Http\Controllers;

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
        return view('asistent.asistent');
    }

    public function profile()
    {
        return view('asistent.profile');
    }

    public function reg()
    {
        return view('asistent.register');
    }

    public function test()
    {
        return view('asistent.test');
    }
}
