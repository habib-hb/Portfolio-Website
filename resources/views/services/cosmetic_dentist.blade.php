<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cosmetic Dental Service</title>
    @vite('resources/css/app.css')
    @livewireStyles

      <!-- Favicon -->
      <link rel="icon" href="{{ asset('favicons/cosmetic_dentistry_fav.png') }}" type="image/png">
</head>
<body>


    <livewire:cosmetic-dentist-service parameter="Root Canal Treatment"/>

    @livewireScripts
</body>
</html>
