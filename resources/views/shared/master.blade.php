<html>
<head>
    @include('shared.imports')
    <title>@yield('title')</title>
    @include('shared.header')
</head>

<body>
{{--@include('main.flash-message')--}}
@yield('content')

</body>
<footer>
    @include('shared.footer')
</footer>
</html>