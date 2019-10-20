<!DOCTYPE html>
<html lang="pt">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <head>
        <title>Loja @yield('title')</title>
    </head>
    <body>
        @section('sidebar')

        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
