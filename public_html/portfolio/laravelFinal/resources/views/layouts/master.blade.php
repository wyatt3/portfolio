<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Favorite Cars</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arizonia" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('css/styles.css') }}">
    </head>
    <body>
    @include('partials.header')
    @yield('content')
    </body>
    @include('partials.footer')
</html>