<?php

namespace App\Http\Controllers;

use App\Project;
use Auth;
use App\User;
use App\Task;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUserTaskController extends Controller
{
    public function index()
    {

        // return view('admin.usertask.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {


    }

    public function assignUsers(Request $request, $id){
        $input = $request->all();
        $input = $input["selectedUsers"];
        $result = array();
//        echo dd($input);
        $task = Task::find($id);
        $allUsers = $task->users;
        for($i = 0; $i < count($input); $i++){
                try{
                    $task->users()->attach($input[$i]);
                }
                catch(Exception $e) {
//                    echo $e->getMessage();
                }
        }
        $tasks = Task::get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function show($id)
    {
        $users = User::lists('name','id')->all();
        $task = Task::find($id);
        return view('admin.usertask.index',compact(['users','task']));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
