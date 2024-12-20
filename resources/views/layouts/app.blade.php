<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Frontdesk</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
            rel="stylesheet">
        <style>
        </style>
        @livewireStyles
        @filamentStyles
        @vite('resources/css/app.css')

        @livewire('notifications')
        <!-- Scripts -->
        @livewireScripts
        @filamentScripts
        @vite('resources/js/app.js')
    </head>

    <body class="font-sans antialiased dark:text-white/50">

        <main class="mx-auto">
            <div>
                <div class="text-black">
                    @section('content')
                    </div>
                </div>
            </main>

            <footer class="bg-slate-900 py-20 text-white">
            </footer>
        </body>

        @yield('js')

    </html>
