<div id="main_div"
    class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ $theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}">

    <div class="sticky top-0  {{ $theme_mode == 'light' ? 'bg-[#eff9ff]' : 'bg-[#090909]' }} z-40">
        <nav
            class="flex justify-between items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <div class=" flex justify-start md:w-[20vw] cursor-pointer">

                <img src="{{ $site_logo_light }}"
                    class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} cursor-pointer"
                    onclick="window.location.href='/'" alt="" cursor-data-color="#1A579F">

                <img src="{{ $site_logo_dark }}"
                    class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? 'hidden' : '' }} cursor-pointer"
                    onclick="window.location.href='/'" alt="" cursor-data-color="#1A579F">

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
                    class="mr-2 h-[36px] w-[50vw] lg:w-[30vw] rounded-lg {{ $theme_mode == 'light' ? 'bg-[#EFF9FF] text-[#070707]' : 'bg-[#070707] text-[#EFF9FF]' }}  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] px-4 focus: outline-none border-none ">

            </div>

            <div class=" flex justify-end lg:w-[20vw]">

                <button
                    class="hidden lg:block mr-2 px-8 py-2 rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                    onclick="window.location.href='/contact'"><a href="{{ env('BASE_LINK') }}/contact"
                        cursor-data-color="#1A579F">Contact
                        Me</a></button>

            </div>

        </nav>










        {{-- Loading The Searched Data --}}
        <div
            class="relative mx-auto md:max-w-[1280px] mt-2 px-2 [&_p]:cursor-pointer [&_span]:!bg-transparent [&_p]:!bg-transparent {{ $theme_mode == 'light' ? ' [&_span]:!text-black [&_p]:!text-black' : ' [&_span]:!text-white [&_p]:!text-white' }} max-h-[50vh] overflow-scroll md:overflow-auto shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
            <p id="no_results_found"
                class="hidden {{ $theme_mode == 'light' ? 'text-[#121212] [&_span]:!text-black' : 'text-[#e7e7e7] [&_span]:!text-white' }}">
            </p>

            @if ($search_output)
              <div class="absolute top-2 right-2 cursor-pointer text-4xl bg-[#1A579F] text-white rounded-full px-2 {{ $no_search_results_found_show ? 'hidden' : '' }}" wire:click="searchOutputClose">&times;</div>
                @foreach ($search_output as $post)
                    @if ($theme_mode == 'light')
                        <a href="{{ $post->item_link }}" target="_blank">
                            <div class="flex flex-col md:flex-row justify-start items-start md:items-center gap-4 my-4">
                                <img src="{{ $post->item_image ?? '' }}" class="max-w-[100px] max-h-[100px] rounded-lg"
                                    alt="">
                                <div class="flex flex-col">
                                    <p>{!! '<p style="color: #121212;text-transform: uppercase; font-weight: bold ; cursor:pointer;" >' .
                                        $post->item_title .
                                        '</p>' !!}</p>
                                    <p>{!! '<p style="color: #121212; cursor:pointer">' . $post->item_excerpt . '</p>' !!}</p>
                                </div>
                            </div>
                            <hr
                                class="w-full {{ session('theme_mode') == 'light' ? 'border-gray-300' : 'border-white' }}">
                        </a>
                    @endif

                    @if ($theme_mode == 'dark')
                        <a href="{{ $post->item_link }}" target="_blank">
                            <div class="flex flex-col md:flex-row justify-start items-start md:items-center gap-4 my-4">
                                <img src="{{ $post->item_image ?? '' }}" class="max-w-[100px] max-h-[100px] rounded-lg"
                                    alt="">
                                <div class="flex flex-col">
                                    <p>{!! '<p style="color: #e7e7e7;text-transform: uppercase; font-weight: bold ; cursor:pointer" >' .
                                        $post->item_title .
                                        '</p>' !!}</p>
                                    <p>{!! '<p style="color: #ededed; ; cursor:pointer">' . $post->item_excerpt . '</p>' !!}</p>
                                </div>
                            </div>
                            <hr
                                class="w-full {{ session('theme_mode') == 'light' ? 'border-gray-300' : 'border-white' }}">
                        </a>
                    @endif
                @endforeach
            @endif
            @if ($no_search_results_found_show)
            <div class="absolute top-2 right-2 cursor-pointer text-4xl bg-[#1A579F] text-white rounded-full px-2 {{ $no_search_results_found_show ? '' : 'hidden' }}" wire:click="searchOutputClose">&times;</div>
                <p class="text-center text-lg font-semibold h-16 flex justify-center items-center">No results found</p>
            @endif
        </div>
    </div>



    @if ($notify_success)
        <div id="appointment_unfulfilled"
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-50">
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
        <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-50"
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

    {{-- <div wire:click="changeThemeMode" class="flex justify-center">

                    <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? '' : 'hidden'}}">

                    <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? 'hidden' : ''}}">

                </div> --}}


    {{-- Loaders --}}

    <!-- Show a loading spinner while Doing Theme Change Processing -->
    <div wire:loading wire:target="changeThemeMode"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-50">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
        </div>


    </div>


    <div wire:loading wire:target="login"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-50">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Credentials...</span>
        </div>

    </div>



    <div wire:loading wire:target="searchOutputClose"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-50">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Closing Search Results...</span>
        </div>

    </div>


    <div wire:loading wire:target="consultationStripeRedirect"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-50">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Payment...</span>
        </div>

    </div>


    {{-- End Loaders --}}



    <div class="h-[100vh] flex flex-col">
        <div wire:click="changeThemeMode"
            class="flex justify-center w-fit mx-auto mt-6 md:hover:scale-105 transition-all cursor-pointer">

            <img src="{{ asset('images/light_mode_toggler.png') }}"
                class="h-[44px] {{ $theme_mode == 'light' ? '' : 'hidden' }}" cursor-data-color="#1A579F">

            <img src="{{ asset('images/dark_mode_toggler.png') }}"
                class="h-[44px] {{ $theme_mode == 'light' ? 'hidden' : '' }}" cursor-data-color="#1A579F">

        </div>


        {{-- Hero Section --}}

        <div class="flex flex-col max-w-[1280px] justify-center items-center mx-auto grow mt-2 md:mt-0">

            <div
                class="{{ $theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }} gap-4 md:gap-16 flex flex-col-reverse md:flex-row max-w-[1280px] mx-auto justify-center items-center ">

                <div class=" md:mt-[-5vh]">

                    <p id="my_name"
                        class="font-poppins text-lg text-center md:text-left  md:text-xl mb-2 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}  "
                        style="opacity: 0">{{ $top_layer_text }}</p>
                    {{-- <p id="my_name"
                        class="font-poppins text-lg text-center md:text-left  md:text-xl mb-2 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}  "
                        style="opacity: 0">Hello, I'm Habib,</p> --}}

                    <h2 id="full_stack"
                        class="font-poppins text-center md:text-left text-6xl {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}    "
                        style="opacity: 0">{{ $up_middle_layer_text }}</h2>

                    <h2 id="developer"
                        class="font-poppins text-6xl text-center md:text-left  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}    "
                        style="opacity: 0">{{ $down_middle_layer_text }}</h2>

                    <p id="based_in"
                        class="font-poppins text-center md:text-left  text-lg md:text-xl mt-2 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}    "
                        style="opacity: 0">{{ $end_layer_text }}</p>

                </div>


                <div class="-mt-[5vh] md:mt-0">
                    <img id="profile_img" src="{{ $hero_avatar_image }}" class=" w-[30vh] md:w-[40vh]   "
                        alt="">
                    {{-- <img id="profile_img" src="{{ $hero_avatar_image }}" class=" w-[30vh] md:w-[40vh]   "
                        style="opacity: 0" alt=""> --}}
                </div>

            </div>

            <div class="mt-[4vh] md:mt-[10vh] animate-fadeIn5">
                <img id="scroll_down" src="{{ asset('images/scroll-down.png') }}" class="w-[60px] animate-bounce   "
                    style="opacity: 0" alt="Scroll Down">
            </div>

        </div>

    </div>











    {{-- Skills Section Start --}}
    <div class="flex flex-col justify-center mt-[10vh]  md:max-w-[1280px]  mx-auto">

        <h2 class="text-3xl text-center font-semibold  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}"
            data-aos="fade-up">
            My Skills</h2>

        <h1 class="text-[16px] md:max-w-[765px] block mx-auto mt-2 text-center px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}"
            data-aos="fade-up">
            {{ $skills_caption }}
    </h1>

        <div class="flex justify-center items-center gap-6 my-6 flex-wrap px-2">

            @foreach ($skills_section_items_array as $item)
                <div class="flex justify-start p-2 gap-2 items-center w-full max-w-[324px] shrink-0 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}"
                    data-aos="fade-up">

                    <div
                        class="h-[60px] w-[60px] rounded-lg flex justify-center items-center shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] {{ $theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}">
                        <img src="{{ $item['skill_icon'] }}" class="max-w-[50px] max-h-[50px]" alt="">
                    </div>

                    <h2
                        class="text-2xl font-semibold {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                        {{ $item['skill_title'] }}</h2>
                </div>
            @endforeach

        </div>
    </div>
    {{-- Skills Section End --}}
















    {{-- Service Cards --}}
    <div class="flex flex-col justify-center mt-[10vh]  md:max-w-[1280px]  mx-auto">

        <h2 class="text-3xl text-center font-semibold  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}"
            data-aos="fade-up">
            The Services</h2>

        <p class="text-[16px] mt-2 md:max-w-[80%] block mx-auto text-center px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}"
            data-aos="fade-up">
            {{ $services_caption }}</p>

    </div>

    <div
        class="flex flex-col md:flex-row px-2 flex-wrap justify-center items-center my-6 gap-6 md:max-w-[1280px] mx-auto">

        @foreach ($estimation_options as $item)
            <div class="flex flex-col w-[96vw] max-w-[384px] md:w-[384px] md:min-w-[384px] shrink-0 lg:max-w-[30%] [&_p]:line-clamp-4 lg:[&_p]:line-clamp-3 px-4  h-[332px] md:h-[310px] md:hover:scale-105 transition-all  {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
                data-aos="fade-up">

                <div
                    class="{{ $theme_mode == 'light' ? 'bg-[#4189d1]' : '' }}  mt-6 rounded-lg  border-1 p-1 bg-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                    <img src="{{ $item->icon_link }}"
                        class=" h-[62px] w-[62px] rounded-lg    {{ $theme_mode == 'light' ? 'opacity-90' : '' }} "
                        alt="">
                </div>

                <h2
                    class="text-2xl font-semibold mt-2 text-center px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} ">
                    {{ $item->title }}</h2>

                <div
                    class="text-center my-2  text-lg font-normal px-4 line-clamp-3  [&_span]:!bg-transparent {{ session('theme_mode') == 'light' ? 'text-black [&_span]:!text-black' : 'text-white [&_span]:!text-white' }} [&_p]:text-md [&_h3]:text-lg [&_h2]:text-2xl [&_h1]:text-3xl">
                    {!! $item->description !!}</div>

                <div class="flex flex-row gap-4 mb-6 mt-auto">
                    <button
                        class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                        onclick="window.location.href='{{ env('BASE_LINK') }}/services/{{ str_replace(' ', '-', $item->title) }}?id={{ $item->id }}'"><a
                            hreitem" cursor-data-color="#1A579F">Select</a></button>

                    <button
                        class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                        onclick="window.location.href='{{ env('BASE_LINK') . $item->blog_link }}'"><a
                            href="{{ Str::start($item->blog_link, env('BASE_LINK')) }}"
                            cursor-data-color="#1A579F">Details</a></button>
                </div>

            </div>
        @endforeach

    </div>









    {{-- Contact Me Button --}}
    {{-- <button
        class="mt-4 px-8 py-2 w-[90vw] md:max-w-[300px] mx-auto rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all "
        onclick="window.location.href='/contact'" data-aos="fade-up"><a href="{{ env('BASE_LINK') }}/contact">Contact Me</a></button> --}}


    {{-- Explore Section Start --}}
    <div class="flex flex-col justify-center mt-[10vh]  md:max-w-[1280px]  mx-auto">

        <h2 class="text-3xl text-center font-semibold  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}"
            data-aos="fade-up">
            The Categories</h2>

        <p class="text-[16px] md:max-w-[80%] block mx-auto mt-2 text-center px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}"
            data-aos="fade-up">
            {{ $categories_caption }}</p>

    </div>

    <div
        class="flex flex-col md:flex-row px-2 flex-wrap justify-center items-center my-6 gap-6 md:max-w-[1280px] mx-auto">
        @foreach ($options_array as $option)
            <div class="flex flex-col justify-center w-[96vw] max-w-[380px] md:w-[380px] md:min-w-[380px] lg:max-w-[30%]  h-full max-h-[247px] md:hover:scale-105 transition-all  {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
                data-aos="fade-up">

                <div
                    class="{{ $theme_mode == 'light' ? 'bg-[#4189d1]' : '' }}  mt-6 rounded-lg  border-1 p-2  bg-white   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                    <img src="{{ $option['image_link'] }}"
                        class=" h-[70px] w-[70px] rounded-lg    {{ $theme_mode == 'light' ? 'opacity-90' : '' }}"
                        alt="">
                </div>

                <h2
                    class="text-2xl font-semibold mt-2 text-center px-4  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} line-clamp-2">
                    {{ $option['option'] }}</h2>

                <div class="mt-4 flex flex-row justify-center items-center mb-6">
                    <button
                        class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                        onclick="window.location.href='{{ env('BASE_LINK') }}/categories/{{ str_replace(' ', '-', $option['option']) }}?id={{ $option['id'] }}'"><a
                            href="{{ env('BASE_LINK') }}/categories/{{ str_replace(' ', '-', $option['option']) }}?id={{ $option['id'] }}"
                            cursor-data-color="#1A579F">Select</a></button>

                </div>

            </div>
        @endforeach

    </div>

    {{-- Explore Section End --}}







    {{-- Portfolio Showcase Section --}}

    <div class="flex flex-col justify-center items-center mx-auto mt-[10vh] md:max-w-[1280px] mb-8">

        <img src="{{ $theme_mode == 'light' ? asset('images/portfolio-light-mode.png') : asset('images/portfolio-dark-mode.png') }}"
            class="max-h-[100px]" alt="" data-aos="zoom-in">

        <p class="text-[16px] mt-2 md:max-w-[80%] block mx-auto text-center px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}"
            data-aos="zoom-in">
            {{ $my_portfolio_caption }}</p>

    </div>

    @foreach ($portfolios_array as $index => $item)
        @if ($index % 2 == 0)
            <div class="flex w-full px-2 {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} py-8  h-fit xl:h-[600px]"
                style="box-shadow: 0px 4px 3px rgba(0, 0, 0, 0.2), inset 0px 4px 3px rgba(0, 0, 0, 0.2);">
            @else
                <div class="flex w-full px-2 py-8  h-fit xl:h-[600px]"
                    style="{{ $index === count($portfolios_array) - 1 ? 'box-shadow: 0px 4px 3px rgba(0, 0, 0, 0.2)' : '' }} ">
        @endif

        <div
            class="max-w-[1280px] gap-[4%] xl:gap-[10%] mx-auto flex flex-col {{ $index % 2 == 0 ? 'xl:flex-row' : 'xl:flex-row-reverse' }} justify-center items-center h-full">

            <div class="flex justify-center w-[96%] mx-auto md:mt-0 md:mx-0 xl:w-[45%] items-center h-fit xl:h-full "
                data-aos="zoom-in">

                <img src="{{ $item['portfolio_image_link'] }}" class="max-h-[400px] rounded-lg"
                    alt="{{ $item['portfolio_title'] }}">

            </div>

            <div class="flex flex-col justify-center w-[96%] mx-auto xl:mt-0 xl:mx-0 xl:w-[45%] items-center h-fit xl:h-full "
                data-aos="zoom-in">
                <h2
                    class="text-center md:text-left text-2xl font-medium w-full my-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                    {{ $item['portfolio_title'] }}
                </h2>

                <div
                    class=" w-full [&_p]:text-md [&_h3]:text-lg [&_h2]:text-2xl [&_h1]:text-3xl [&_span]:!bg-transparent {{ session('theme_mode') == 'light' ? 'text-black [&_span]:!text-black' : 'text-white [&_span]:!text-white' }}">
                    <p>{!! $item['portfolio_description'] !!}</p>
                </div>

                <div class="flex gap-4 justify-center md:justify-start w-full my-4">
                    <a href="{{ $item['portfolio_site_link'] }}" target="_blank"><button
                            class="{{ $item['portfolio_site_link'] ? '' : 'hidden' }} h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all ">Demo</button></a>

                    <a href="{{ $item['portfolio_github_link'] }}" target="_blank"><button
                            class="{{ $item['portfolio_github_link'] ? '' : 'hidden' }} h-[45px] w-[160px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all ">Source
                            Code</button></a>
                </div>

                <h2
                    class="text-center md:text-left  w-full {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                    <span class="text-lg font-medium ">Tech Stack:</span> {{ $item['technologies_used'] }}
                </h2>

            </div>

        </div>

</div>
@endforeach

{{-- End Portfolio Showcase Section --}}











{{-- Admin Login Popup --}}
<script async src="https://www.google.com/recaptcha/api.js"></script>

<div class="{{ $admin_login_popup_is_active ? 'flex flex-col' : 'hidden' }} fixed justify-center items-center top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} px-4 py-8 mx-auto w-[96vw] max-w-[800px] rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] z-40"
    id="admin_login_popup">

    <p class="absolute top-4 right-4 cursor-pointer text-4xl hover:scale-110 transition-all {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}"
        id="admin_popup_close" wire:click="adminLoginPopup">&times;
    </p>

    <h2 class="text-2xl md:text-4xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
        Admin Login</h2>

    <form wire:submit.prevent="login">

        <div class="flex flex-col justify-center items-center my-4">

            <div class="flex flex-col mt-2 max-w-[680px]">

                <label for="title"
                    class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Admin
                    Name</label>

                <input type="text" wire:model.defer="admin_name" placeholder="Admin Name"
                    class="w-[92vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                    id="admin_name" autocomplete="off">

            </div>

        </div>

        <label for="title"
            class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Password</label>
        <div class="relative max-w-[680px]">
            <input id="hs-toggle-password" wire:model.defer="admin_password" type="password"
                class="w-[92vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                placeholder="Enter password" autocomplete="off">
            <button type="button" data-hs-toggle-password='{
          "target": "#hs-toggle-password"
        }'
                class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                    <path class="hs-password-active:hidden"
                        d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                    <path class="hs-password-active:hidden"
                        d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                    <line class="hs-password-active:hidden" x1="2" x2="22" y1="2"
                        y2="22">
                    </line>
                    <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                    </path>
                    <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                </svg>
            </button>
        </div>

        <div class="mt-4 flex justify-center" wire:ignore>
            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"
                data-callback="onRecaptchaSuccess"></div>
        </div>


        <p class="text-lg text-red-800 mt-1" id="admin_login_error"></p>

        {{-- End Created Items Section --}}
        <div class="flex justify-center">
            <button type="submit"
                class=" h-[64px] w-[240px] text-2xl rounded-lg bg-[#1A579F] mt-8 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Log
                In</button>
        </div>

    </form>

</div>

{{-- End Admin Login Popup --}}











{{-- The Collaborations Slider Start --}}

<!-- Slider main container -->
<div class="flex flex-col justify-center mt-[10vh]  md:max-w-[1280px]  mx-auto">

    <h2
        class="text-3xl text-center font-semibold  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
        The Collaborations</h2>

    <p
        class="text-[16px] md:max-w-[80%] block mx-auto mt-2 text-center px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
        {{ $collaborations_caption }}</p>

</div>
<div
    class="{{ $theme_mode == 'light' ? 'text-[#070707] [&_.swiper-slide]:bg-[#d6e0ec]' : 'text-[#fcfeff]  [&_.swiper-slide]:bg-[#1e1d1d]' }} p-4 w-full [&_.swiper]:max-w-[1200px] [&_.swiper]:h-[364px]">
    <div class="swiper swiper-collaboration rounded-lg" wire:ignore>
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($collaboration_cards as $item)
                <div
                    class="swiper-slide flex flex-col justify-center items-center p-8 w-[96vw] md:max-w-[1280px] rounded-lg  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] cursor-grab">
                    <div class="flex flex-col h-full justify-between gap-2 items-center">
                        <img src="{{ $item['profile_image'] }}" class="h-[242px] w-[252px] rounded-lg object-cover"
                            alt="">
                        <div class="flex flex-col gap-0 justify-center items-center">
                            <p class="text-[24px] leading-8">{{ $item['name'] }}</p>
                            <p class="text-[16px]">{{ $item['profession'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev scale-50 opacity-75"></div>
        <div class="swiper-button-next scale-50 opacity-75"></div>
        <div
            class="swiper-pagination [&.swiper-pagination-fraction]:!bottom-0 [&.swiper-pagination-fraction]:!text-blue-600">
        </div>

    </div>
</div>
{{-- The Collaborations Slider End --}}










{{-- The Testimonials Slider Start --}}
<!-- Slider main container -->
<div class="flex flex-col justify-center mt-[10vh]  md:max-w-[1280px]  mx-auto">

    <h2
        class="text-3xl text-center font-semibold  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
        The Testimonials & Feedback</h2>

    <p
        class="text-[16px] md:max-w-[80%] block mx-auto mt-2 text-center px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
        {{ $testimonials_caption }}</p>

</div>
<div
    class="{{ $theme_mode == 'light' ? 'text-[#070707] [&_.swiper-slide]:bg-[#d6e0ec]' : 'text-[#fcfeff]  [&_.swiper-slide]:bg-[#1e1d1d]' }} p-4 w-full [&_.swiper]:max-w-[1200px] [&_.swiper]:h-fit">
    <div class="swiper swiper-testimonials rounded-lg" wire:ignore>
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($testimonials_cards as $item)
                <div
                    class="swiper-slide flex flex-col justify-center items-center p-8 w-[96vw] md:max-w-[1280px] rounded-lg  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] cursor-grab">
                    <div class="flex flex-col h-[424px] justify-between gap-8 items-center">
                        <div class="flex flex-col h-full justify-center">
                            <div class="w-full flex justify-start">
                                <svg width="27" height="22" viewBox="0 0 57 43" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.375 0C9.61875 0 0 9.61875 0 21.375V42.75H21.375V21.375H7.125C7.125 13.4662 13.4662 7.125 21.375 7.125V0ZM57 0C45.2438 0 35.625 9.61875 35.625 21.375V42.75H57V21.375H42.75C42.75 13.4662 49.0913 7.125 57 7.125V0Z"
                                        fill="currentColor" />
                                </svg>
                            </div>

                            <div class="flex flex-col gap-2 justify-center items-center">
                                <p class="text-[14px] md:text-[18px] line-clamp-[13]">{{ $item['quote'] }}</p>
                            </div>
                            <div class="w-full flex justify-end">
                                <svg width="27" height="22" viewBox="0 0 57 43" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 0V21.2153H14.1436C14.1436 29.065 7.84967 35.3589 0 35.3589V42.4307C11.6684 42.4307 21.2153 32.8838 21.2153 21.2153V0H0ZM35.3589 0V21.2153H49.5024C49.5024 29.065 43.2086 35.3589 35.3589 35.3589V42.4307C47.0273 42.4307 56.5742 32.8838 56.5742 21.2153V0H35.3589Z"
                                        fill="currentColor" />
                                </svg>

                            </div>
                        </div>

                        <div class="flex flex-row w-full justify-start gap-4 items-center">
                            <img src="{{ $item['profile_image'] }}" class="max-w-[64px] max-h-[64px] rounded-lg"
                                alt="">
                            <div class="flex flex-col gap-0 justify-center items-start">
                                <p class="text-[18px] md:text-[24px]">{{ $item['name'] }}</p>
                                <p class="text-[12px] md:text-[16px]">{{ $item['profession'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev scale-50 opacity-75"></div>
        <div class="swiper-button-next scale-50 opacity-75"></div>
        <div class="swiper-pagination [&.swiper-pagination-fraction]:!text-blue-600"></div>

    </div>
</div>
{{-- The Testimonials Slider End --}}
















{{-- Consultation Section Start --}}
{{-- <div class="{{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} p-8 rounded-lg w-[calc(100%_-_16px)] max-w-xl mx-auto mt-[10vh]"
    data-aos="fade-up">
    <p class="text-center font-medium mb-2 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
        To get a professional paid consultation, please click the button below.
    </p>
    <div class="flex flex-col items-center">
        <div class="flex flex-col items-center">

            <label for="phone"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Contact
                Number</label>

            <input wire:model="consultation_client_phone" type="number"
                class="w-full md:w-[90%] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="phone">

        </div>
        <button wire:click="consultationStripeRedirect"
            class="bg-[#1A579F] text-white px-4 py-2 rounded-md hover:scale-105 transition-all mt-4 ">
            Consult Now
        </button>

        <img src={{ asset('images/stripe.png') }} class="h-[40px] mt-4" alt="">
    </div>
</div> --}}
{{-- Consultation Section End --}}










{{-- Contact Me Button --}}
<div class="flex flex-col items-center" data-aos="fade-up">
    <button
        class="my-[10vh] px-8 py-2 w-[90vw] md:max-w-[300px] mx-auto rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all "
        onclick="window.location.href='/contact'"><a href="{{ env('BASE_LINK') }}/contact"
            cursor-data-color="#1A579F">Contact Me</a></button>
</div>









{{-- Attributions Start --}}
<div
    class="flex flex-col justify-center items-center mt-8 {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} px-4 md:px-8 py-8 mx-auto w-[96vw] max-w-[800px] rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" data-aos="zoom-in">

    <div class="flex flex-col gap-4 justify-center items-center my-4">

        <h2 class="text-2xl md:text-3xl font-semibold {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
            Attributions</h2>

        <p class="text-center">
            <span class="text-base md:text-lg {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Here, I’m crediting the awesome sources where I got the amazing icons and images for my website -
             <a class="text-blue-600" href="https://www.flaticon.com/" target="_blank">FlatIcon</a>&nbsp; |  &nbsp;
             <a class="text-blue-600" href="https://www.freepnglogos.com/" target="_blank">FreePngLogos</a>&nbsp; |  &nbsp;
             <a class="text-blue-600" href="https://icons8.com/" target="_blank">Icons8</a>&nbsp; |  &nbsp;
             <a class="text-blue-600" href="https://giphy.com/" target="_blank">Giphy.</a>
            </span>
        </p>

    </div>
</div>
{{-- Attributions End --}}










{{-- Footer Element --}}
<div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2"
    data-aos="zoom-in">

    <div
        class="flex flex-col md:flex-row justify-center md:justify-between items-center w-[96vw] md:max-w-[700px] mb-4">

        <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all"
            onclick="window.location.href='{{ env('BASE_LINK') }}/blog_showcase'">
            <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hover:underline">
                Blogs</p><img
                src="{{ session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png') }}"
                class="h-[12px] w-[12px]" alt="">
        </div>
        <p
            class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hidden md:block opacity-50">
            |</p>

        @if ($admin_active)
            <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all"
                onclick="window.open('{{ env('BASE_LINK') }}/admin_dashboard', '_blank')">
                <p
                    class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hover:underline">
                    Admin Dashboard</p><img
                    src="{{ session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png') }}"
                    class="h-[12px] w-[12px]" alt="">
            </div>
        @endif

        @if (!$admin_active)
            <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all"
                wire:click="adminLoginPopup">
                <p
                    class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hover:underline">
                    Admin Dashboard</p><img
                    src="{{ session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png') }}"
                    class="h-[12px] w-[12px]" alt="">
            </div>
        @endif

        <p
            class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}  hidden md:block opacity-50">
            |</p>

        <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all"
            onclick="window.location.href='{{ env('BASE_LINK') }}/privacy_policy'">
            <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hover:underline">
                Terms & Privacy Policy</p><img
                src="{{ session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png') }}"
                class="h-[12px] w-[12px]" alt="">
        </div>
        <p
            class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}  hidden md:block opacity-50">
            |</p>

        <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all"
            onclick="window.location.href='{{ env('BASE_LINK') }}/about'">
            <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hover:underline">
                About Me</p><img
                src="{{ session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png') }}"
                class="h-[12px] w-[12px]" alt="">
        </div>

        <p
            class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}  hidden md:block opacity-50">
            |</p>

        <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all"
            onclick="window.location.href='{{ env('BASE_LINK') }}/contact'">
            <p class="{{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }} hover:underline">
                Contact Me</p><img
                src="{{ session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png') }}"
                class="h-[12px] w-[12px]" alt="">
        </div>


    </div>

    <img id='footer_icon' src="{{ $theme_mode == 'light' ? $footer_logo_light : $footer_logo_dark }}"
        class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt=""
        cursor-data-color="#1A579F">

    <p class=" text-center {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
        {{ $footer_top_layer_text }}</p>

    <p class=" text-center {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
        {{ $footer_bottom_layer_text }}
    </p>

</div>



















{{-- JavaScript
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
            AOS.refresh();


            // profile_img.style.opacity = 0;
            // profile_img.style.transform = "translateY(16px)";

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
                // .to(profile_img, {
                //     opacity: 1,
                //     duration: 1,
                //     transform: "translateY(0)",
                //     ease: "power2.out",
                // })
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
            AOS.refresh();

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

            if (document.getElementById('search_input').value == '' && document.activeElement !==
                document.getElementById('search_input')) {
                document.getElementById('search_icon').style.display = 'block';
                document.getElementById('search_text').style.display = 'block';
            }

        }, 1);

    }


    document.getElementById('input_div').addEventListener('click', () => {
        document.getElementById('search_input').focus();
        Livewire.dispatch('activate_search_input_field', {});
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



    function onRecaptchaSuccess(token) {
        // Pass the token to your Livewire component
        Livewire.dispatch('recaptcha_token', {
            token: token
        });
    }


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

        Livewire.on('alert-manager', () => {
            // if (document.getElementById('search_input').value !== '') {
            if (document.getElementById('search_input').value !== '' || document.activeElement ===
                document.getElementById('search_input')) {
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

        Livewire.on('redirect_to_admin_dashboard', () => {
            window.open("/admin_dashboard", "_blank");
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
</script> --}}









</div>
