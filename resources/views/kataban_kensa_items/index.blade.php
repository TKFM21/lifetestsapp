@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>測定項目リスト</h1>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="table-responsive">
                <table class="table table-hover table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>型番</th>
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
                                <td>{!! $kataban_kensa_item->kataban->kataban !!}</td>
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