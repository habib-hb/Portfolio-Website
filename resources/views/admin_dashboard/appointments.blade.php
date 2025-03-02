<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Appointments</title>



        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

         <!-- Favicon -->
         <link rel="icon" href="{{ asset('favicons/appointments_fav.png') }}" type="image/png">
         <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        </head>
        <body class="font-poppins {{session('theme_mode') == 'dark' ? 'dark' : ''}} bg-[#EFF9FF] dark:bg-black">



        <livewire:admin-appointments/>

        @livewireScripts
    </body>

</html>
