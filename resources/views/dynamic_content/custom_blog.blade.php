<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$post->blog_title}} -Blog</title>



        @vite('resources/css/app.css')
        @livewireStyles

         <!-- Favicon -->
         <link rel="icon" href="{{ asset('favicons/single_blog_fav.png') }}" type="image/png">
         
    </head>
    <body>


        <livewire:custom-blog blog_image="{{$post->blog_image}}" blog_title="{{$post->blog_title}}" blog_excerpt="{{$post->blog_excerpt}}" :blog_text="$post->blog_text" blog_author="{{$post->blog_author}}" blog_date="{{$post->updated_at}}"/>

        @livewireScripts
    </body>

</html>
