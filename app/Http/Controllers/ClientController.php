<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::get()->all();
        return view('clients', [
            'clients' => $clients
        ]);
    }
}
