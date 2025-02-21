<!DOCTYPE html>
<html style="scroll-behavior: smooth;" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contact Messages</title>



        @vite('resources/css/app.css')
        @livewireStyles

         <!-- Favicon -->
         <link rel="icon" href="{{ asset('favicons/admin_dashboard_fav.png') }}" type="image/png">
         <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

         <style>
            .mce-notification {display: none !important;}
        </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body class="font-poppins">



        <livewire:admin-contact-messages/>

        @livewireScripts
    </body>

</html>
