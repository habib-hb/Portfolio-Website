<div
    class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}">

    {{-- <nav
        class="flex justify-center  items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-center items-center md:w-[20vw]">

            <img src="{{ $site_logo_light }}"
                class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} cursor-pointer"
                onclick="window.location.href='/'" alt="">

            <img src="{{ $site_logo_dark }}"
                class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? 'hidden' : '' }} cursor-pointer"
                onclick="window.location.href='/'" alt="">

        </div>



    </nav> --}}

    @livewire('components.header', [
        'theme_mode' => session('theme_mode'),
        'back_button_link' => '/'
    ])


    @livewire('components.sidebar', [
        'theme_mode' => session('theme_mode'),
    ])


    <!-- Show a loading spinner while Doing Theme Change Processing -->
    <div wire:loading wire:target="changeThemeMode"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
        </div>


    </div>

    {{-- <div wire:click="changeThemeMode" class="flex justify-center">

                <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? '' : 'hidden'}}">

                <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? 'hidden' : ''}}">

            </div> --}}








    {{-- <div class="flex justify-center relative w-full max-w-[800px] mx-auto mt-6">
        <img src="{{ session('theme_mode') == 'light' ? asset('images/back_light_mode.png') : asset('images/back_dark_mode.png') }}"
            class="absolute left-1 md:left-0 h-[48px] w-[48px]  md:hover:scale-105 transition-all cursor-pointer"
            onclick="window.location.href='/'" alt="">

        <img wire:click="changeThemeMode" src="{{ asset('images/light_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} md:hover:scale-105 transition-all cursor-pointer">

        <img wire:click="changeThemeMode" src="{{ asset('images/dark_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? 'hidden' : '' }} md:hover:scale-105 transition-all cursor-pointer">

    </div> --}}









    <h1
        class="text-3xl font-bold {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-4">
        Admin Dashboard</h1>


    {{-- Options --}}
    <div class="mt-4 flex flex-col gap-4">


        <div class="flex flex-col gap-2 justify-center  items-center  w-[96vw]  md:max-w-[800px]  md:px-8 py-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] md:hover:scale-110 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard/site-configuration'">

            <img src="{{ asset('images/site-configuration.png') }}" class="h-[64px] rounded-lg  bg-white p-1" alt="">

            <h2
                class="text-2xl font-semibold text-center px-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Site Configuration</h2>

        </div>


        <div class="flex flex-col gap-2 justify-center  items-center  w-[96vw]  md:max-w-[800px]  md:px-8 py-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] md:hover:scale-110 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard/appointments'">

            <img src="{{ asset('images/appointments.png') }}" class="h-[64px] rounded-lg  bg-white p-1" alt="">

            <h2
                class="text-2xl font-semibold text-center px-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Appointments</h2>

        </div>


        <div class="flex flex-col gap-2 justify-center  items-center  w-[96vw]  md:max-w-[800px]  md:px-8 py-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] md:hover:scale-110 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard/blogs'">

            <img src="{{ asset('images/blogs.png') }}" class="h-[64px] rounded-lg  bg-white p-1" alt="">

            <h2
                class="text-2xl font-semibold text-center px-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Write Blogs</h2>

        </div>

        <div class="flex flex-col gap-2 justify-center  items-center  w-[96vw]  md:max-w-[800px]  md:px-8 py-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] md:hover:scale-110 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard/blogs/blogs_manage'">

            <img src="{{ asset('images/manage-blogs.png') }}" class="h-[64px] rounded-lg  bg-white p-1" alt="">

            <h2
                class="text-2xl font-semibold text-center px-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
               Manage Blogs</h2>

        </div>


        <div class="flex flex-col gap-2 justify-center  items-center  w-[96vw]  md:max-w-[800px]  md:px-8 py-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] md:hover:scale-110 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard/schedules_management'">

            <img src="{{ asset('images/schedules-management.png') }}" class="h-[64px] rounded-lg  bg-white p-1" alt="">

            <h2
                class="text-2xl font-semibold text-center px-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Schedules Management</h2>

        </div>


        <div class="flex flex-col gap-2 justify-center  items-center  w-[96vw]  md:max-w-[800px]  md:px-8 py-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] md:hover:scale-110 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard/explore_section_management'">

            <img src="{{ asset('images/explore-section-management.png') }}" class="h-[64px] rounded-lg  bg-white p-1" alt="">

            <h2
                class="text-2xl font-semibold text-center px-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Explore Section Management</h2>

        </div>


        <div class="flex flex-col gap-2 justify-center  items-center  w-[96vw]  md:max-w-[800px]  md:px-8 py-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] md:hover:scale-110 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard/portfolio_section_management'">

            <img src="{{ asset('images/portfolio-section-management.png') }}" class="h-[64px] rounded-lg  bg-white p-1" alt="">

            <h2
                class="text-2xl font-semibold text-center px-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Portfolio Section Management</h2>

        </div>



        <div class="flex flex-col gap-2 justify-center  items-center  w-[96vw]  md:max-w-[800px]  md:px-8 py-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] md:hover:scale-110 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard/price_estimator_management'">

            <img src="{{ asset('images/price-estimator-management.png') }}" class="h-[64px] rounded-lg  bg-white p-1" alt="">

            <h2
                class="text-2xl font-semibold text-center px-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Price Estimator Management</h2>

        </div>


        <div class="flex flex-col gap-2 justify-center  items-center  w-[96vw]  md:max-w-[800px]  md:px-8 py-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] md:hover:scale-110 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard/contact_messages'">

            <img src="{{ asset('images/contact-messages.png') }}" class="h-[64px] rounded-lg  bg-white p-1" alt="">

            <h2
                class="text-2xl font-semibold text-center px-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Contact Messages</h2>

        </div>



        <div class="flex flex-col gap-2 justify-center  items-center  w-[96vw]  md:max-w-[800px]  md:px-8 py-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] md:hover:scale-110 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard/static-page-management'">

            <img src="{{ asset('images/static-page-management.png') }}" class="h-[64px] rounded-lg  bg-white p-1" alt="">

            <h2
                class="text-2xl font-semibold text-center px-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Static Page Management</h2>

        </div>



        <div class="flex flex-col gap-2 justify-center  items-center  w-[96vw]  md:max-w-[800px]  md:px-8 py-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] md:hover:scale-110 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard/collaboration-section-management'">

            <img src="{{ asset('images/collaboration-section-management.png') }}" class="h-[64px] rounded-lg  bg-white p-1" alt="">

            <h2
                class="text-2xl font-semibold text-center px-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Collaboration Section Management</h2>

        </div>



        <div class="flex flex-col gap-2 justify-center  items-center  w-[96vw]  md:max-w-[800px]  md:px-8 py-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] md:hover:scale-110 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard/testimonials-section-management'">

            <img src="{{ asset('images/testimonials-section-management.png') }}" class="h-[64px] rounded-lg  bg-white p-1" alt="">

            <h2
                class="text-2xl font-semibold text-center px-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Testimonials Section Management</h2>

        </div>


    </div>



    @livewire('components.footer', [
        'theme_mode' => session('theme_mode'),
    ])


    {{-- Footer Element --}}
    {{-- <div
        class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-16 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='footer_icon' src="{{ session('theme_mode') == 'light' ? $footer_logo_light : $footer_logo_dark }}"
            class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt="">

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            {{ $footer_top_layer_text }}</p>

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            {{ $footer_bottom_layer_text }}
        </p>

    </div> --}}





</div>
