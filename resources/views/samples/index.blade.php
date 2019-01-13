@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>サンプルリスト</h1>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="table-responsive">
                <table class="table table-hover table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>型番</th>
                            <th>Create</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($samples as $sample)
                            <tr>
                                <th>{!! $sample->id !!}</th>
                                <td>{!! $sample->kataban->kataban !!}</td>
                                <td>{!! $sample->created_at !!}</td>
                                <td>{!! $sample->updated_at !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection