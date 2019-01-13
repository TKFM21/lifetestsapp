@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>試験槽リスト</h1>
        <h2>{!! link_to_route('test_eqs.create', 'Add 試験槽') !!}</h2>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="table-responsive">
                <table class="table table-hover table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>試験槽</th>
                            <th>Temp.</th>
                            <th>メーカー</th>
                            <th>Address</th>
                            <th>Create</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($test_eqs as $test_eq)
                            <tr>
                                <th>{!! $test_eq->id !!}</th>
                                <td>{!! $test_eq->test_eq !!}</td>
                                <td>{!! $test_eq->temp !!}</td>
                                <td>{!! $test_eq->maker !!}</td>
                                <td>{!! $test_eq->address !!}</td>
                                <td>{!! $test_eq->created_at !!}</td>
                                <td>{!! $test_eq->updated_at !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection