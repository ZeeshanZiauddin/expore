<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        
        @filamentStyles
        @filamentScripts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts
        @include('components.layouts.head-tags')
    </head>

<body class="antialiased relative">

    
    @yield('body')



    <!-- JAVASCRIPTS -->
    @include('components.layouts.foot-tags')
    @filamentScripts
    @vite('resources/js/app.js')
    <!-- JAVASCRIPTS END-->

</body>

</html>