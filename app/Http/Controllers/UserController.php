<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
        $request->validate([
            'username' => 'required|unique:App\Models\User,username',
            'password' => 'required|confirmed|min:8',
            'email' => 'required|email|unique:App\Models\User,email'
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

    public function edit(User $user){
        return view('edituser',[
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user){
        $request->validate([
            'username' => [
                'required',
                Rule::unique('users')->ignore($user)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user)
            ]
        ]);

        $user->update([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email
        ]);
        return redirect('/users');

    }
}

