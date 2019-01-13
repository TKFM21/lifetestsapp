@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>{!! $kataban->kataban !!}</h1>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="table-responsive">
                <table class="table table-hover table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            
                            <th>試験槽</th>
                            <th>定格電圧</th>
                            <th>期待寿命</th>
                            <th>経過時間</th>
                            <th>機種</th>
                            <th>ステータス</th>
                            <th>BBタイプ</th>
                            <th>作業者</th>
                            <th>設計者</th>
                            <th>次回測定日</th>
                            <th>Create</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{!! $kataban->id !!}</th>
                            
                            <td>{!! $kataban->test_eq->test_eq !!}</td>
                            <td>{!! $kataban->rated_voltage !!}</td>
                            <td>{!! $kataban->expect_life_time !!}</td>
                            <td>{!! $kataban->now_life_time !!}</td>
                            <td>{!! $kataban->fan_kbn1->fan_kbn1 !!}</td>
                            <td>{!! $kataban->status->status !!}</td>
                            <td>{!! $kataban->bb->bb !!}</td>
                            <td>{!! $kataban->edit_user->name !!}</td>
                            <td>{!! $kataban->cd_user->name !!}</td>
                            <td>{!! $kataban->next_meas_at !!}</td>
                            <td>{!! $kataban->created_at !!}</td>
                            <td>{!! $kataban->updated_at !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="text-center">
        <h1>サンプルリスト</h1>
            {!! Form::open(['route' => 'samples.store']) !!}
                <div class="form-group">
                    {!! Form::text('kataban_id', $kataban->id, ['class' => 'form-control hidden']) !!}
                </div>
                    
                {!! Form::submit('サンプルを追加', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
    </div>
    
    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="table-responsive">
                <table class="table table-hover table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>サンプルID</th>
                            <th>Create</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($samples as $sample)
                            <tr>
                                <th>{!! $sample->id !!}：({!! link_to_route('meas_records.create', '測定を記録', ['id' => $sample->id]) !!})：({!! link_to_route('meas_records.show', '詳細データ表示', ['id' => $sample->id]) !!})</th>
                                <td>{!! $sample->created_at !!}</td>
                                <td>{!! $sample->updated_at !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="text-center">
        <h1>測定項目リスト</h1>
        <h2>{!! link_to_route('kataban_kensa_items.create', 'Add 測定項目', ['id' => $kataban->id]) !!}</h2>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="table-responsive">
                <table class="table table-hover table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>測定項目ID</th>
                            <th>測定項目</th>
                            <th>中心値</th>
                            <th>下限値</th>
                            <th>上限値</th>
                            <th>Create</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kataban_kensa_items as $kataban_kensa_item)
                            <tr>
                                <th>{!! $kataban_kensa_item->id !!}</th>
                                <td>{!! $kataban_kensa_item->kensa_c1->kensa_c1 !!}</td>
                                <td>{!! $kataban_kensa_item->nominal_value !!}</td>
                                <td>{!! $kataban_kensa_item->lower_value !!}</td>
                                <td>{!! $kataban_kensa_item->upper_value !!}</td>
                                <td>{!! $kataban_kensa_item->created_at !!}</td>
                                <td>{!! $kataban_kensa_item->updated_at !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection