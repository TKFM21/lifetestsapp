@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Add Role</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::model($role, ['route' => 'roles.store']) !!}
                <div class="form-group">
                    {!! Form::label('role', 'Role') !!}
                    {!! Form::text('role', old('role'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('priority', 'Priority') !!}
                    {!! Form::text('priority', old('priority'), ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Store!', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection