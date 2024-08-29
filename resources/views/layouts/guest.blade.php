<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        @vite(['resources/css/custom.css' ,'resources/css/app.css', 'resources/js/app.js'])
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->


    </head>
    <body class="container"   style="background-color:beige;">
        <div class=" d-flex flex-row align-items-center justify-content-center ">
            <div class="intro-txt text-left  w-45" >
                <h1>Unleash Your Productivity with TaskMaster!</h1>
                <p>Your go-to solution for organizing your tasks and boosting productivity. Whether you’re managing personal goals or coordinating team projects, TaskMaster simplifies your life with a clean, intuitive interface.</p>
            </div>
            <div class="intro-page w-45 border-3  ">
                {{ $slot }}
            </div>
        </div>

    </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
