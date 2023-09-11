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

    public function create(){
        return view('addclient');
    }

    public function store(Request $request){
        $request->validate([
            'company_name' => 'required',
            'company_address' => 'required'
        ]);
        Client::create([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address
        ]);
        return redirect('/clients');
    }

    public function edit(Client $client){
        return view('editclient',[
            'client' => $client
        ]);
    }

    public function update(Request $request, Client $client){
        $request->validate([
            'company_name' => 'required',
            'company_address' => 'required'
        ]);

        $client->update([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address
        ]);
        return redirect('/clients');
    }
}
