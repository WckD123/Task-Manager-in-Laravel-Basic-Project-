<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Input;
use App\Task;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin', function(){
    return view('admin.index');
});

// Routes for User's Tasks & Projects

Route::get('/userProject/addProject', 'UserProjectController@addProject');
Route::get('/userTask/addTask', 'UserTaskController@addTask');
Route::get('/userTask/{id}/delete','UserTaskController@delete');
Route::get('/userProject/{id}/delete','UserProjectController@delete');
Route::get('/userTask/{id}/complete','UserTaskController@complete');
Route::get('/userTask/{id}/tasksForProject', 'UserTaskController@tasksForProject');

// Route for Search

Route::get('/search', 'HomeController@search');

// PHP artisan resource routes

Route::resource('/user','UserController');
Route::resource('/userTask','UserTaskController');
Route::resource('/userProject','UserProjectController');

// ADMIN Middleware

Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', function(){
        return view('admin.index');
    });

    // Admin's Task and Project routes

    Route::get('admin/tasks', 'AdminController@getAllTasks');
    Route::get('admin/projects', 'AdminController@getAllProjects');
    Route::get('admin/tasks/user/{id}', 'AdminController@getAllTasksByUser');
    Route::get('admin/user/{userId}', 'AdminController@getUserInfo');
    Route::get('admin/allUsers', 'AdminController@allUsers');

    // Admin's PHP artisan resource routes

    Route::resource('/admin','AdminController');
    Route::resource('/adminUserTask','AdminUserTaskController');
    Route::resource('/adminTask','AdminTaskController');
    Route::resource('/adminProject','AdminProjectController');

    // Custom routes for custom operations

    Route::get('/adminTask/{id}/delete','AdminTaskController@delete');
    Route::get('/adminTask/{id}/complete','AdminTaskController@complete');
    Route::get('/adminProject/{id}/delete','AdminProjectController@delete');
    Route::post('adminUserTask/assignUsers/{id}', 'AdminUserTaskController@assignUsers');
});


