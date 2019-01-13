@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>測定記録リスト</h1>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="table-responsive">
                <table class="table table-hover table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>型番</th>
                            <th>サンプルID</th>
                            <th>測定項目</th>
                            <th>測定記録</th>
                            <th>測定者</th>
                            <th>判定</th>
                            <th>Create</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meas_records as $meas_record)
                            <tr>
                                <th>{!! $meas_record->id !!}</th>
                                <td>{!! $meas_record->sample->kataban->kataban !!}</td>
                                <td>{!! $meas_record->sample->id !!}</td>
                                <td>{!! $meas_record->kataban_kensa_item->kensa_c1->kensa_c1 !!}</td>
                                <td>{!! $meas_record->meas_record !!}</td>
                                <td>{!! $meas_record->user->name !!}</td>
                                <td>{!! $meas_record->judge->judge !!}</td>
                                <td>{!! $meas_record->created_at !!}</td>
                                <td>{!! $meas_record->updated_at !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection