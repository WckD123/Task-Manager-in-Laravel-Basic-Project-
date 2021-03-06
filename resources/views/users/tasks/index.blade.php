@extends('welcome')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>All Tasks
                            <a href="{{ url('/userTask/addTask') }}">
                                <button class="btn btn-primary">Add Task</button>
                            </a>
                        </h3>

                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Task</td>
                                <td>Status</td>
                                <td>Deadline</td>
                                <td>Project</td>
                                <td></td>
                                <td></td>
                            <tr>
                            </thead>
                            <tbody>
                            @if($tasks)
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{$task->id}}</td>
                                        <td>{{$task->name}}</td>
                                        <td>{{$task->status}}</td>
                                        <td>{{$task->deadline}}</td>
                                        <td>{{$task->project->name}}</td>
                                        <td>
                                            <a href="{{ url('/userTask/' . $task->id) . '/edit'}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/userTask/' . $task->id) . '/complete'}}">
                                                <button class="btn btn-success">Completed</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/userTask/' . $task->id) . '/delete'}}">
                                                <button class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection