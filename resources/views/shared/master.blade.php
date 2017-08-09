<html>
<head>

    @include('shared.imports')
    <title>@yield('title')</title>
</head>

<body>

@include('shared.header')

@yield('content')

{{--@include('shared.footer')--}}


</body>

</html>