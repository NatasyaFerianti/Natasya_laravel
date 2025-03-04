<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale())}}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name')}}</title>
    </head>
    <body>
        <div class="container">
                <h1 class="display-4">Halaman Home</h1>
                <p class="lead">Halaman ini merupakan halaman home</p>
                @yield('content')
            </div>
        </div>
    </body>
</html>