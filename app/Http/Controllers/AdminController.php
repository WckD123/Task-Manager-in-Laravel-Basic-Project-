<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Task;
use App\User;
use Auth;
class AdminController extends Controller {
    public function __construct() {

    }
    public function index() {
        $user = Auth::user();
        return view('admin.tasks.index', compact('user'));
    }
    public function create() {

    }
    public function store(Request $request) {
        
    }

    public function getAllTasks(){
        $tasks = Task::get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function getAllTasksByUser($id){
        $user = User::find($id);
        $tasks = $user->tasks;
        return view('admin.tasks.index', compact('tasks'));
    }

    public function getUserInfo($id){
        $user = User::find($id);
        return view('admin.user.index', compact('user'));
    }

}