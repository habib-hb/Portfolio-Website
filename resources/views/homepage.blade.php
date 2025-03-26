<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Value Adder Habib - Full Stack Laravel Developer</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="Habibur Rahman - A Full Stack Laravel Developer specializing in modern web applications with Laravel, Livewire , React, and Tailwind. Please, take a look at my profile & contact me now!">
    <meta name="keywords" content="Value Adder Habib, valueadderhabib, Laravel Developer, Full Stack Developer, Web Development, React, Tailwind, Livewire , laravel developer in bangladesh">
    <meta name="author" content="Habib">
    <meta name="robots" content="index, follow">



    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/animation_on_scroll.js'])
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    @livewireStyles

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicons/homepage_fav.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    {{-- Testing Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    {{-- End of Testing Swiper --}}
</head>

<body class="font-poppins">







    <livewire:homepage_wire />








    @livewireScripts

    {{-- Testing Swiper --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    {{-- End of Testing Swiper --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="{{ asset('assets/js/homepage.js') }}"></script>



</body>


</html>
