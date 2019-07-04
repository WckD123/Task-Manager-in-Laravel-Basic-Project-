<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;
use App\Http\Requests;

class UserProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return view('users.projects.index', compact('projects'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        Project::create($input);
        $projects = Project::get();
        return view('users.projects.index', compact('projects'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('users.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        unset($input['_token']);
        $project = Project::find($id);
        $project->update($input);
        $projects = Project::get();
        return view('users.projects.index', compact('projects'));
    }

    public function destroy($id)
    {
        //
    }

    public function delete($id){
        $project = Project::find($id);
        $project->delete();
        $projects = Project::get();
        return view('users.projects.index', compact('projects'));
    }

    public function addProject(){
        return view('users.projects.add');
    }
}
