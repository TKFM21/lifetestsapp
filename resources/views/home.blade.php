@extends('layouts.app')

@section('content')
    <div class="jumbotron">
    	<div class="container">
    		<h1>Life Test App</h1>
    		<p>{!! link_to_route('katabans.index', '型番リスト') !!}</p>
    		<p>{!! link_to_route('samples.index', 'サンプルリスト') !!}</p>
    		<p>{!! link_to_route('kataban_kensa_items.index', '測定項目リスト') !!}</p>
    		<p>{!! link_to_route('meas_records.index', '測定記録リスト') !!}</p>
    		<p>{!! link_to_route('users.index', 'ユーザーリスト') !!}</p>
    		<p>{!! link_to_route('departments.index', '部署リスト') !!}</p>
    		<p>{!! link_to_route('roles.index', '権限リスト') !!}</p>
    		<p>{!! link_to_route('test_eqs.index', '試験槽リスト') !!}</p>
    	</div>
    </div>
@endsection