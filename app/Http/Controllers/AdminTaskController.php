<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Project;
use App\Task;
use Auth;

use App\Http\Requests;

class AdminTaskController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $result = array();

        for($i = 0; $i < count($projects); $i++){
            $result[] = $projects[$i]->name;
        }
        return view('admin.tasks.add', compact('result'));
    }

    public function create()
    {
        $projects = Project::all();
        $result = array();

        for($i = 0; $i < count($projects); $i++){
            $result[] = $projects[$i]->name;
        }
        return view('admin.tasks.add', compact('result'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        if(is_numeric($input["project_id"])){
            $input["project_id"] = $input["project_id"] +1;
        }
        $task = Task::create($input);
        $id = $task->id;
        $user = Auth::user();
        $user->tasks()->attach($id);
        $tasks = Task::get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $projects = Project::lists('name','id')->all();

        return view('admin.tasks.edit', compact(['task','projects']));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        unset($input['_token']);
        $task = Task::find($id);
        $task->update($input);
        $tasks = Task::get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function destroy($id)
    {
        //
    }

    public function delete($id){
        $task = Task::find($id);
        $task->delete();
        $user = Auth::user();
        $id = $user->id;
        $task->users()->detach($id);
        $tasks = Task::get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function complete($id){
        $task = Task::find($id)->update(['status' => 'Complete']);
        $tasks = Task::get();
        return view('admin.tasks.index', compact('tasks'));
    }
}
