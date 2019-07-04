<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



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
        $user = User::find($userId);
        return view('admin.user.edit', compact('user'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect('admin/allUsers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
