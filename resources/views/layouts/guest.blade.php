<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex flex-col h-screen w-screen bg-main p-4">
    <header class="container flex flex-wrap justify-between mb-8">
        <h1 class="text-5xl font-bold">Senar</h1>
    </header>
            {{ $slot }}
      
    </body>
</html>
