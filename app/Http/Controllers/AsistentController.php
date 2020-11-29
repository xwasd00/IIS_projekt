<?php

namespace App\Http\Controllers;

use App\Test;
use App\TestInstance;
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
        $testinstances = TestInstance::All();
        $testinstances->sortBy('user_id');
        $testinstances->sortBy('test_id');
        return view('asistent.asistent', ['instances' => $testinstances]);
    }


    public function eval()
    {
        return view('asistent.eval');
    }
}
