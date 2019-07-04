@extends('welcome')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Add Task</h3></div>
                    <div class="panel-body">

                        {!! Form::open(['method'=>'POST', 'action'=>'UserTaskController@store']) !!}

                        {{--                        <div class="form-group">--}}
                        {{--                            {!! Form::label('id', 'ID') !!}--}}
                        {{--                            {!! Form::text('id', null, ['class'=>'form-control']) !!}--}}
                        {{--                        </div>--}}
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('deadline', 'Deadline') !!}
                            {!! Form::date('deadline', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('project_id', 'Project') !!}
                            {!! Form::select('project_id',array(''=>'Choose Parent Project') + $result ,null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status',array(''=>'Status Of Task','Yet to start'=>'Yet to start', 'Ongoing'=>'Ongoing' ,'Completed'=>'Completed') ,null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Create Task', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection