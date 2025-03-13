<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homepage - Digital Services</title>



    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @livewireStyles

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicons/homepage_fav.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

</head>

<body class="font-poppins">



    <livewire:homepage_wire />

     <!-- Google Recaptcha Widget-->
     {{-- <form action="?" method="POST">
        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
        <br/>
        <input type="submit" value="Submit">
      </form> --}}






    @livewireScripts






    <!-- Initialize Swiper -->


</body>

</html>
