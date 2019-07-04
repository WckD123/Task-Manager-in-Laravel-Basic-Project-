<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminProjectController extends Controller
{

    public function index()
    {
        return view('admin.projects.add');
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
        return view('admin.projects.index', compact('projects'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        unset($input['_token']);
        $project = Project::find($id);
        $project->update($input);
        $projects = Project::get();
        return view('admin.projects.index', compact('projects'));
    }

    public function destroy($id)
    {
        //
    }

    public function delete($id){
        $project = Project::find($id);
        $project->delete();
        $projects = Project::get();
        return view('admin.projects.index', compact('projects'));
    }
}
