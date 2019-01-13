@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>権限リスト</h1>
        <h2>{!! link_to_route('roles.create', 'Add Role') !!}</h2>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="table-responsive">
                <table class="table table-hover table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role</th>
                            <th>Priority</th>
                            <th>Create</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <th>{!! $role->id !!}</th>
                                <td>{!! $role->role !!}</td>
                                <td>{!! $role->priority !!}</td>
                                <td>{!! $role->created_at !!}</td>
                                <td>{!! $role->updated_at !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection