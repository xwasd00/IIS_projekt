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
            'creator_id' => $data['creator_id'],
            'configuration' => $data['configuration'],
            'start' => $data['start'],
            'end' => $data['end'],
        ]);

        return $test;
    }

    public function add(request $request)
    {
        $msg = [
            'required' => 'Toto pole musí být vyplněné!!',
            'after' => 'Test nemůže být v minulosti ani končit dříve než začal!!'
        ];

        $data = request()->validate([
            'name' => 'required',
            'configuration' => 'required',
            'start' => 'required|after:now',
            'end' => 'required|after:now|after:start'
        ], $msg);

        $test = new Test;
        $test->name = $request->name;
        $test->creator_id = auth()->user()->id;
        $test->configuration = $request->configuration;
        $test->start = $request->start;
        $test->end = $request->end;


        $this->create($test);

        $tests = Test::all();
        return view('profesor.profesor', ['tests' => $tests]);
    }

}
