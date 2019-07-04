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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin', function(){
    return view('admin.index');
});


Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', function(){
        return view('admin.index');
    });

    
    Route::get('admin/tasks', 'AdminController@getAllTasks');
    Route::get('admin/tasks/user/{id}', 'AdminController@getAllTasksByUser');
    Route::get('admin/user/{userId}', 'AdminController@getUserInfo');
    Route::get('admin/allUsers', 'AdminController@allUsers');
//    Route::put('admin/user/{id}',['as' => 'admin.users.store' , 'uses' => 'AdminController@store']);
    Route::resource('/admin','AdminController');
    Route::resource('/adminTask','AdminTaskController');
    Route::resource('/user','UserController');
    // Route::resource('admin/media', 'AdminMediasController');
    // Route::resource('admin/comments', 'PostCommentsController');
    // Route::resource('admin/comment/replies', 'CommentRepliesController');
});