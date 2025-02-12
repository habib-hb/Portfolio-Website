<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{str_replace('-', ' ', $category_name) }} -Category</title>



        @vite('resources/css/app.css')
        @livewireStyles

         <!-- Favicon -->
         <link rel="icon" href="{{ asset('favicons/single_blog_fav.png') }}" type="image/png">

    </head>
    <body>


        <livewire:single-category-page category_title="{{str_replace('-', ' ', $category_name) }}" category_id="{{$category_id}}"/>

        @livewireScripts
    </body>

</html>
