@extends('admin.index')

@section('content')


<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Edit User Privileges</h3></div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Role</td>
                                <tr>
                                </thead>
                                <tbody>
                                @if($users)
                                    @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('admin/user/' . $user->id) }}">{{$user->name}}</a>
                                                </td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role->name}}</td>
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