<div id="main_div"
    class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ $theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}">

    <div class="h-[100vh] flex flex-col">

        <nav
            class="flex justify-between items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <div class=" flex justify-start md:w-[20vw] cursor-pointer">

                <img src="{{ asset('images/the_logo_light_mode.png') }}"
                    class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} cursor-pointer"
                    onclick="window.location.href='/'" alt="">

                <img src="{{ asset('images/the_logo_dark_mode.png') }}"
                    class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? 'hidden' : '' }} cursor-pointer"
                    onclick="window.location.href='/'" alt="">


            </div>

            <div id="input_div" class="relative">

                <img id="{{ session('theme_mode') == 'light' ? 'search_icon' : '' }}"
                    src="{{ asset('images/search_light_mode.gif') }}"
                    class="{{ session('theme_mode') == 'light' ? '' : 'hidden' }} absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1 {{ $search_input_field_is_active ? 'hidden' : '' }}"
                    alt="">

                <img id="{{ session('theme_mode') == 'light' ? '' : 'search_icon' }}"
                    src="{{ asset('images/search_dark_mode.gif') }}"
                    class="{{ session('theme_mode') == 'light' ? 'hidden' : '' }} absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1 {{ $search_input_field_is_active ? 'hidden' : '' }}"
                    alt="">

                {{-- <img id='search_icon' src="{{$theme_mode == 'light' ? asset('images/search_light_mode.gif') : asset('images/search_dark_mode.gif')}}" class="absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1 {{$search_input_field_is_active ? 'hidden' : ''}}" alt=""> --}}

                <span id='search_text'
                    class="absolute top-1/2 left-10 -translate-y-1/2 h-[80%] mt-1 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#EFF9FF]' }} {{ $search_input_field_is_active ? 'hidden' : '' }}">Search</span>

                <input wire:model.live='searchtext' id='search_input' type="text"
                    class="mr-2 h-[36px] w-[50vw] md:w-[30vw] rounded-lg {{ $theme_mode == 'light' ? 'bg-[#EFF9FF] text-[#070707]' : 'bg-[#070707] text-[#EFF9FF]' }}  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] px-4 focus: outline-none border-none ">



            </div>

            <div class=" flex justify-end md:w-[20vw]">

                <button
                    class="hidden md:block mr-2 px-8 py-2 rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='/consultation'">Consult Now</button>

            </div>



        </nav>


        @if ($notify_success)
            <div id="appointment_unfulfilled"
                class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
                <div class="flex flex-col justify-between items-center px-8">

                    <p class="text-white text-3xl font-semibold">Message</p>

                    {{-- <p class="text-white text-left">{{session('appointment_unfulfilled')}}</p> --}}
                    <p class="text-white text-center">{{ $notify_success }}</p>

                </div>

                {{-- <button onclick="document.getElementById('appointment_unfulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

                <button wire:click="clear_notify_success"
                    class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>



            </div>
        @endif


        @if ($notify_error)
            <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10"
                id="notify_error_element">
                <div class="flex flex-col justify-between items-center px-8">

                    <p class="text-white text-3xl font-semibold">Message</p>

                    {{-- <p class="text-white text-left">{{session('appointment_unfulfilled')}}</p> --}}
                    <p class="text-white text-center">{{ $notify_error }}</p>

                </div>

                {{-- <button onclick="document.getElementById('appointment_unfulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

                <button wire:click="clear_notify_error"
                    class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>



            </div>
        @endif


        {{-- Loading The Searched Data --}}
        <div class="mx-auto md:max-w-[1280px]">
            <p id="no_results_found" class="hidden"></p>
            @if ($search_output)
                @foreach ($search_output as $post)
                    @if ($theme_mode == 'light')
                        <p>{!! '<p style="color: #121212;text-transform: uppercase; font-weight: bold ; cursor:pointer;"
                                                                                                                                                                                                                                                                            onmouseover="this.style.textDecoration=`underline`;"
                                                                                                                                                                                                                                                                            onmouseout="this.style.textDecoration=`none`;"
                                                                                                                                                                                                                                                                            onclick="window.location.href=`' .
                            $post->blog_link .
                            '`" >' .
                            $post->blog_title .
                            '</p>' !!}</p>
                        <p>{!! '<p style="color: #121212; ; cursor:pointer"
                                                                                                                                                                                                                                                                            onclick="window.location.href=`' .
                            $post->blog_link .
                            '`" >' .
                            $post->blog_excerpt .
                            '</p>' !!}</p>
                        <hr>
                    @endif

                    @if ($theme_mode == 'dark')
                        <p>{!! '<p style="color: #e7e7e7;text-transform: uppercase; font-weight: bold ; cursor:pointer"
                                                                                                                                                                                                                                                                            onmouseover="this.style.textDecoration=`underline`;"
                                                                                                                                                                                                                                                                            onmouseout="this.style.textDecoration=`none`;"
                                                                                                                                                                                                                                                                            onclick="window.location.href=`' .
                            $post->blog_link .
                            '`" >' .
                            $post->blog_title .
                            '</p>' !!}</p>
                        <p>{!! '<p style="color: #ededed; ; cursor:pointer"
                                                                                                                                                                                                                                                                            onclick="window.location.href=`' .
                            $post->blog_link .
                            '`" >' .
                            $post->blog_excerpt .
                            '</p>' !!}</p>
                        <hr>
                    @endif
                @endforeach
            @endif
        </div>




        {{-- <div wire:click="changeThemeMode" class="flex justify-center">

                    <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? '' : 'hidden'}}">

                    <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? 'hidden' : ''}}">

                </div> --}}


        {{-- Loaders --}}
        <!-- Show a loading spinner while Doing Theme Change Processing -->
        <div wire:loading wire:target="changeThemeMode"
            class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

            <div class="flex flex-row justify-center items-center px-2 gap-2">
                <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
            </div>


        </div>
        {{-- End Loaders --}}




        <div wire:click="changeThemeMode"
            class="flex justify-center w-fit mx-auto mt-6 md:hover:scale-105 transition-all cursor-pointer">

            <img src="{{ asset('images/light_mode_toggler.png') }}"
                class="h-[44px] {{ $theme_mode == 'light' ? '' : 'hidden' }}">

            <img src="{{ asset('images/dark_mode_toggler.png') }}"
                class="h-[44px] {{ $theme_mode == 'light' ? 'hidden' : '' }}">

        </div>



        <div class="flex justify-center mt-6 md:hidden hidden">

            <button
                class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                onclick="window.location.href='/consultation'">Consult Now</button>

        </div>


        <div class="flex flex-col max-w-[1280px] justify-center items-center mx-auto grow mt-2 md:mt-0">

            <div
                class="{{ $theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }} gap-4 md:gap-16 flex flex-col-reverse md:flex-row max-w-[1280px] mx-auto justify-center items-center ">

                <div class=" md:mt-[-5vh]">

                    <p id="my_name"
                        class="font-poppins text-lg text-center md:text-left  md:text-xl mb-2 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}  "
                        style="opacity: 0">{{$top_layer_text}}</p>
                    {{-- <p id="my_name"
                        class="font-poppins text-lg text-center md:text-left  md:text-xl mb-2 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}  "
                        style="opacity: 0">Hello, I'm Habib,</p> --}}

                    <h2 id="full_stack"
                        class="font-poppins text-center md:text-left text-6xl {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}    "
                        style="opacity: 0">{{$up_middle_layer_text}}</h2>
                    {{-- <h2 id="full_stack"
                        class="font-poppins text-center md:text-left text-6xl {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}    "
                        style="opacity: 0">Full Stack</h2> --}}

                    <h2 id="developer"
                        class="font-poppins text-6xl text-center md:text-left  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}    "
                        style="opacity: 0">{{$down_middle_layer_text}}</h2>


                    {{-- <h2 id="developer"
                        class="font-poppins text-6xl text-center md:text-left  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}    "
                        style="opacity: 0">Developer</h2> --}}

                    <p id="based_in"
                        class="font-poppins text-center md:text-left  text-lg md:text-xl mt-2 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}    "
                        style="opacity: 0">{{$end_layer_text}}</p>

                    {{-- <p id="based_in"
                        class="font-poppins text-center md:text-left  text-lg md:text-xl mt-2 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}    "
                        style="opacity: 0">based in Dhaka, Bangladesh.</p> --}}

                </div>


                <div class="">
                    <img id="profile_img" src="{{ $hero_avatar_image }}"
                        class=" w-[30vh] md:w-[40vh]   " style="opacity: 0" alt="">
                </div>
                {{-- <div class="">
                    <img id="profile_img" src="{{ asset('images/whole_profile_new.png') }}"
                        class=" w-[30vh] md:w-[40vh]   " style="opacity: 0" alt="">
                </div> --}}

            </div>

            <div class="mt-[4vh] md:mt-[10vh] animate-fadeIn5">
                <img id="scroll_down" src="{{ asset('images/scroll-down.png') }}" class="w-[60px] animate-bounce   "
                    style="opacity: 0" alt="Scroll Down">
            </div>




        </div>

    </div>


    {{-- Explore Section Start --}}

    <div class="flex flex-col justify-center mt-[10vh]  md:max-w-[1280px]  mx-auto">

        <h1
            class="text-3xl text-center font-semibold  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            The Categories</h1>

        <p class="text-[16px] md:max-w-[80%] block mx-auto mt-2 text-center px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            {{$categories_caption}}</p>

    </div>

    <div class="flex flex-col md:flex-row flex-wrap justify-center items-center my-6 gap-6 md:max-w-[1280px] mx-auto">
        @foreach ($options_array as $option)
            <div
                class="flex flex-col justify-center w-[96vw] md:max-w-[30%]  h-full md:min-h-[247px] md:hover:scale-105 transition-all  {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


                <div
                    class="{{ $theme_mode == 'light' ? 'bg-[#4189d1]' : '' }}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                    <img src="{{ $option['image_link'] }}"
                        class=" h-[70px] w-[70px] rounded-lg    {{ $theme_mode == 'light' ? 'opacity-90' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
                        alt="">
                </div>

                <h1
                    class="text-2xl font-semibold mt-1 text-center px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} line-clamp-2">
                    {{ $option['option'] }}</h1>


                <div class="mt-4 flex flex-row justify-center items-center mb-6">
                    <button
                        class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                        onclick="window.location.href='{{ env('BASE_LINK') }}/categories/{{ str_replace(' ', '-', $option['option']) }}?id={{ $option['id'] }}'"><a
                            href="{{ env('BASE_LINK') }}/categories/{{ str_replace(' ', '-', $option['option']) }}?id={{ $option['id'] }}">Select</a></button>

                </div>

            </div>
        @endforeach

    </div>

    {{-- Explore Section End --}}




    <div class="flex flex-col justify-center mt-[10vh]  md:max-w-[1280px]  mx-auto">

        <h1
            class="text-3xl text-center font-semibold  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            The Services</h1>

        <p class="text-[16px] mt-2 md:max-w-[80%] block mx-auto text-center px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            {{ $services_caption }}</p>

        {{-- <p
            class="text-lg font-medium text-center mt-8 px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            Click on 'Select' to get the estimated fee and book an appointment. If you want to know more, click on the
            'Details' button</p> --}}

    </div>



    {{-- Service Cards --}}
    <div class="flex flex-col md:flex-row flex-wrap justify-center items-center my-6 gap-6 md:max-w-[1280px] mx-auto">


        {{-- Full Project --}}
        <div
            class="flex flex-col w-[96vw] md:max-w-[30%] h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <div class="{{ $theme_mode == 'light' ? 'bg-[#4189d1]' : '' }}  mt-6 rounded-lg border-1  bg-[#EFF9FF]">
                <img src="{{ asset('images/full-project.gif') }}"
                    class=" h-[70px] w-[70px] rounded-lg    {{ $theme_mode == 'light' ? 'opacity-90' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
                    alt="">
            </div>

            <h1
                class="text-2xl font-semibold mt-1 text-center px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Full Project</h1>

            <p
                class="text-center mt-2 text-lg font-normal px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Full Project encompasses Figma design, frontend, and backend for complete digital solutions.</p>

            <div class="mt-4 flex flex-row gap-4 mb-6">
                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/services/full-project'"><a
                        href="{{ env('BASE_LINK') }}/services/full-project">Select</a></button>

                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/details/full-project'"><a
                        href="{{ env('BASE_LINK') }}/details/full-project">Details</a></button>
            </div>

        </div>




        {{-- Front End --}}
        <div
            class="flex flex-col w-[96vw] md:max-w-[30%]  h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <div class="{{ $theme_mode == 'light' ? 'bg-[#4189d1]' : '' }}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{ asset('images/front-end.gif') }}"
                    class=" h-[70px] w-[70px] rounded-lg    {{ $theme_mode == 'light' ? 'opacity-90' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
                    alt="">
            </div>

            <h1
                class="text-2xl font-semibold mt-1 text-center px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Front End</h1>

            <p
                class="text-center mt-2 text-lg font-normal px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Frontend focuses on crafting responsive, interactive user interfaces for seamless digital experiences.
            </p>

            <div class="mt-4 flex flex-row gap-4 mb-6">
                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/services/front-end'"><a
                        href="{{ env('BASE_LINK') }}/services/front-end">Select</a></button>

                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/details/front-end'"><a
                        href="{{ env('BASE_LINK') }}/details/front-end">Details</a></button>
            </div>

        </div>




        {{-- Backend --}}
        <div
            class="flex flex-col w-[96vw] md:max-w-[30%]  h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


            <div class="{{ $theme_mode == 'light' ? 'bg-[#4189d1]' : '' }}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{ asset('images/back-end.gif') }}"
                    class=" h-[70px] w-[70px] rounded-lg    {{ $theme_mode == 'light' ? 'opacity-90' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
                    alt="">
            </div>

            <h1
                class="text-2xl font-semibold mt-1 text-center px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Back End</h1>

            <p
                class="text-center mt-2 text-lg font-normal px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Backend Development powers server-side logic, database management, and seamless API integration for
                robust digital solutions.</p>

            <div class="mt-4 flex flex-row gap-4 mb-6">
                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/services/back-end'"><a
                        href="{{ env('BASE_LINK') }}/services/back-end">Select</a></button>

                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/details/back-end'"><a
                        href="{{ env('BASE_LINK') }}/details/back-end">Details</a></button>
            </div>

        </div>




        {{-- Figma Design --}}
        <div
            class="flex flex-col w-[96vw] md:max-w-[30%]  h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


            <div class="{{ $theme_mode == 'light' ? 'bg-[#4189d1]' : '' }}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{ asset('images/uiux-design.gif') }}"
                    class=" h-[70px] w-[70px] rounded-lg    {{ $theme_mode == 'light' ? 'opacity-90' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
                    alt="">
            </div>

            <h1
                class="text-2xl font-semibold mt-1 text-center px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Figma Design</h1>

            <p
                class="text-center mt-2 text-lg font-normal px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Figma Design crafts intuitive, stunning, user-centered interfaces, serving as blueprints for seamless
                experiences.</p>

            <div class="mt-4 flex flex-row gap-4 mb-6">
                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/services/figma-design'"><a
                        href="{{ env('BASE_LINK') }}/services/figma-design">Select</a></button>

                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/details/figma-design'"><a
                        href="{{ env('BASE_LINK') }}/details/figma-design">Details</a></button>
            </div>

        </div>



        {{-- WordPress --}}
        <div
            class="flex flex-col w-[96vw]  md:max-w-[30%] h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


            <div class="{{ $theme_mode == 'light' ? 'bg-[#4189d1]' : '' }}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{ asset('images/wordpress.gif') }}"
                    class=" h-[70px] w-[70px] rounded-lg    {{ $theme_mode == 'light' ? 'opacity-90' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
                    alt="">
            </div>

            <h1
                class="text-2xl font-semibold mt-1 text-center px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                WordPress</h1>

            <p
                class="text-center mt-2 text-lg font-normal px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Crafting tailored WordPress solutions, from design to seamless launch, for a powerful online presence.
            </p>

            <div class="mt-4 flex flex-row gap-4 mb-6">
                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/services/wordpress'"><a
                        href="{{ env('BASE_LINK') }}/services/wordpress">Select</a></button>

                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/details/wordpress'"><a
                        href="{{ env('BASE_LINK') }}/details/wordpress">Details</a></button>
            </div>

        </div>



        {{-- Error Fixing --}}
        <div
            class="flex flex-col w-[96vw] md:max-w-[30%]  h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


            <div
                class="{{ $theme_mode == 'light' ? 'bg-[#4189d1]' : '' }}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{ asset('images/error-fixes.gif') }}"
                    class=" h-[70px] w-[70px] rounded-lg    {{ $theme_mode == 'light' ? 'opacity-90' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
                    alt="">
            </div>

            <h1
                class="text-2xl font-semibold mt-1 text-center px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Error Fixing</h1>

            <p
                class="text-center mt-2 text-lg font-normal px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Error fixing identifies and resolves issues in code, ensuring optimal performance, stability, and
                reliable functionality.</p>

            <div class="mt-4 flex flex-row gap-4 mb-6">
                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/services/error-fixing'"><a
                        href="{{ env('BASE_LINK') }}/services/error-fixing">Select</a></button>

                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/details/error-fixing'"><a
                        href="{{ env('BASE_LINK') }}/details/error-fixing">Details</a></button>
            </div>

        </div>



        {{-- Test --}}
        <div
            class="flex flex-col w-[96vw] md:max-w-[30%]  h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


            <div
                class="{{ $theme_mode == 'light' ? 'bg-[#4189d1]' : '' }}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{ asset('images/error-fixes.gif') }}"
                    class=" h-[70px] w-[70px] rounded-lg    {{ $theme_mode == 'light' ? 'opacity-90' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
                    alt="">
            </div>

            <h1
                class="text-2xl font-semibold mt-1 text-center px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Test</h1>

            <p
                class="text-center mt-2 text-lg font-normal px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Error fixing identifies and resolves issues in code, ensuring optimal performance, stability, and
                reliable functionality.</p>

            <div class="mt-4 flex flex-row gap-4 mb-6">
                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/services/test'"><a
                        href="{{ env('BASE_LINK') }}/services/test">Select</a></button>

                <button
                    class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/details/error-fixing'"><a
                        href="{{ env('BASE_LINK') }}/details/error-fixing">Details</a></button>
            </div>

        </div>


        @foreach ($estimation_options as $item)
            <div
                class="flex flex-col w-[96vw] md:max-w-[30%] [&_p]:line-clamp-3 px-4  h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


                <div
                    class="{{ $theme_mode == 'light' ? 'bg-[#4189d1]' : '' }}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                    <img src="{{ $item->icon_link }}"
                        class=" h-[70px] w-[70px] rounded-lg    {{ $theme_mode == 'light' ? 'opacity-90' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
                        alt="">
                </div>

                <h1
                    class="text-2xl font-semibold mt-1 text-center px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} ">
                    {{ $item->title }}</h1>

                <div
                    class="text-center mt-2 text-lg font-normal px-4 line-clamp-3  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} [&_p]:text-md [&_h3]:text-lg [&_h2]:text-2xl [&_h1]:text-3xl">
                    {!! $item->description !!}</div>

                <div class="flex flex-row gap-4 mb-6 mt-auto">
                    <button
                        class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                        onclick="window.location.href='{{ env('BASE_LINK') }}/services/{{ str_replace(' ', '-', $item->title) }}?id={{ $item->id }}'"><a
                            href="{{ env('BASE_LINK') }}/services/{{ str_replace(' ', '-', $item->title) }}?id={{ $item->id }}">Select</a></button>

                    <button
                        class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                        onclick="window.location.href='{{ $item->blog_link }}"><a
                            href="{{ Str::start($item->blog_link, 'http://') }}" target="_blank"
                            rel="noopener noreferrer">Details</a></button>
                </div>

            </div>
        @endforeach




    </div>



    {{-- Consult Now Button --}}
    <button
        class="mt-4 px-8 py-2 w-[90vw] md:max-w-[300px] mx-auto rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all "
        onclick="window.location.href='/consultation'"><a href="{{ env('BASE_LINK') }}/consultation">Consult
            Now</a></button>



    {{-- Portfolio Showcase Section --}}

    <div class="flex flex-col justify-center items-center mx-auto mt-[10vh] md:max-w-[1280px] mb-8">

        <img src="{{ $theme_mode == 'light' ? asset('images/portfolio-light-mode.png') : asset('images/portfolio-dark-mode.png') }}"
            class="max-h-[100px]" alt="">

            <p class="text-[16px] mt-2 md:max-w-[80%] block mx-auto text-center px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                {{ $my_portfolio_caption }}</p>

    </div>

    @foreach ($portfolios_array as $index => $item)
        @if ($index % 2 == 0)
            <div class="flex w-full {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} py-8  h-fit md:h-[600px]"
                style="box-shadow: 0px 4px 3px rgba(0, 0, 0, 0.2), inset 0px 4px 3px rgba(0, 0, 0, 0.2);">
            @else
                <div class="flex w-full py-8  h-fit md:h-[600px]"
                    style="{{ $index === count($portfolios_array) - 1 ? 'box-shadow: 0px 4px 3px rgba(0, 0, 0, 0.2)' : '' }} ">
        @endif



        <div
            class="max-w-[1280px] gap-[4%] md:gap-[10%] mx-auto flex flex-col {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} justify-center items-center h-full">

            <div class="flex justify-center w-[96%] mx-auto md:mt-0 md:mx-0 md:w-[45%] items-center h-fit md:h-full ">

                <img src="{{ $item['portfolio_image_link'] }}" class="max-h-[400px] rounded-lg"
                    alt="{{ $item['portfolio_title'] }}">

            </div>

            <div
                class="flex flex-col justify-center w-[96%] mx-auto md:mt-0 md:mx-0 md:w-[45%] items-center h-fit md:h-full ">
                <h2
                    class="text-center md:text-left text-2xl font-medium w-full my-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                    {{ $item['portfolio_title'] }}
                </h2>

                <div class=" w-full {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                    {!! $item['portfolio_description'] !!}</div>

                <div class="flex gap-4 justify-center md:justify-start w-full my-4">
                    <a href="{{ $item['portfolio_site_link'] }}" target="_blank"><button
                            class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all ">Demo</button></a>

                    <a href="{{ $item['portfolio_github_link'] }}" target="_blank"><button
                            class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all ">Source
                            Code</button></a>
                </div>

                <h2
                    class="text-center md:text-left  w-full {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                    <span class="text-lg font-medium ">Technologies Used:</span> {{ $item['technologies_used'] }}
                </h2>

            </div>

        </div>






</div>
@endforeach

{{-- End Portfolio Showcase Section --}}

{{-- Consult Now Button --}}
<button
    class="mt-[10vh] px-8 py-2 w-[90vw] md:max-w-[300px] mx-auto rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all "
    onclick="window.location.href='/consultation'"><a href="{{ env('BASE_LINK') }}/consultation">Consult
        Now</a></button>





{{-- Admin Login Popup --}}

<div class="{{ $admin_login_popup_is_active ? 'flex flex-col' : 'hidden' }} fixed justify-center items-center top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} px-4 py-8 mx-auto w-[96vw] max-w-[800px] rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
    id="admin_login_popup">


    <p class="absolute top-4 right-4 cursor-pointer text-4xl hover:scale-110 transition-all" id="admin_popup_close"
        wire:click="adminLoginPopup">&times;
    </p>

    <h2 class="text-2xl md:text-4xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
        Admin Login</h2>

    <form wire:submit.prevent="login">

        <div class="flex flex-col justify-center items-center my-4">





            <div class="flex flex-col mt-2 max-w-[680px]">

                <label for="title"
                    class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">User
                    Name</label>

                <input type="text" wire:model.defer="admin_name" placeholder="Admin Name"
                    class="w-[92vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                    id="admin_name">

            </div>


        </div>

        <div class="flex flex-col max-w-[680px]">

            <label for="title"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Password</label>

            <input type="text" wire:model.defer="admin_password" placeholder="Password"
                class="w-[92vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="admin_password">

        </div>

        <p class="text-lg text-red-800 mt-4" id="admin_login_error"></p>


        {{-- End Created Items Section --}}
        <div class="flex justify-center">
            <button type="submit"
                class=" h-[64px] w-[240px] text-2xl rounded-lg bg-[#1A579F] mt-8 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Log
                In</button>
        </div>


    </form>

</div>

{{-- End Admin Login Popup --}}








{{-- Footer Element --}}
<div
    class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">



    <div
        class="flex flex-col md:flex-row justify-center md:justify-between items-center w-[96vw] md:max-w-[700px] mb-4">

        <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all">
            <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hover:underline"
                onclick="window.location.href='{{ env('BASE_LINK') }}/blog_showcase'">Blogs</p><img
                src="{{ session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png') }}"
                class="h-[12px] w-[12px]" alt="">
        </div>
        <p
            class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hidden md:block opacity-50">
            |</p>

        @if ($admin_active)
            <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all">
                <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hover:underline"
                    onclick="window.location.href='{{ env('BASE_LINK') }}/admin_dashboard'">Admin Dashboard</p><img
                    src="{{ session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png') }}"
                    class="h-[12px] w-[12px]" alt="">
            </div>
        @endif

        @if (!$admin_active)
            <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all">
                <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hover:underline"
                    wire:click="adminLoginPopup">Admin Dashboard</p><img
                    src="{{ session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png') }}"
                    class="h-[12px] w-[12px]" alt="">
            </div>
        @endif

        <p
            class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}  hidden md:block opacity-50">
            |</p>

        <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all">
            <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hover:underline"
                onclick="window.location.href='{{ env('BASE_LINK') }}/privacy_policy'">Privacy Policy</p><img
                src="{{ session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png') }}"
                class="h-[12px] w-[12px]" alt="">
        </div>
        <p
            class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}  hidden md:block opacity-50">
            |</p>

        <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all">
            <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hover:underline"
                onclick="window.location.href='{{ env('BASE_LINK') }}/about'">About Me</p><img
                src="{{ session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png') }}"
                class="h-[12px] w-[12px]" alt="">
        </div>

        <p
        class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}  hidden md:block opacity-50">
        |</p>

        <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all">
            <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hover:underline"
                onclick="window.location.href='{{ env('BASE_LINK') }}/contact'">Contact Me</p><img
                src="{{ session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png') }}"
                class="h-[12px] w-[12px]" alt="">
        </div>


    </div>


    <img id='footer_icon'
        src="{{ $theme_mode == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png') }}"
        class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt="">

    <p class=" text-center {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">All Rights
        Reserved @2024</p>

    <p class=" text-center {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">@valueadderhabib
    </p>


</div>








{{-- JavaScript --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<script>
    const profile_img = document.getElementById("profile_img");
    const my_name_text = document.getElementById("my_name");
    const full_stack = document.getElementById("full_stack");
    const developer = document.getElementById("developer");
    const based_in = document.getElementById("based_in");
    const scroll_down = document.getElementById("scroll_down");

    const animation_function = () => {

        //Doing 100ms delay cause the DOM is not loaded yet.
        setTimeout(() => {
            // const profile_img = document.getElementById("profile_img");
            // const my_name_text = document.getElementById("my_name");
            // const full_stack = document.getElementById("full_stack");
            // const developer = document.getElementById("developer");
            // const based_in = document.getElementById("based_in");
            // const scroll_down = document.getElementById("scroll_down");

            profile_img.style.opacity = 0;
            profile_img.style.transform = "translateY(16px)";

            my_name_text.style.opacity = 0;
            my_name_text.style.transform = "translateY(16px)";

            full_stack.style.opacity = 0;
            full_stack.style.transform = "translateY(16px)";

            developer.style.opacity = 0;
            developer.style.transform = "translateY(16px)";

            based_in.style.opacity = 0;
            based_in.style.transform = "translateY(16px)";

            scroll_down.style.opacity = 0;
            scroll_down.style.transform = "translateY(16px)";


            const timeline = gsap.timeline();

            // Add animations to the timeline in sequence
            timeline
                .to(my_name_text, {
                    opacity: 1,
                    duration: 1,
                    transform: "translateY(0)",
                    ease: "power2.out",
                })
                .to(full_stack, {
                    opacity: 1,
                    duration: 1,
                    transform: "translateY(0)",
                    ease: "power2.out",
                })
                .to(developer, {
                    opacity: 1,
                    duration: 1,
                    transform: "translateY(0)",
                    ease: "power2.out",
                })
                .to(based_in, {
                    opacity: 1,
                    duration: 1,
                    transform: "translateY(0)",
                    ease: "power2.out",
                })
                .to(profile_img, {
                    opacity: 1,
                    duration: 1,
                    transform: "translateY(0)",
                    ease: "power2.out",
                })
                .to(scroll_down, {
                    opacity: 1,
                    duration: 1,
                    transform: "translateY(0)",
                    ease: "power2.out",
                })

        }, 1);

    }




    const css_stablizer = () => {
        //Doing 100ms delay cause the DOM is not loaded yet.
        setTimeout(() => {
            // const profile_img = document.getElementById("profile_img");
            // const my_name_text = document.getElementById("my_name");
            // const full_stack = document.getElementById("full_stack");
            // const developer = document.getElementById("developer");
            // const based_in = document.getElementById("based_in");
            // const scroll_down = document.getElementById("scroll_down");

            profile_img.style.opacity = 1;
            profile_img.style.transform = "translateY(0)";

            my_name_text.style.opacity = 1;
            my_name_text.style.transform = "translateY(0)";

            full_stack.style.opacity = 1;
            full_stack.style.transform = "translateY(0)";

            developer.style.opacity = 1;
            developer.style.transform = "translateY(0)";

            based_in.style.opacity = 1;
            based_in.style.transform = "translateY(0)";

            scroll_down.style.opacity = 1;
            scroll_down.style.transform = "translateY(0)";


        }, 1);

    }

    //    function changeThemeMode(){

    //         Livewire.dispatch('theme-change', { })

    //         window.location.reload();

    //     }


    document.getElementById('input_div').addEventListener('click', () => {
        document.getElementById('search_input').focus();
    })

    document.getElementById('search_input').addEventListener('focus', () => {

        document.getElementById('search_icon').style.display = 'none';
        document.getElementById('search_text').style.display = 'none';

    })




    document.getElementById('search_input').addEventListener('blur', () => {

        if (document.getElementById('search_input').value == '') {
            document.getElementById('search_icon').style.display = 'block';
            document.getElementById('search_text').style.display = 'block';
        }

    })


    // Without this , the search bar shows the text previously entered when I come back using the back button even though the actual value of the input field is empty
    window.addEventListener('load', () => {


        setTimeout(() => {
            document.getElementById('search_input').value = '';
        }, 100);


    });


    let item = "";


    document.addEventListener('livewire:initialized', () => {

        // Sending Data To backend
        //  setTimeout(() => {

        if (document.getElementById('search_input').value == '') {


            Livewire.dispatch('new_load_alert_for_serch_strings', {});



        }


        // }, 10);


        Livewire.on('alert-manager', () => {


            if (document.getElementById('search_input').value !== '' || document.activeElement ===
                document.getElementById('search_input')) {

                // Doing 100ms delay cause the DOM is not loaded yet.
                setTimeout(() => {
                    document.getElementById('search_icon').style.display = 'none';
                    document.getElementById('search_text').style.display = 'none';
                }, 10);

            }

            css_stablizer();



        })

        Livewire.on('no_results_found', () => {

            // Doing 100ms delay cause the DOM is not loaded yet.
            setTimeout(() => {
                document.getElementById('no_results_found').textContent = 'No Results Found';

                if (document.getElementById('no_results_found').classList.contains('hidden')) {
                    document.getElementById('no_results_found').classList.remove('hidden');
                }
            }, 10);


        })




        Livewire.on('load_animation', () => { // Doing this to avoid the rerendering issue in javascript

            animation_function();


        })




        document.addEventListener('click', function(event) {
            const admin_login_popup = document.getElementById('admin_login_popup');

            const notify_error_element = document.getElementById('notify_error_element') || null;

            const isClickInside = admin_login_popup.contains(event.target);

            const isClickInside_notify_error_element = notify_error_element?.contains(event.target);

            // If the click is outside the dropdown, perform an action
            if (!isClickInside && !isClickInside_notify_error_element) {

                if (!document.getElementById('admin_login_popup').classList.contains('hidden')) {

                    document.getElementById('admin_popup_close').click();

                }



            }

        });


    })
</script>


</div>
