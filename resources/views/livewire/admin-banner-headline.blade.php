<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}"
    data-theme-mode="{{ session('theme_mode') }}" id="main_div">

    <nav
        class="flex justify-center items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-center md:w-[20vw]">

            <img src="{{ asset('images/the_logo_light_mode.png') }}"
                class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} cursor-pointer"
                onclick="window.location.href='/'" alt="">

            <img src="{{ asset('images/the_logo_dark_mode.png') }}"
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
            Set Headlines</h1>

        {{-- Hero Section --}}
        <h1 class="text-xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-4">Hero
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

        <div class="flex flex-col mt-2">

            <label for="item_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Hero Section
                Avatar (Make sure it's less than 1mb)</label>

            @if ($temporary_image_hero_avatar)
                <img src="{{ $temporary_image_hero_avatar }}" class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]"
                    alt="">
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
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Categories Page
                Caption (300 Letters Max)</label>

            <textarea type="text" wire:model="categories_page_caption"
                class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="banner_headline" rows="4" maxlength="300"></textarea>

        </div>


        <h1 class="text-xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-center mt-4">Currency Rate Per Dollar</h1>

        <div class="flex flex-col mt-2">

            <label for="title"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Tk per Dollar</label>

            <input wire:model="dollar_rate_in_tk" type="number"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>





        {{-- <div class="flex flex-col mt-8">

            <label for="banner_headline" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Banner Headline (300 Letters Max)</label>

            <textarea wire:model.debounce.500ms="banner_headline" type="text" class="w-[96vw] md:max-w-full  py-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2" id="banner_headline" rows="4" maxlength="300" ></textarea>

        </div> --}}


        <div wire:click="save" class="flex justify-center items-center">
            <button
                class="px-16 py-2 bg-[#1A579F] text-white rounded-lg mt-8 hover:scale-110 transition-all">Save</button>
        </div>







    </div>



    {{-- Footer Element --}}
    <div
        class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon'
            src="{{ session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png') }}"
            class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt="">

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">All
            Rights Reserved @2024</p>

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            @valueadderhabib</p>

    </div>


</div>
