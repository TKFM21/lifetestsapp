@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Add 型番</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::model($kataban, ['route' => 'katabans.store']) !!}
                <div class="form-group">
                    {!! Form::label('kataban', '型番') !!}
                    {!! Form::text('kataban', old('kataban'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('test_eq_id', '試験槽') !!}
                    {!! Form::select('test_eq_id', $test_eqs, null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('rated_voltage', '定格電圧') !!}
                    {!! Form::text('rated_voltage', old('rated_voltage'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('expect_life_time', '期待寿命') !!}
                    {!! Form::text('expect_life_time', old('expect_life_time'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('now_life_time', '経過時間') !!}
                    {!! Form::text('now_life_time', old('now_life_time'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('fan_kbn1_id', '機種') !!}
                    {!! Form::select('fan_kbn1_id', $fan_kbn1s, null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('status_id', 'ステータス') !!}
                    {!! Form::select('status_id', $statuses, null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('bb_id', 'BBタイプ') !!}
                    {!! Form::select('bb_id', $bbs, null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('cd_user_id', '設計担当者') !!}
                    {!! Form::select('cd_user_id', $users, null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Store!', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection