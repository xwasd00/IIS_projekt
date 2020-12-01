<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        if(auth()->check()){
            if(auth()->user()->admin){
                return redirect('admin');
            }
            else if(auth()->user()->profesor){
                return redirect('profesor');
            }
            else if(auth()->user()->asistent){
                return redirect('asistent');
            }
            return redirect('student');
        }

        return view('index');
    }
}
