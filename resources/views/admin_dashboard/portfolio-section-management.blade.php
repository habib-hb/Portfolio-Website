<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portfolio Section Management</title>



        @vite('resources/css/app.css')
        @livewireStyles

         <!-- Favicon -->
         <link rel="icon" href="{{ asset('favicons/admin_dashboard_fav.png') }}" type="image/png">

         <style>
            .mce-notification {display: none !important;}
        </style>
    </head>
    <body>



        <livewire:admin-portfolio-section-management/>

        @livewireScripts
    </body>

</html>
