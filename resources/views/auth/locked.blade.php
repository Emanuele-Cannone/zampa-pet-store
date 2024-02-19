<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
</head>
<body class="hold-transition lockscreen">

<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="#">{{ config('app.name', 'Laravel') }}</a>
    </div>

    <div class="lockscreen-name text-capitalize">{{ Auth::user()->name }}</div>

    <div class="lockscreen-item">

        <div class="lockscreen-image">
            <img src="#" alt="User Image">
        </div>

        <form class="lockscreen-credentials" method="POST" action="{{route('locked.store')}}">
            @csrf
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="password">
                <div class="input-group-append">
                    <button type="submit" class="btn">
                        <i class="fas fa-arrow-right text-muted"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>

    <div class="help-block text-center">
        Enter your password to retrieve your session
    </div>
    <div class="text-center">
        <a href="{{route('login')}}">Or sign in as a different user</a>
    </div>
    <div class="lockscreen-footer text-center">
        Copyright © 2014-2021 <b><a href="https://adminlte.io" class="text-black">AdminLTE.io</a></b><br>
        All rights reserved
    </div>
</div>

<!-- REQUIRED SCRIPTS -->
@vite('resources/js/app.js')
@stack('scripts')

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}" defer></script>
@yield('scripts')

</body>
</html>

