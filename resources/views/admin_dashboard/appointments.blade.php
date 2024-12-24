<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Appointments</title>



        @vite(['resources/css/app.css','resources/js/app.js'])
        @livewireStyles

         <!-- Favicon -->
         <link rel="icon" href="{{ asset('favicons/appointments_fav.png') }}" type="image/png">
    </head>
    <body  class="{{session('theme_mode') == 'dark' ? 'dark' : ''}} bg-[#EFF9FF] dark:bg-black">



        <livewire:admin-appointments/>

        @livewireScripts
    </body>

</html>
