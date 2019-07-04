<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;

class AdminController extends Controller
{
    public function getAllTasks(){
        $tasks = Task::get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function getAllProjects(){
        $projects = Project::get();
        return view('admin.projects.index', compact('projects'));
    }

    public function getAllTasksByUser($id){
        $user = User::find($id);
        $tasks = $user->tasks;
        return view('admin.tasks.index', compact('tasks'));
    }

    public function getUserInfo($userId){
        $roleNames = Role::lists('name','id')->all();
        $user = User::find($userId);
        return view('admin.user.edit', compact('user', 'roleNames'));
    }

    public function allUsers(){
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    public function index()
    {
        //
        $user = Auth::user();
        return view('admin.tasks.index', compact('user'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = User::find($id);
        unset($input['_token']);
        $user->update($input);
        $users = User::get();
//        return dd($input);
        return view('admin.user.index', compact('users'));
    }

    public function destroy($id)
    {
        //
    }
}
