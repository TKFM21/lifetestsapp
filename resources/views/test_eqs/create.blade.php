@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Add 試験槽</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::model($test_eq, ['route' => 'test_eqs.store']) !!}
                <div class="form-group">
                    {!! Form::label('test_eq', '試験槽') !!}
                    {!! Form::text('test_eq', old('test_eq'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('temp', 'Temp.') !!}
                    {!! Form::text('temp', old('temp'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('maker', 'メーカー') !!}
                    {!! Form::text('maker', old('maker'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('address', 'Address') !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Store!', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection