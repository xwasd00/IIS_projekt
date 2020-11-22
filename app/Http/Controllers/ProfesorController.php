<?php

namespace App\Http\Controllers;

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
        return view('profesor.profesor');
    }
}
