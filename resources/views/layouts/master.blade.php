<html>
<head>
    <title>App Name - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/general.css') }}">
</head>
<body>
<div id="sideBar">
    @section('sidebar')

        <ul>
            <li>Home</li>
            <li>Upload</li>
        </ul>
    @show

</div>

<div class="container">
    @yield('content')
</div>
</body>
</html>