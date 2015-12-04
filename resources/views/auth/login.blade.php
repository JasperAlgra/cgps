@extends('layouts.auth')

@section('page_title')
	Login 2
@stop

@section('section')
	<div>
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>

	<form role="form" action="{{ url('/auth/login') }}">
		{!! csrf_field() !!}

		<div class="form-content" >
			<div class="form-group">
				<input type="text" class="form-control input-underline input-lg" id="" placeholder={{ Lang::get(\Session::get('lang').'.email') }}>
			</div>
			<div class="form-group">
				<input type="password" class="form-control input-underline input-lg" id="" placeholder={{ Lang::get(\Session::get('lang').'.password') }}>
			</div>
		</div>
		<input type="submit" class="btn btn-white btn-outline btn-lg btn-rounded progress-login" value="{{ Lang::get(\Session::get('lang').'.login') }}" />
		&nbsp;
		{{--<a href="/auth/register" class="btn btn-white btn-outline btn-lg btn-rounded">{{ Lang::get(\Session::get('lang').'.register') }}</a>--}}
{{--		<a href="{{ url('/password/email') }}" class="btn btn-white btn-outline btn-lg btn-rounded">Forgot Your Password?</a>--}}
	</form>
@stop