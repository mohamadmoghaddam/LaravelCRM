<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::get()->all();
        return view('users', [
            'users' => $data
        ]);
    }

    public function create()
    {
        return view('adduser');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required|confirmed|min:8',
            'email' => 'required|email'
        ]);
        User::create([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'role' => 'subscriber'
        ]);
        return redirect('/users');
    }
}

