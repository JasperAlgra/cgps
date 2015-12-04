@extends('layouts.auth')

@section('page_title')
	Register
@stop

@section('section')
	<form role="form" action="home">
		<div class="form-content">
			<div class="form-group">
				<input type="text" class="form-control input-underline input-lg" id="" placeholder={{ Lang::get(\Session::get('lang').'.fullname') }}>
			</div>

			<div class="form-group">
				<input type="text" class="form-control input-underline input-lg" id="" placeholder={{ Lang::get(\Session::get('lang').'.email') }}>
			</div>

			<div class="form-group">
				<input type="password" class="form-control input-underline input-lg" id="" placeholder={{ Lang::get(\Session::get('lang').'.password') }}>
			</div>
			<div class="form-group">
				<input type="password" class="form-control input-underline input-lg" id="" placeholder={{ Lang::get(\Session::get('lang').'.repeatpass') }}>
			</div>
		</div>
		<input type="submit" class="btn btn-white btn-outline btn-lg btn-rounded progress-login" value="{{ Lang::get(\Session::get('lang').'.registerhere') }}"/>
		<a href="/login" class="btn btn-white btn-outline btn-lg btn-rounded">{{ Lang::get(\Session::get('lang').'.loginpage') }}</a>
	</form>
@stop

@section('js')

@stop