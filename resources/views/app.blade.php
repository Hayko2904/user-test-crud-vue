<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>App</title>
        @vite('assets/users/css/app.css')
    </head>
    <body>
        <div id="app"></div>
        @vite('assets/users/js/app.js')
    </body>
</html>
