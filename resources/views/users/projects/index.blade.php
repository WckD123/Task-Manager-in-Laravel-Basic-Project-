@extends('welcome')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>All Projects
                            <a href="{{ url('/userProject/addProject') }}">
                                <button class="btn btn-primary">Add Project</button>
                            </a>
                        </h3>

                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Project Name</td>
                                <td></td>
                                <td></td>
                            <tr>
                            </thead>
                            <tbody>
                            @if($projects)
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{$project->id}}</td>
                                        <td>{{$project->name}}</td>
                                        <td>
                                            <a href="{{ url('/userProject/' . $project->id) . '/edit'}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/userProject/' . $project->id) . '/delete'}}">
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