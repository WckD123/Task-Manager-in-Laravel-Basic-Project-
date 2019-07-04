<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Project;
use App\Task;

use App\Http\Requests;

class AdminTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $result = array();

        for($i = 0; $i < count($projects); $i++){
            $result[] = $projects[$i]->name;
        }
        return view('admin.tasks.add', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        $result = array();

        for($i = 0; $i < count($projects); $i++){
            $result[] = $projects[$i]->name;
        }
        return view('admin.tasks.add', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
//        echo dd($input);
        if(is_numeric($input["project_id"])){
            $input["project_id"] = $input["project_id"] +1;
        }
        Task::create($input);
        $tasks = Task::get();
        return view('admin.tasks.index', compact('tasks'));
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
        $projects = Project::all();
        $result = array();

        for($i = 0; $i < count($projects); $i++){
            $result[] = $projects[$i]->name;
        }
        $task = Task::find($id);
        $projectId = $task["project_id"];
        $task["project_id"] = Project::find($projectId)->name;
        return view('admin.tasks.edit', compact('task', 'result'));
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
        $tasks = Task::get();
        return view('admin.tasks.index', compact('tasks'));
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



    public function delete($id){
        $task = Task::find($id);
        $task->delete();
        $tasks = Task::get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function complete($id){
        $task = Task::find($id)->update(['status' => 'Complete']);
        $tasks = Task::get();
        return view('admin.tasks.index', compact('tasks'));
    }
}
