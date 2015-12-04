<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CGPS | @yield('page_title')</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="{{ asset("css/vendor.css") }}" />		
		<link rel="stylesheet" href="{{ asset("css/app-".(\Session::has('theme') ? \Session::get('theme') : 'green').".css") }}" />
	</head>
	<body class="{{ \Session::get('rtl') == 'rtl' ? 'rtl' : '' }}">
		@yield('body')
			<script src="{{ asset("vendor/ckeditor/ckeditor.js") }}" type="text/javascript"></script>			
			<script src="{{ asset("js/vendor.js")}}"></script>
		@yield('js')
		@yield('css')
	</body>
</html>