@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ユーザーリスト</h1>
        <h2>{!! link_to_route('register', 'Add user') !!}</h2>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="table-responsive">
                <table class="table table-hover table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>C/N</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>E-mail</th>
                            <th>Dept.</th>
                            <th>Role</th>
                            <th>Last Login</th>
                            <th>Create</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th>{!! $user->id !!}</th>
                                <td>{!! $user->code !!}</td>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->gender->gender !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->department->department !!}</td>
                                <td>{!! $user->role->role !!}</td>
                                <td>{!! $user->last_login_at !!}</td>
                                <td>{!! $user->created_at !!}</td>
                                <td>{!! $user->updated_at !!}</td>
                                <td>{!! $user->deleted_at !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection