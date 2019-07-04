@extends('admin.index')

@section('content')


<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>All Tasks
                            <a href="{{ url('/adminTask') }}">
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
                            <tr>
                            </thead>
                            <tbody>
                            @if($tasks)
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{$task->id}}</td>
                                        <td><a href="{{ url('/adminTask/' . $task->id) . '/edit'}}">{{$task->name}}</a></td>
                                        <td>{{$task->status}}</td>
                                        <td>{{$task->deadline}}</td>
                                        <td>{{$task->project->name}}</td>
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