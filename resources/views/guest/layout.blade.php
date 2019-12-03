<!DOCTYPE html>
<html>
<!-- Created by ChocoChip -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" href="{{asset('resources/assets/image/logo-circle.png')}}">

    <title>@yield('title','Vking Authentic')</title>
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="@yield('title')">
    <meta itemprop="description" content="@yield('description')">
    <meta itemprop="image" content="@yield('image')">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="website">
    <meta name="twitter:title" content="@yield('title','Vking Authentic')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('image',asset('resources/assets/image/logo-circle.png'))">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{URL::current()}}"/>
    <meta property="og:title" content="@yield('title','Vking Authentic')"/>
    <meta property="og:image" content="@yield('image',asset('resources/assets/image/logo-circle.png'))"/>
    <meta property="og:description" content="@yield('description')"/>

    {{--<link rel="stylesheet" href="{{ asset('resources/assets/css/reset.css') }}">--}}
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"--}}
          {{--integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    {{--<link rel="stylesheet" href="{{ asset('resources/assets/css/base.css') }}">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=EB+Garamond:600" rel="stylesheet">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed:200,400,500,700" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="{{ asset('resources/assets/css/fonts/fonts.css') }}">--}}
    {{--<link rel="stylesheet" href="{{ asset('resources/assets/css/header.css') }}">--}}
    {{--<link rel="stylesheet" href="{{ asset('resources/assets/css/footer.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('resources/assets/css/app.css') }}">
    @yield('css')
</head>
<body>
<div id="wrapper">
    @include('guest.partials.header')

    <div id="main">
        @yield('main')
    </div>

    @include('guest.partials.footer')
</div>

{{--<script src="https://code.jquery.com/jquery-3.3.1.min.js"--}}
        {{--integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="--}}
        {{--crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"--}}
        {{--integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"--}}
        {{--crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"--}}
        {{--integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"--}}
        {{--crossorigin="anonymous"></script>--}}
<script src="{{ asset('resources/assets/js/app.js') }}"></script>
@yield('script')
<script>
    $(document).ready(function(){$('#header-nav ul li.brand').click(function(){if($('#header-bot .down .cate').css('display')=='none'){$('#header-bot .down .cate').hide();$('#header-bot .down .bran').show();$('#header-bot .down').slideToggle()}else{$('#header-bot .down').slideToggle(function(){$('#header-bot .down .cate').hide();$('#header-bot .down .bran').show();$('#header-bot .down').slideToggle()})}});$('#header-nav ul li.category').click(function(){if($('#header-bot .down .bran').css('display')=='none'){$('#header-bot .down .cate').show();$('#header-bot .down .bran').hide();$('#header-bot .down').slideToggle()}else{$('#header-bot .down').slideToggle(function(){$('#header-bot .down .bran').hide();$('#header-bot .down .cate').show();$('#header-bot .down').slideToggle()})}})})

    $(document).ready(function(){$('#to-top').click(function(){$('body,html').animate({scrollTop:0},600)})});
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129831736-1"></script>
<script>
    window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}
    gtag('js',new Date());gtag('config','UA-129831736-1')
</script>
</body>
</html>