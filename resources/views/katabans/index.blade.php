@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>型番リスト</h1>
        <h2>{!! link_to_route('katabans.create', 'Add 型番') !!}</h2>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="table-responsive">
                <table class="table table-hover table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>型番</th>
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
                        @foreach ($katabans as $kataban)
                            <tr>
                                <th>{!! $kataban->id !!}</th>
                                <td>{!! link_to_route('katabans.show', $kataban->kataban, ['id' => $kataban->id]) !!}</td>
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection