<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Price Estimator Dashboard</title>



        @vite('resources/css/app.css')
        @livewireStyles

         <!-- Favicon -->
         <link rel="icon" href="{{ asset('favicons/admin_dashboard_fav.png') }}" type="image/png">
    </head>
    <body>



        <livewire:admin-price-estimator-management/>

        @livewireScripts
    </body>

</html>
