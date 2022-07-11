<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <!-- Styles -->
    <style>
    </style>
</head>
<body>
<div class="container fs-5">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href={{route('index')}}>Home</a>
        </div>
    </nav>
    @yield('content')
</div>
<script src={{asset('js/app.js')}}}></script>
</body>
</html>
