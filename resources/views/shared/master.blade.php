<html>
<head>
    @include('shared.imports')
    <title>@yield('title')</title>
    @include('shared.header')
</head>

<body>

@yield('content')

</body>
<footer>
    @include('shared.footer')
</footer>
</html>