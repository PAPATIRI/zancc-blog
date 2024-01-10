<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta charset="utf-8"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content=""/>
    <meta name="author" content="zancc"/>
    @stack('meta-seo')
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/assets/favicon.ico')}}"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset("/frontend/css/styles.css")}}" rel="stylesheet"/>
    <link href="{{asset("/frontend/css/custom.css")}}" rel="stylesheet"/>
    {{--aos library--}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('css')
</head>
<body class="d-flex flex-column bg-body-secondary justify-content-between" style="min-height: 100vh">
<div>
    @include('frontend.layout.navbar')
</div>
{{--content--}}
<div class="flex-grow-1" style="padding-top: 80px">
    @yield('content')
</div>
{{--end of content--}}

<!-- Footer-->
<footer class="py-3 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white fs-6">
            copyright &copy; <a href="{{url('/')}}"
                                class="text-decoration-none text-light m-0 p-0">zanccode</a> {{$current_year}}
        </p>
    </div>
</footer>

<!-- Core theme JS-->
<script src="{{asset('frontend/js/scripts.js')}}"></script>
{{--aos script library--}}
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@stack('js')
</body>
</html>
