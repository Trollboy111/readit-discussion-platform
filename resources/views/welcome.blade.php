<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <div>
            <a href="{{ route('home_page.index') }}">All Posts</a>
        </div>
    </body>
</html>
