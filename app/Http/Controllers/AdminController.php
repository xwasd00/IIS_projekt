<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.admin',['users' => $users]);
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect('admin');
    }
}
