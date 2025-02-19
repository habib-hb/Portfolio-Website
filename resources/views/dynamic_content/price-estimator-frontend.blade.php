<!DOCTYPE html>
<html style="scroll-behavior: smooth;" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Estimation Display</title>



        @vite('resources/css/app.css')
        @livewireStyles

         <!-- Favicon -->
         <link rel="icon" href="{{ asset('favicons/single_blog_fav.png') }}" type="image/png">

    </head>
    <body>


        <livewire:price-estimator-frontend service_name="{{$service_name}}" service_id="{{$service_id}}"/>

        @livewireScripts
    </body>

</html>
