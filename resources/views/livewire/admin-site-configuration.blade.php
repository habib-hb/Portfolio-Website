<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}"
    data-theme-mode="{{ session('theme_mode') }}" id="main_div">

    <nav
        class="flex justify-center items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-center md:w-[20vw]">

            <img src="{{ $site_logo_light_specific }}"
                class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} cursor-pointer"
                onclick="window.location.href='/'" alt="">

            <img src="{{ $site_logo_dark_specific }}"
                class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? 'hidden' : '' }} cursor-pointer"
                onclick="window.location.href='/'" alt="">

        </div>



    </nav>

    <!-- Show a loading spinner while Doing Theme Change Processing -->
    <div wire:loading wire:target="changeThemeMode"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
        </div>


    </div>

    <div wire:loading wire:target="save"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Saving Headlines...</span>
        </div>


    </div>


    <div wire:loading wire:target="hero_avatar_image"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Avatar Image...</span>
        </div>


    </div>


    {{-- Notifications --}}
    {{-- From Completion Notification --}}
    @if ($notify_success)
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-left">{{ $notify_success }}</p>

            </div>

            <button wire:click="clear_notify_success"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif



    {{-- Form Error Message --}}
    @if ($notify_error)
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit mx-auto w-[90%] max-w-[400px]  bg-[#9f1a1a] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">

                <p class="text-white text-center">{{ $notify_error }}</p>

            </div>

            <button wire:click="clear_notify_error"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif
    {{-- End Notifications --}}




    <div class="flex justify-center relative w-full max-w-[800px] mx-auto mt-6">
        <img src="{{ session('theme_mode') == 'light' ? asset('images/back_light_mode.png') : asset('images/back_dark_mode.png') }}"
            class="absolute left-1 md:left-0 h-[48px] w-[48px]  md:hover:scale-105 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard'" alt="">

        <img wire:click="changeThemeMode" src="{{ asset('images/light_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} md:hover:scale-105 transition-all cursor-pointer">

        <img wire:click="changeThemeMode" src="{{ asset('images/dark_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? 'hidden' : '' }} md:hover:scale-105 transition-all cursor-pointer">

    </div>



    <div class="flex flex-col w-[96vw] min-h-[100vh] md:max-w-[800px] mx-auto mt-4">

        <h1
            class="text-3xl font-bold {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center">
            Site Configuration</h1>

        {{-- Site Logo --}}
        <h1
            class="text-xl mt-10 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-4">
            Header Logo Section</h1>
        <div class="flex flex-col mt-10">

            <label for="item_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Site Logo -
                Light Mode (Make sure it's less than 1mb)</label>

            @if ($temporary_image_site_logo_light)
                <img src="{{ $temporary_image_site_logo_light }}"
                    class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]" alt="">
            @endif

            <input wire:model="site_logo_light" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="item_image" />

            @error('site_logo_light')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>

        <div class="flex flex-col mt-6">

            <label for="item_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Site Logo -
                Dark Mode (Make sure it's less than 1mb)</label>

            @if ($temporary_image_site_logo_dark)
                <img src="{{ $temporary_image_site_logo_dark }}"
                    class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]" alt="">
            @endif

            <input wire:model="site_logo_dark" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="item_image" />

            @error('site_logo_dark')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>
        {{-- End Site Logo --}}



        {{-- Hero Section --}}
        <h1
            class="text-xl mt-10 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-4">
            Hero
            Section</h1>

        <div class="flex flex-col mt-2">

            <label for="title"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Top Layer
                Text</label>

            <input wire:model="top_layer_text" type="text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>

        <div class="flex flex-col mt-2">

            <label for="title"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Up Middle Layer
                Text</label>

            <input type="text" wire:model="up_middle_layer_text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>


        <div class="flex flex-col mt-2">

            <label for="title"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Down Middle
                Layer Text</label>

            <input type="text" wire:model="down_middle_layer_text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>

        <div class="flex flex-col mt-2">

            <label for="title"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">End Layer
                Text</label>

            <input type="text" wire:model="end_layer_text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>

        <div class="flex flex-col mt-6">

            <label for="item_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Hero Section
                Avatar (Make sure it's less than 1mb)</label>

            @if ($temporary_image_hero_avatar)
                <img src="{{ $temporary_image_hero_avatar }}"
                    class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]" alt="">
            @endif

            <input wire:model="hero_avatar_image" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="item_image" />

            @error('item_image')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>


        {{-- Categories Section --}}
        <h1 class="text-xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-8">
            Categories Section</h1>



        <div class="flex flex-col mt-4">

            <label for="banner_headline"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">The Categories
                Caption (300 Letters Max)</label>

            <textarea type="text" wire:model="categories_caption"
                class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="banner_headline" rows="4" maxlength="300"></textarea>

        </div>


        {{-- Services Section --}}
        <h1 class="text-xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-8">
            Services Section</h1>



        <div class="flex flex-col mt-4">

            <label for="banner_headline"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">The Services
                Caption (300 Letters Max)</label>

            <textarea type="text" wire:model="services_caption"
                class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="banner_headline" rows="4" maxlength="300"></textarea>

        </div>



        <h1 class="text-xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-8">My
            Portfolio Section</h1>



        <div class="flex flex-col mt-4">

            <label for="banner_headline"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">My Portfolio
                Caption (300 Letters Max)</label>

            <textarea type="text" wire:model="my_portfolio_caption"
                class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="banner_headline" rows="4" maxlength="300"></textarea>

        </div>



        <h1 class="text-xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-8">
            Collaborations Section</h1>

        <div class="flex flex-col mt-4">

            <label for="banner_headline"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Collaborations
                Caption (300 Letters Max)</label>

            <textarea type="text" wire:model="collaborations_caption"
                class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="banner_headline" rows="4" maxlength="300"></textarea>

        </div>




        <h1 class="text-xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-8">
            Testimonials Section</h1>

        <div class="flex flex-col mt-4">

            <label for="banner_headline"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Testimonials
                Caption (300 Letters Max)</label>

            <textarea type="text" wire:model="testimonials_caption"
                class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="banner_headline" rows="4" maxlength="300"></textarea>

        </div>



        <h1 class="text-xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-8">
            Categories Page Caption</h1>

        <div class="flex flex-col mt-4">

            <label for="banner_headline"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Categories
                Page
                Caption (300 Letters Max)</label>

            <textarea type="text" wire:model="categories_page_caption"
                class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="banner_headline" rows="4" maxlength="300"></textarea>

        </div>


        <h1 class="text-xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-8">
            Price Estimation Page Caption</h1>

        <div class="flex flex-col mt-4">

            <label for="banner_headline"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Price
                Estimation Page
                Caption (300 Letters Max)</label>

            <textarea type="text" wire:model="price_estimation_page_caption"
                class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="banner_headline" rows="4" maxlength="300"></textarea>

        </div>


        <h1 class="text-xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-4">
            Currency Rate Per Dollar</h1>

        <div class="flex flex-col mt-2">

            <label for="title"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Tk per
                Dollar</label>

            <input wire:model="dollar_rate_in_tk" type="number"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>



        {{-- Footer Logo --}}
        <h1
            class="text-xl mt-10 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-4">
            Footer Section</h1>
        <div class="flex flex-col mt-10">

            <label for="item_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Footer Logo -
                Light Mode (Make sure it's less than 1mb)</label>

            @if ($temporary_image_footer_logo_light)
                <img src="{{ $temporary_image_footer_logo_light }}"
                    class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]" alt="">
            @endif

            <input wire:model="footer_logo_light" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="item_image" />

            @error('footer_logo_light')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>

        <div class="flex flex-col mt-6">

            <label for="item_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Footer Logo -
                Dark Mode (Make sure it's less than 1mb)</label>

            @if ($temporary_image_footer_logo_dark)
                <img src="{{ $temporary_image_footer_logo_dark }}"
                    class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]" alt="">
            @endif

            <input wire:model="footer_logo_dark" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="item_image" />

            @error('footer_logo_dark')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>

        <div class="flex flex-col mt-2">

            <label for="title"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Top Layer
                Text</label>

            <input wire:model="footer_top_layer_text" type="text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>

        <div class="flex flex-col mt-2">

            <label for="title"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Bottom Layer
                Text</label>

            <input type="text" wire:model="footer_bottom_layer_text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>


        {{-- Footer Logo --}}





        {{-- <div class="flex flex-col mt-8">

            <label for="banner_headline" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Banner Headline (300 Letters Max)</label>

            <textarea wire:model.debounce.500ms="banner_headline" type="text" class="w-[96vw] md:max-w-full  py-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2" id="banner_headline" rows="4" maxlength="300" ></textarea>

        </div> --}}


        <div class="flex justify-center items-center">
            <button wire:click="save"
                class="px-16 py-2 bg-[#1A579F] text-white rounded-lg mt-8 hover:scale-110 transition-all">Save</button>
        </div>







    </div>





    {{-- Sidebar Test --}}

    <!-- Navigation Toggle -->
<div class="lg:hidden py-16 text-center">
    <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-gray-800 border border-gray-800 text-white text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-gray-950 focus:outline-none focus:bg-gray-900 dark:bg-white dark:text-neutral-800 dark:hover:bg-neutral-200 dark:focus:bg-neutral-200" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-sidebar-mini-sidebar" aria-label="Toggle navigation" data-hs-overlay="#hs-sidebar-mini-sidebar">
      Open
    </button>
  </div>
  <!-- End Navigation Toggle -->

  <!-- Sidebar -->
  <div id="hs-sidebar-mini-sidebar" class="hs-overlay [--auto-close:lg] xl:block lg:translate-x-0 lg:end-auto lg:bottom-0 w-20
  hs-overlay-open:translate-x-0
  -translate-x-full transition-all duration-300 transform
  h-[calc(100vh_-_130px)]
  hidden
  fixed top-[120px] start-2 bottom-0 z-[60]
  rounded-lg
  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]
  {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} " role="dialog" tabindex="-1" aria-label="Sidebar" >
    <div class="relative flex flex-col h-full max-h-full ">
        <!-- Header -->
        <header class="p-4 flex justify-center items-center gap-x-2">

          <!-- Logo -->
          {{-- <a class="flex-none focus:outline-none focus:opacity-80" href="#">
            <svg class="w-10 h-auto" width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="100" height="100" rx="10" fill="black"/>
              <path d="M37.656 68V31.6364H51.5764C54.2043 31.6364 56.3882 32.0507 58.1283 32.8793C59.8802 33.696 61.1882 34.8146 62.0523 36.2351C62.9282 37.6555 63.3662 39.2654 63.3662 41.0646C63.3662 42.5443 63.0821 43.8108 62.5139 44.8643C61.9458 45.906 61.1823 46.7524 60.2235 47.4034C59.2646 48.0544 58.1934 48.522 57.0097 48.8061V49.1612C58.2999 49.2322 59.5369 49.6288 60.7206 50.3509C61.9162 51.0611 62.8927 52.0672 63.6503 53.3693C64.4079 54.6714 64.7867 56.2457 64.7867 58.0923C64.7867 59.9744 64.3309 61.6671 63.4195 63.1705C62.508 64.6619 61.1349 65.8397 59.3002 66.7038C57.4654 67.5679 55.1572 68 52.3754 68H37.656ZM44.2433 62.4957H51.3279C53.719 62.4957 55.4413 62.04 56.4948 61.1286C57.5601 60.2053 58.0928 59.0215 58.0928 57.5774C58.0928 56.5002 57.8264 55.5296 57.2938 54.6655C56.7611 53.7895 56.0035 53.103 55.021 52.6058C54.0386 52.0968 52.8667 51.8423 51.5054 51.8423H44.2433V62.4957ZM44.2433 47.1016H50.7597C51.896 47.1016 52.92 46.8944 53.8314 46.4801C54.7429 46.054 55.459 45.4562 55.9798 44.6868C56.5125 43.9055 56.7789 42.9822 56.7789 41.9169C56.7789 40.5083 56.2817 39.3482 55.2874 38.4368C54.3049 37.5253 52.843 37.0696 50.9017 37.0696H44.2433V47.1016Z" fill="white"/>
            </svg>
          </a> --}}
          <!-- End Logo -->

          {{-- <div class="lg:hidden absolute top-1 -end-3">
            <!-- Close Button -->
            <button type="button" class="flex justify-center items-center gap-x-3 size-6 bg-white border border-gray-200 text-sm text-gray-600 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 dark:hover:text-neutral-200 dark:focus:text-neutral-200" data-hs-overlay="#hs-sidebar-mini-sidebar">
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
              <span class="sr-only">Close</span>
            </button>
            <!-- End Close Button -->
          </div> --}}
        </header>
        <!-- End Header -->

        <!-- Body -->
        <nav class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full {{ session('theme_mode') == 'light' ? '[&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300' : '[&::-webkit-scrollbar-track]:bg-neutral-700 [&::-webkit-scrollbar-thumb]:bg-neutral-500' }}  ">

          <div class="flex flex-col justify-center items-center gap-y-2 pb-[40px]">
            <!-- Link -->
            <div class="hs-tooltip [--placement:right] inline-block">
              <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none" href="#">
                <img src="{{ asset('images/banner_headline.gif') }}" class="h-[36px] rounded-lg" alt="">
                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs  rounded-lg whitespace-nowrap " role="tooltip">
                  Home
                </span>
              </a>
            </div>
            <!-- End Link -->
            <!-- Link -->
            <div class="hs-tooltip [--placement:right] inline-block">
              <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none" href="#">
                <img src="{{ asset('images/banner_headline.gif') }}" class="h-[36px] rounded-lg" alt="">
                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs  rounded-lg whitespace-nowrap " role="tooltip">
                  Home
                </span>
              </a>
            </div>
            <!-- End Link -->
            <!-- Link -->
            <div class="hs-tooltip [--placement:right] inline-block">
              <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none" href="#">
                <img src="{{ asset('images/banner_headline.gif') }}" class="h-[36px] rounded-lg" alt="">
                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs  rounded-lg whitespace-nowrap " role="tooltip">
                  Home
                </span>
              </a>
            </div>
            <!-- End Link -->
            <!-- Link -->
            <div class="hs-tooltip [--placement:right] inline-block">
              <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none" href="#">
                <img src="{{ asset('images/banner_headline.gif') }}" class="h-[36px] rounded-lg" alt="">
                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs  rounded-lg whitespace-nowrap " role="tooltip">
                  Home
                </span>
              </a>
            </div>
            <!-- End Link -->
            <!-- Link -->
            <div class="hs-tooltip [--placement:right] inline-block">
              <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none" href="#">
                <img src="{{ asset('images/banner_headline.gif') }}" class="h-[36px] rounded-lg" alt="">
                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs  rounded-lg whitespace-nowrap " role="tooltip">
                  Home
                </span>
              </a>
            </div>
            <!-- End Link -->

          </div>
        </nav>
        <!-- End Body -->
    </div>
  </div>
  <!-- End Sidebar -->


    {{-- End Sidebar Test --}}






    {{-- Footer Element --}}
    <div
        class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon'
            src="{{ session('theme_mode') == 'light' ? $footer_logo_light_specific : $footer_logo_dark_specific }}"
            class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt="">

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">{{$footer_top_layer_text_specific}}</p>

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">{{$footer_bottom_layer_text_specific}}</p>

    </div>


</div>

