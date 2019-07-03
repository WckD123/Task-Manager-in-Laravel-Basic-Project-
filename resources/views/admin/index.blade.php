@extends('welcome')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Task Manager</div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Task</td>
                                <td>Assigned To</td>
                                <td>Status</td>
                                <td>Created At</td>
                                <td>Deadline</td>
                            <tr>
                            </thead>
                            <tbody>
                                @yield('content')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

