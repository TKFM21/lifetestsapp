@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>{!! $kataban->kataban !!}(Sample ID:{!! $sample->id !!})</h1>
    </div>

    @foreach($kataban_kensa_items as $kataban_kensa_item)
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <h2>{!! $kataban_kensa_item->kensa_c1->kensa_c1 !!}：測定記録</h2>
                <div class="table-responsive">
                    <table class="table table-hover table-condensed table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>測定値</th>
                                <th>測定者</th>
                                <th>判定</th>
                                <th>測定日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($meas_records[$kataban_kensa_item->kensa_c1->kensa_c1] as $meas_record)
                                <tr>
                                    <th>{!! $meas_record->id !!}</th>
                                    <td>{!! $meas_record->meas_record !!}</td>
                                    <td>{!! $meas_record->user->name !!}</td>
                                    <td>{!! $meas_record->judge->judge !!}</td>
                                    <td>{!! $meas_record->created_at !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
    <br>
@endsection