<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>admin dashboard</title>
    {{--script vite--}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body id="page-top" class="bg-body-secondary">
<!-- Page Wrapper -->
<div id="wrapper">
    <nav class="navbar navbar-expand bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand text-light fs-4 fw-bold">zanccode</a>
            <div class="navbar-nav">
                <div class="nav-item"></div>
                <div class="nav-item dropdown">
                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                       class="nav-link dropdown-toggle d-flex gap-2 align-items-center text-light fs-5 fw-light">
                        syarif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow dropdown-menu-dark">
                        <li><a href="#" class="dropdown-item">profile</a></li>
                        <li><a href="#" class="dropdown-item">pengaturan</a></li>
                        <li><a href="#" class="dropdown-item">tentang</a></li>
                        <li><a href="#" class="dropdown-item">logout</a></li>
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
            <div class="navbar-nav d-flex flex-row gap-2 align-items-center justify-content-center w-100">
                <div class="nav-item bg-dark-subtle p-1 p-lg-3 flex-fill shadow-sm rounded">
                    <a href="{{url('dashboard')}}" class="nav-link text-dark">
                        <i class="bi bi-house mx-2"></i>
                        Dashboard
                    </a>
                </div>
                <div class="nav-item dropdown bg-dark-subtle p-1 p-lg-3 flex-fill shadow-sm rounded">
                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle">
                        <i class="bi bi-journal-text mx-2 text-dark"></i>
                        Blog
                    </a>
                    <ul class="dropdown-menu shadow dropdown-menu-dark">
                        <li><a href="#" class="dropdown-item">article</a></li>
                        <li><a href="{{url('categories')}}" class="dropdown-item">categories</a></li>
                    </ul>
                </div>
                <div class="nav-item bg-dark-subtle p-1 p-lg-3 flex-fill shadow-sm rounded">
                    <a href="#" class="nav-link">
                        <i class="bi bi-person-workspace mx-2 text-dark"></i>
                        Project
                    </a>
                </div>
                <div class="nav-item bg-dark-subtle p-1 p-lg-3 flex-fill shadow-sm rounded">
                    <a href="#" class="nav-link">
                        <i class="bi bi-images mx-2 text-dark"></i>
                        galery
                    </a>
                </div>
            </div>
        </div>
    </nav>

{{--content--}}
@yield("content")
</body>
