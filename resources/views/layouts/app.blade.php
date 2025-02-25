<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @livewireStyles

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite('resources/js/app.js')


        <!-- Dropzone CSS (para upload de arquivos) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />
    </head>
    
    <body 
        class="font-sans antialiased"
    >


        <div id="main" class="min-h-screen w-full">

        @livewire('navigation-menu')

            <div class="lg:ml-[220px]  grow">
                {{ $slot ?? '' }}

                @yield("content")
            </div>
            

        </div>       
    </body>
</html>
