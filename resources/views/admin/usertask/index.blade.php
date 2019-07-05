@extends('admin.index')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Assign Task  to Users</h3></div>
                    <div class="panel-body">

                        {!! Form::open(array('action'=>['AdminUserTaskController@assignUsers',$task->id],'method'=>'post')) !!}
                        "{{$task->name}}"
                        <br><br>
                        @foreach($users as $id => $user)

                            <div class="form-group">
{{--                                {!! Form::checkbox('selectedUsers[]', $user ,false,['class'=>'form-control']) !!}--}}

                                <input type="checkbox" name="selectedUsers[]" value={{$id}}> {{$user}}<br>
                            </div>

                        @endforeach

                        <div class="form-group">
                            {!! Form::submit('Assign users', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection