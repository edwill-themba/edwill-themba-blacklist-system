<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JSBC blacklist system</title>
        <!-- link app custom style -->
        <link rel="stylesheet" href="{{asset('css/style.css') }}">
        <!-- link bootstrap style -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <!-- link font awesome -->
        <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    </head>
    <body>
     @include('navbar.nav')
     <div class="continer">
     @yield('content')
     @include('message.messages')
     </div>
     <!-- add app js -->
     <script src="{{asset('js/app.js')}}"></script>
     <!-- bootstrap js -->
     <script src="{{asset('js/bootstrap.min.js')}}"></script>
     <!-- font awesome -->
     <script src="{{asset('js/all.min.js')}}"></script>
    </body>
</html>
