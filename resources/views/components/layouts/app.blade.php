<html>
    <head>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <title>{{ $title ?? 'Dooty' }}</title>
    </head>

    <body>
        {{ $content }}
    </body>

    <footer>
        <p>&copy; 2024 Dooty, All rights reserved</p>
    </footer>
</html>
