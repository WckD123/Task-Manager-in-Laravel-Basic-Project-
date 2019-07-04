<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserTaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tasks = $user->tasks;
        return view('users.tasks.index', compact('tasks'));
    }

    public function create()
    {
        //
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
        $tasks = $user->tasks;
        return view('users.tasks.index', compact('tasks'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $projects = Project::all();
        $result = array();

        for($i = 0; $i < count($projects); $i++){
            $result[] = $projects[$i]->name;
        }
        $task = Task::find($id);
        $projectId = $task["project_id"];
        $task["project_id"] = Project::find($projectId)->name;
        $flag = false;
        $userList = $task->users;
        foreach($userList as $userInList){
            if($userInList->id == Auth::user()->id){
                $flag = true;
            }
        }
        if($flag){
            return view('users.tasks.edit', compact('task', 'result'));
        }
        else{
            $user = Auth::user();
            $tasks = $user->tasks;
            return view('users.tasks.index', compact('tasks'));
        }
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        unset($input['_token']);
        if(is_numeric($input["project_id"])){
            $input["project_id"] = $input["project_id"] +1;
        }
        else{
            unset($input['project_id']);
        }
        $task = Task::find($id);
        $task->update($input);
        $user = Auth::user();
        $tasks = $user->tasks;
        return view('users.tasks.index', compact('tasks'));
    }

    public function destroy($id)
    {
        //
    }

    public function addTask(){

        $projects = Project::all();
        $result = array();
        for($i = 0; $i < count($projects); $i++){
            $result[] = $projects[$i]->name;
        }
        return view('users.tasks.add', compact('result'));
    }

    public function delete($id){
        $task = Task::find($id);
        $flag = false;
        $userList = $task->users;
        foreach($userList as $userInList){
            if($userInList->id == Auth::user()->id){
                $flag = true;
            }
        }
        if($flag){
            $task->delete();
            $user = Auth::user();
            $id = $user->id;
            $task->users()->detach($id);
            $tasks = $user->tasks;
            return view('admin.tasks.index', compact('tasks'));
        }
        else{
            $user = Auth::user();
            $tasks = $user->tasks;
            return view('users.tasks.index', compact('tasks'));
        }

    }

    public function complete($id){
        $task = Task::find($id)->update(['status' => 'Complete']);
        $user = Auth::user();
        $tasks = $user->tasks;
        return view('users.tasks.index', compact('tasks'));
    }

    public function tasksForProject($id){
        $project = Project::find($id);
        $tasks = $project->tasks;
        return view('users.tasks.index', compact('tasks'));
    }


}
