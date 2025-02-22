<div
    class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}">

    <nav
        class="flex justify-center items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-start cursor-pointer">

            <img src="{{ asset('images/the_logo_light_mode.png') }}"
                class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} cursor-pointer"
                onclick="window.location.href='/'" alt="">

            <img src="{{ asset('images/the_logo_dark_mode.png') }}"
                class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? 'hidden' : '' }} cursor-pointer"
                onclick="window.location.href='/'" alt="">

        </div>

        {{-- <div id="input_div" class="relative">

            <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/search_light_mode.gif') : asset('images/search_dark_mode.gif')}}" class="absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1" alt="">

            <span id='search_text' class="absolute top-1/2 left-10 -translate-y-1/2 h-[80%] mt-1 {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#EFF9FF]'}}">Search</span>

            <input id='search_input' type="text" class="mr-2 h-[36px] w-[50vw] md:w-[30vw] rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#EFF9FF] text-[#070707]' : 'bg-[#070707] text-[#EFF9FF]' }}  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] px-4 focus: outline-none border-none ">



        </div> --}}





    </nav>

    <div wire:loading wire:target="send_message" class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing...</span>

        </div>
    </div>


    @if ($notify_success)

    <div id="appointment_unfulfilled" class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px] bg-[#1A579F] py-4 rounded-lg z-10">
        <div class="flex flex-col justify-between items-center px-8">

            <p class="text-white text-3xl font-semibold">Message</p>

            {{-- <p class="text-white text-left">{{session('appointment_unfulfilled')}}</p> --}}
            <p class="text-white text-center">{{$notify_success}}</p>

        </div>

        {{-- <button onclick="document.getElementById('appointment_unfulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

        <button wire:click="clear_notify_success" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>



    </div>

    @endif



    {{-- @if (session()->has('appointment_fulfilled')) --}}

    @if ($notify_error)

    <div id="appointment_fulfilled" class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px] bg-red-800  py-4 rounded-lg z-10">
        <div class="flex flex-col justify-between items-center px-8">

            <p class="text-white text-3xl font-semibold">Message</p>

            {{-- <p class="text-white text-left">{{session('appointment_fulfilled')}}</p> --}}
            <p class="text-white text-center">{{$notify_error}}</p>

        </div>

        {{-- <button onclick="document.getElementById('appointment_fulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

        <button wire:click="clear_notify_error" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

    </div>

    @endif



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

    <div class="flex justify-center relative w-full max-w-[1200px] mx-auto mt-6">
        <img src="{{ session('theme_mode') == 'light' ? asset('images/back_light_mode.png') : asset('images/back_dark_mode.png') }}"
            class="absolute left-1 md:left-0 h-[48px] w-[48px]  md:hover:scale-105 transition-all cursor-pointer"
            onclick="window.history.back()" alt="">

        <img wire:click="changeThemeMode" src="{{ asset('images/light_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} md:hover:scale-105 transition-all cursor-pointer">

        <img wire:click="changeThemeMode" src="{{ asset('images/dark_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? 'hidden' : '' }} md:hover:scale-105 transition-all cursor-pointer">

    </div>





    <main class="min-h-screen w-[96vw] md:max-w-[1200px] mx-auto">

        <div class="flex flex-col-reverse md:flex-row justify-center items-center gap-1 my-8">
            <h1 class="text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-white' }} text-[48px] font-semibold ">Contact Me</h1>
            {{-- <img src="{{ asset('images/contact-page-gif.gif') }}" class="h-[126px]" alt=""> --}}
            <img src="{{ $title_icon }}" class="h-[126px]" alt="">
        </div>


        <div class="w-full flex flex-col lg:flex-row justify-center items-center lg:items-start gap-10">
            <div class="flex flex-col justify-center gap-6 flex-1">
                <div class="flex flex-col md:flex-row gap-6 p-6 items-center {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-2xl shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                    <div class="flex shrink-0 p-2 gap-7 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff]' : 'bg-black' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]">
                        {{-- <img src="{{ asset('images/contact-email.gif') }}" class="h-[68px] w-[88px]" alt=""> --}}
                        <img src="{{ $email_icon }}" class="h-[68px] w-[88px]" alt="">
                    </div>
                    <div class="flex flex-col items-center md:items-start gap-2">
                        <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-white' }} text-[28px] font-bold ">Email</p>
                        <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-white' }}  md:text-[20px]">{{$email}}</p>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-6 p-6 items-center {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-2xl shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                    <div class="flex shrink-0 p-2 gap-7 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff]' : 'bg-black' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]">
                        {{-- <img src="{{ asset('images/contact-phone.gif') }}" class="h-[68px] w-[88px]" alt=""> --}}
                        <img src="{{ $phone_icon }}" class="h-[68px] w-[88px]" alt="">
                    </div>
                    <div class="flex flex-col items-center md:items-start gap-2">
                        <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-white' }} text-[28px] font-bold ">Phone</p>
                        <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-white' }} text-[20px]">{{$phone}}</p>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-6 p-6 items-center {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-2xl shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                    <div class="flex shrink-0 p-2 gap-7 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff]' : 'bg-black' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]">
                        {{-- <img src="{{ asset('images/contact-location.gif') }}" class="h-[68px] w-[88px]" alt=""> --}}
                        <img src="{{ $address_icon }}" class="h-[68px] w-[88px]" alt="">
                    </div>
                    <div class="flex flex-col items-center md:items-start gap-2">
                        <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-white' }} text-[28px] font-bold ">Address</p>
                        <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-white' }} text-[16px]">{{$address}}</p>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-6 p-6 items-center {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-2xl shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                    <div class="flex shrink-0 p-2 gap-7 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff]' : 'bg-black' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]">
                        {{-- <img src="{{ asset('images/contact-social.gif') }}" class="h-[68px] w-[88px]" alt=""> --}}
                        <img src="{{ $social_icon }}" class="h-[68px] w-[88px]" alt="">
                    </div>
                    <div class="flex flex-col">
                        <div class="flex gap-2">
                            <a href="{{ $facebook_link }}" target="_blank" class=" {{ $facebook_link  ? '' : 'hidden' }}"><img src="{{ asset('images/contact-facebook-logo.png') }}" class="h-[48px] hover:scale-110 transition-all {{ $facebook_link  ? '' : 'hidden' }}" alt="facebook"></a>
                            <a href="{{ $instagram_link }}" target="_blank" class="{{ $instagram_link  ? '' : 'hidden' }}"><img src="{{ asset('images/contact-instagram-logo.png') }}" class="h-[48px] hover:scale-110 transition-all {{ $instagram_link  ? '' : 'hidden' }}" alt="instagram"></a>
                            <a href="{{ $linkedin_link }}" target="_blank" class=" {{ $linkedin_link  ? '' : 'hidden' }}"><img src="{{ asset('images/contact-linkedin-logo.png') }}" class="h-[48px] hover:scale-110 transition-all {{ $linkedin_link  ? '' : 'hidden' }}" alt="linkedin"></a>
                            <a href="{{ $twitter_link }}" target="_blank" class=" {{ $twitter_link  ? '' : 'hidden' }}"><img src="{{ asset('images/contact-twitter-logo.png') }}" class="h-[48px] hover:scale-110 transition-all {{ $twitter_link  ? '' : 'hidden' }}" alt="twitter/x"></a>
                            <a href="{{ $github_link }}" target="_blank" class=" {{ $github_link  ? '' : 'hidden' }}"><img src="{{ asset('images/contact-github-logo.png') }}" class="h-[48px] hover:scale-110 transition-all {{ $github_link  ? '' : 'hidden' }}" alt="github"></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="flex flex-col flex-1">
                <div class="flex flex-row justify-center md:justify-start">
                    <p class=" text-[28px] font-bold  {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Message</p>
                </div>

                <div class="flex flex-col mt-2">

                    <label for="name"
                        class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Full
                        Name</label>

                    <input type="text" wire:model="user_name"
                        class="w-[96vw] md:max-w-[592px] py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                        id="name">

                </div>

                <div class="flex flex-col mt-2">

                    <label  for="age" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Contact Number</label>

                    <input wire:model="user_phone" type="number"  class="w-[96vw] md:max-w-[592px]  py-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2" id="phone">

                 </div>

                 <div class="flex flex-col mt-2">

                    <label for="email"
                        class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Email</label>

                    <input type="text" wire:model="user_email"
                        class="w-[96vw] md:max-w-[592px] py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                        id="email">

                </div>


                 <div class="flex flex-col mt-2">

                    <label for="need" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Describe Your Business Need</label>

                    <textarea wire:model="user_message" type="text" class="w-[96vw] md:max-w-[592px]  py-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2" id="need" rows="4" ></textarea>

                 </div>






                {{-- Book Appointment Button --}}
                <button wire:click="send_message"
                    class="mt-8 flex justify-center gap-2 px-8 py-4 w-[90vw] md:max-w-[300px] mx-auto rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all ">Send Message <img src="{{ asset('images/contact-send-icon.png') }}" class="h-[24px]" alt=""></button>
            </div>
        </div>

    </main>







    {{-- Footer Element --}}
    <div
        class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon'
            src="{{ session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png') }}"
            class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt="">

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">All
            Rights
            Reserved @2024</p>

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            @valueadderhabib</p>

    </div>


</div>
