@extends('admin.index')

@section('content')


<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Edit User Privileges</h3></div>
                    <div class="panel-body">

                    <!-- {!! Form::open(['method'=>'POST', 'action'=>'AdminController@store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('description', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('position', 'Position') !!}
                            {!! Form::text('position', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('location', 'Location') !!}
                            {!! Form::text('location', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('salary', 'Salary in Rupees]') !!}
                            {!! Form::number('salary', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('posting_date', 'Expiry Date') !!}
                            {!! Form::date('posting_date', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Create Posting', ['class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!} -->


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection