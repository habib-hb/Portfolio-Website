<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Root Canal Treatment</title>
    @vite('resources/css/app.css')
    @livewireStyles

      <!-- Favicon -->
      <link rel="icon" href="{{ asset('favicons/root_canal_treatment_fav.png') }}" type="image/png">
</head>
<body>


    <livewire:root-canal-treatment-service/>

    @livewireScripts
</body>
</html>
