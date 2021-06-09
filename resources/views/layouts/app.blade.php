<!-- resources/views/layouts/app.blade.php -->

<html>

<head>
    <title>@yield('title')</title>
</head>

<body>
    @section('sidebar')
        This is the master sidebar.
    @show

    <div class="container">
        <b>Pagina Principal</b>
        @yield('content')
    </div>
</body>

</html>
