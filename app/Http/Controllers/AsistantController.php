<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsistantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_asistant');
    }

    public function index()
    {
        return view('asistant.asistant');
    }
}
