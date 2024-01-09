<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    {{--script vite--}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{--    panggil css secara dinamis--}}
    @stack('css')
</head>

<body id="page-top" class="bg-body-secondary">
<!-- Page Wrapper -->
<div id="wrapper">
    <nav class="navbar navbar-expand bg-dark">
        <div class="container">
            <a href="{{url('/zancc-admin/dashboard')}}" class="navbar-brand text-light fs-4 fw-bold">zanccode</a>
            <div class="navbar-nav">
                <div class="nav-item"></div>
                <div class="nav-item dropdown">
                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                       class="nav-link dropdown-toggle d-flex gap-2 align-items-center text-light fs-5 fw-light">
                        {{auth()->user()->name}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow dropdown-menu-dark p-2">
                        <li class="px-3 pb-3">{{auth()->user()->email}}</li>
                        <li>
                            <a class="dropdown-item text-bg-danger rounded opacity-75" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div style="height: 60px">
        <div class="h-100 bg-dark"></div>
    </div>
    <nav class="navbar navbar-expand" style="margin-top: -40px">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="navbar-nav d-flex flex-wrap flex-row gap-2 align-items-center justify-content-center w-100">
                <div class="nav-item bg-dark-subtle p-0 p-md-1 p-lg-3 flex-fill shadow-sm rounded">
                    <a href="{{url('zancc-admin/dashboard')}}" class="nav-link active">
                        <i class="bi bi-house mx-2"></i>
                        Dashboard
                    </a>
                </div>
                <div class="nav-item dropdown bg-dark-subtle p-0 p-md-1 p-lg-3 flex-fill shadow-sm rounded">
                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                       class="nav-link dropdown-toggle">
                        <i class="bi bi-journal-text mx-2 text-dark"></i>
                        Blog
                    </a>
                    <ul class="dropdown-menu shadow dropdown-menu-dark">
                        <li><a href="{{url('zancc-admin/articles')}}" class="dropdown-item">artikel</a></li>
                        @if(auth()->user()->role == 1)
                            <li><a href="{{url('zancc-admin/categories')}}" class="dropdown-item">kategori</a></li>
                        @endif
                    </ul>
                </div>
                <div class="nav-item bg-dark-subtle p-0 p-md-1 p-lg-3 flex-fill shadow-sm rounded">
                    <a href="{{url('zancc-admin/users')}}" class="nav-link active">
                        <i class="bi bi-people mx-2 text-dark"></i>
                        Users
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{--content--}}
    @yield("content")
    <div>
        <div style="height: 150px"></div>
    </div>

@stack('js')
</body>
