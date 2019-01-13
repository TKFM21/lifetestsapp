@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>部署リスト</h1>
        <h2>{!! link_to_route('departments.create', 'Add Department') !!}</h2>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="table-responsive">
                <table class="table table-hover table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Dept.</th>
                            <th>Create</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <th>{!! $department->id !!}</th>
                                <td>{!! $department->department !!}</td>
                                <td>{!! $department->created_at !!}</td>
                                <td>{!! $department->updated_at !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection