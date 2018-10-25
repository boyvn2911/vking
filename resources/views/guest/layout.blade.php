<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>VKing Authentic | Dashboard</title>

    @yield('css')
</head>
<body>
<div id="wrapper">
    @include('guest.partials.header')

    @yield('main')

    @include('guest.partials.footer')
</div>

@yield('script')
</body>
</html>