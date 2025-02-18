<!DOCTYPE html>
<html style="scroll-behavior: smooth;" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Estimation Item</title>



        @vite('resources/css/app.css')
        @livewireStyles

         <!-- Favicon -->
         <link rel="icon" href="{{ asset('favicons/single_blog_fav.png') }}" type="image/png">

    </head>
    <body>


        <livewire:estimation-item item_id="{{$item_id}}"/>

        @livewireScripts
    </body>

</html>
