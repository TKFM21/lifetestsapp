@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Add Department</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::model($department, ['route' => 'departments.store']) !!}
                <div class="form-group">
                    {!! Form::label('department', 'Dept.') !!}
                    {!! Form::text('department', old('department'), ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Store!', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection