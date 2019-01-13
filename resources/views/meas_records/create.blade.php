@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>{!! $sample->kataban->kataban !!}(ID:{!! $sample->id !!}): 測定値記録</h1>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            
            {!! Form::open(['route' => 'meas_records.store']) !!}
                <div class="form-group">
                    {!! Form::text('sample_id', $sample->id, ['class' => 'form-control hidden']) !!}
                </div>
                
                @foreach($kataban_kensa_items as $kataban_kensa_item)
                    <div class="form-group">
                        {!! Form::label('t'.$kataban_kensa_item->id, '測定値: '.$kataban_kensa_item->kensa_c1->kensa_c1) !!}
                        {!! Form::text('t'.$kataban_kensa_item->id, old('t'.$kataban_kensa_item->id), ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('judge_id'.$kataban_kensa_item->id, '判定') !!}
                        {!! Form::select('judge_id'.$kataban_kensa_item->id, $judges, null, ['class' => 'form-control']) !!}
                    </div>
                    <br>
                @endforeach
                
                {!! Form::submit('Store!', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection