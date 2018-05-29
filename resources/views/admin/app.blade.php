<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/jquery.stepProgressBar.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}">
    @yield('css-hooks')
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('backend/images/logo.png') }}" width="200px" alt="" />
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-right main_menu" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="" ><span class="support" >SUPPORT</span></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Member Name - <span>10,000 MNH</span></a></li>
                    <li class="profile-img" ><a href="#"><img src="{{ asset('backend/images/fed.jpg') }}" alt="" width="50" class="img-circle" /></a></li>
                    <li class="border-left"><a href="#">SIGN OUT</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<section class="dashboard">
    <div class="row">
        @include('admin.includes.navigation')
        @yield('content')
    </div>
</section>
    <script src="{{ asset('backend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    @yield('js-hooks')
</body>
</html>