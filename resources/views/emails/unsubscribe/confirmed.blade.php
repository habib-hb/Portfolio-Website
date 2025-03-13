<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Unsubscribed</title>



        @vite('resources/css/app.css')

          <!-- Favicon -->
          <link rel="icon" href="{{ asset('favicons/about_me_fav.png') }}" type="image/png">
          <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        </head>
        <body class="font-poppins {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}">

            <div class=" {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} p-8 rounded-lg w-[calc(100%_-_16px)] max-w-xl mx-auto mt-10">
                <p class="text-center text-4xl font-medium mb-2 text-green-500">
                    You have been unsubscribed from the email list. 
                </p>
                <p class="text-center text-lg font-medium mb-2">
                    No further emails will be sent to you from this site.
                </p>
                <div class="flex flex-col items-center">

                    <button onclick="window.location.href='/'" class="bg-[#1A579F] text-white px-4 py-2 rounded-md hover:scale-105 transition-all mt-4">
                       Go To Homepage
                    </button>

                </div>
            </div>

    </body>

</html>

