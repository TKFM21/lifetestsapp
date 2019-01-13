@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>{!! $kataban->kataban !!} : Add 測定項目</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::model($kataban_kensa_item, ['route' => 'kataban_kensa_items.store']) !!}
                <div class="form-group">
                    {!! Form::text('kataban_id', $kataban->id, ['class' => 'form-control hidden']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('kensa_c1_id', '測定項目') !!}
                    {!! Form::select('kensa_c1_id', $kensa_c1s, null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('nominal_value', '中心値') !!}
                    {!! Form::text('nominal_value', old('nominal_value'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('lower_value', '下限値') !!}
                    {!! Form::text('lower_value', old('lower_value'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('upper_value', '上限値') !!}
                    {!! Form::text('upper_value', old('upper_value'), ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('Store!', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection