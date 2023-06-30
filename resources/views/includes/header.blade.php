<head>
    {{--  Verification Meta  --}}
{{--    <meta name="yandex-verification" content="0739034565863f7e"/>--}}
{{--    <meta name="google-site-verification" content="OMu321XJrAKR_FNmG1iKHGM3eVNxOwrTsCtwNxUepjE"/>--}}
    {{--    <meta name='wmail-verification' content='6751aa78527b39e08b4c8c28d670fc76'/>--}}
    {{--  Verification Meta  --}}

    {{-- Devices Meta --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#ffffff">
    <meta name="robots" content="all"/>
    <meta name="robots" content="index,follow">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="Металлолом-24"/>
    {{-- Devices Meta --}}

    {{--Favicon--}}
    <link rel="apple-touch-icon" href="{{asset('assets/images/meta/apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('favicon-32x32.png')}}" type="image/png">
    <link rel="icon" href="{{asset('maskable_icon_x128.png')}}" type="image/png">
    {{--Favicon--}}

    {{-- Description Meta --}}
    @if(!empty($meta))
        <meta name="title" content="{{$meta->title}}">
        <meta name="keywords" content="{{$meta->keywords}}">
        @if(!empty($meta->description))
            <meta name="description" content="{{$meta->description}}">
        @else
            <meta name="description" content="{{$meta->h1}} и бесплатный вывоз металлолома в Москве и МО.">
        @endif

        {{-- Description Meta --}}

        {{--Open Graph Meta--}}
        <meta property="og:title" content="{{$meta->title}}"/>
        <meta property="og:locale" content="ru_RU">
        <meta property="og:type" content="website">
        @if(!empty($meta->description))
            <meta name="og:description" content="{{$meta->description}}">
        @else
            <meta property="og:description"
                  content="{{$meta->h1}} и бесплатный вывоз металлолома в Москве и МО.">
        @endif
        @if(!empty(request()->route()) && file_exists(public_path('assets/images/open-graph/'.request()->route()->uri.'.webp')))
            <meta property="og:image" content="{{asset('assets/images/open-graph/'.request()->route()->uri.'.webp')}}">
            <meta property="og:image:secure_url"
                  content="{{asset('assets/images/open-graph/'.request()->route()->uri.'.webp')}}">
            <meta property="og:image:url"
                  content="{{asset('assets/images/open-graph/'.request()->route()->uri.'.webp')}}">
            <meta property="og:image:type" content="image/webp">
            <meta property="og:image:width" content="500"/>
            <meta property="og:image:height" content="500"/>
            <meta property="vk:image" content="{{asset('assets/images/open-graph/'.request()->route()->uri.'.webp')}}"/>
        @else
            <meta property="og:image" content="{{asset('assets/images/core-img/og-base.jpg')}}">
            <meta property="og:image:secure_url" content="{{asset('assets/images/core-img/og-base.jpg')}}">
            <meta property="og:image:url" content="{{asset('assets/images/core-img/og-base.jpg')}}">
            <meta property="og:image:type" content="image/jpg">
            <meta property="og:image:width" content="500"/>
            <meta property="og:image:height" content="500"/>
            <meta property="vk:image" content="{{asset('assets/images/core-img/og-base.jpg')}}"/>
        @endif

        <meta name="twitter:card" content="summary">
        @if(!empty($meta->description))
            <meta name="twitter:description" content="{{$meta->description}}">
        @else
            <meta name="twitter:description"
                  content="{{$meta->h1}} и бесплатный вывоз металлолома в Москве и МО.">
        @endif
        <meta name="twitter:title" content="{{$meta->h1}}">
        <meta name="twitter:domain" content="metallolom-24.ru">
        <meta name="twitter:url" content="https://metallolom-24.ru/">
        @if(!empty(request()->route()) && file_exists(public_path('assets/images/open-graph/'.request()->route()->uri.'.webp')))
            <meta name="twitter:image" content="{{asset('assets/images/open-graph/'.request()->route()->uri.'.webp')}}">
        @else
            <meta name="twitter:image" content="{{asset('assets/images/core-img/og-base.jpg')}}">
        @endif
        <meta name="twitter:site" content="@Metalolom24">

        {{--        <meta property="fb:app_id" content="793942314646632">--}}
        {{--        <meta property="fb:app:id" content="793942314646632">--}}
        <meta property="og:url" content="{{url()->full()}}">
        <meta property="og:site_name" content="Прием и вывоз чёрного и цветного металлолома в Москве и МО">
        {{--Open Graph Meta--}}
    @endif
    {{--Document title--}}
    <title>{{$meta->title ?? $title}}</title>

    {{--Additional For SEO--}}
    <link rel="canonical" href="{{url()->full()}}">
    <link rel="manifest" href="{{asset('manifest.json')}}">
    {{--Additional For SEO--}}

    {{--Stylesheets & Fonts--}}
    <link href="{{asset('assets/css/plugins.min.css')}}" rel="preload" as="style" onload="this.rel='stylesheet'">
    <link href="{{asset('assets/css/style.min.css')}}" rel="stylesheet">
    @stack('styles')
</head>
