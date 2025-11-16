<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50">
        <div class="min-h-screen flex">
            <!-- Sol taraf - Görsel alanı -->
            <div class="hidden lg:flex lg:w-1/2 relative bg-gradient-to-br from-primary-600 to-primary-800">
                <div class="absolute inset-0 bg-black opacity-10"></div>
                <div class="relative z-10 flex items-center justify-center w-full">
                    <div class="max-w-md text-center text-white p-6">
                        <h1 class="text-5xl font-light mb-6">İyilik Ağı</h1>
                        <p class="text-xl font-light opacity-90">Birlikte daha güçlüyüz</p>
                    </div>
                </div>
            </div>

            <!-- Sağ taraf - Form alanı -->
            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-8 lg:p-16">
                <div class="w-full max-w-sm">
                    <div class="mb-12 text-center lg:text-left">
                        <x-application-logo />
                    </div>

                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
