@extends('admin.index')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Edit Task</h3></div>
                    <div class="panel-body">

                        {!! Form::model($task,['method'=>'PUT', 'action'=>['AdminTaskController@update',$task->id]]) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('deadline', 'Deadline') !!}
                            {!! Form::date('deadline', new \DateTime(), ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('project_id', 'Project') !!}
                            {!! Form::select('project_id',$projects,null ,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status',array($task->status=>$task->status,'Yet to start'=>'Yet to start', 'Ongoing'=>'Ongoing' ,'Completed'=>'Completed') ,null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection