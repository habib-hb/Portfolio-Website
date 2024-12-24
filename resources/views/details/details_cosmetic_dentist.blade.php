<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cosmetic Dentistry _ Blog</title>



        @vite('resources/css/app.css')
        @livewireStyles

          <!-- Favicon -->
          <link rel="icon" href="{{ asset('favicons/cosmetic_dentistry_fav.png') }}" type="image/png">
    </head>
    <body>



        <livewire:details-cosmetic-dentist/>

        @livewireScripts
    </body>

</html>