<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{--Poppins font--}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        {{--open sans font--}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
        {{--Tailwind CSS--}}
        @vite('resources/css/app.css')
        {{--Perlin Ui Library--}}
        @vite('resources/js/app.js')
        {{--Title--}}
        <title>{{ $title ?? 'Dooty' }}</title>
    </head>

    <body class="bg-secondary">
        {{ $content }}
        <footer>
            <div class="w-4/5 md:w-1/2 my-10 mx-auto py-4 md:py-6 px-4 md:px-8 bg-background rounded-md shadow-sm">
                <div class="flex flex-col lg:flex-row justify-between items-center gap-y-2">
                    <p class="open-sans-medium text-text text-sm">© 2021 Dooty. All rights reserved.</p>
                    <div class="flex gap-4">
                        <a href="#" class="text-text open-sans-semibold text-sm">Privacy Policy</a>
                        <a href="#" class="text-text open-sans-semibold text-sm">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
