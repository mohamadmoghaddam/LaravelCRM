<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['client','user'])->get();
        return view('projects.projects', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $clients = Client::all();

        return view('projects.addproject',[
            'users' => $users,
            'clients' => $clients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:clients,id',
            'status' => [
                'required',
                Rule::in(['open', 'delivered', 'canceled'])
            ]
        ]);
        Project::create($data);

        return redirect('/projects');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $users = User::all();
        $clients = Client::all();
        $project = Project::with(['client','user'])->find($project)->first();
        return view('projects.editproject',[
            'project' => $project,
            'users' => $users,
            'clients' => $clients
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:clients,id',
            'status' => [
                'required',
                Rule::in(['open', 'delivered', 'cancelled'])
            ]
        ]);
        $project->update($data);

        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}
