@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">To do list</h1>
                    <div>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
</div>
@endsection
