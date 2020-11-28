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
        $user = User::findOrFail($id);

        // nelze odstranit administrátora
        if($user->admin){
            return redirect('admin');
        }

        User::destroy($id);
        return redirect('admin');
    }
}
