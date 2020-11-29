<?php

namespace App\Http\Controllers;


use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_profesor');
    }

     protected function create(Test $data)
    {
        $test = Test::create([
            'name' => $data['name'],
            'configuration' => $data['configuration'],
            'start' => $data['start'],
            'end' => $data['end'],
        ]);

        return $test;
    }

    public function add(request $request)
    {
        $test = new Test;
        $test->name = $request->name;
        $test->configuration = $request->configuration;
        $test->start = $request->start;
        $test->end = $request->end;

        $this->create($test);

        $tests = Test::all();
        return view('profesor.profesor', ['tests' => $tests]);
    }

}
