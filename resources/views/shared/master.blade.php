<html>
<head>

    @include('shared.imports')
    <title>@yield('title')</title>
    @include('shared.header')
</head>

<body style="margin-top: 8%;">
@yield('content')
@include('shared.footer')
</body>

</html>