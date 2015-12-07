@extends('layouts.plain')
@section('body')

	<style>
		body {
			background: url(/public/images/concrete_seamless.png);
		}
		.loginBox {
			border-radius: 25px;
			margin: 19% auto auto;
			padding: 20px;
			width: 500px;
		}

		.alpha60 {
			/* Fallback for web browsers that doesn't support RGBa */
			background: rgb(0, 0, 0);
			/* RGBa with 0.6 opacity */
			background: rgba(0, 0, 0, 0.6);
		}

	</style>

	<div class="loginBox alpha60">
		<div class="col-lg-4">
			<div >
					@yield('section')
			</div>			
		</div>
	</div>
@stop
@section('js')
@stop