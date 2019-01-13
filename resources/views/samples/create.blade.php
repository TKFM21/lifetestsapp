@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Add サンプル</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::model($sample, ['route' => 'samples.store']) !!}
                <div class="form-group">
                    {!! Form::label('kataban_id', '型番') !!}
                    {!! Form::select('kataban_id', $katabans, null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('Store!', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection