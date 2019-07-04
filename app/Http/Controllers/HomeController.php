<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function search(){

        $inp = Input::get('search');

        $tasks = Task::whereRaw("MATCH(name,status) AGAINST(?)",array($inp))->get();
        if(count($tasks) > 0){
            return view('searchOutput',compact(['tasks','inp']));
        }
        else{
            return view('welcome');
        }

    }
}
