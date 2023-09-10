<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = User::get()->all();
        return view('users', [
            'users' => $data
        ]);
    }
    public function create(){
        return view('adduser');
    }
}
