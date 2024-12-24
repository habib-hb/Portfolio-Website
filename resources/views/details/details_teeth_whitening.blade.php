<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Teeth Whitening -Blog</title>



        @vite('resources/css/app.css')
        @livewireStyles

          <!-- Favicon -->
          <link rel="icon" href="{{ asset('favicons/teeth_whitening_fav.png') }}" type="image/png">
    </head>
    <body>



        <livewire:details-teeth-whitening/>

        @livewireScripts
    </body>

</html>
