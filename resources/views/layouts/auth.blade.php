@extends('layouts.plain')
@section('body')
	<div class="login-page">
		<div class="row">
			<div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
	        	<img src="images/flat-avatar.png" class="user-avatar" />
				<h1>Ani Theme</h1>
					@yield('section')
			</div>			
		</div>
	</div>
@stop
@section('js')
@stop