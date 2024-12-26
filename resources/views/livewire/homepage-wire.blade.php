

    <div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{$theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}}">

        <div class="h-[100vh] flex flex-col">

        <nav class="flex justify-between items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <div class=" flex justify-start md:w-[20vw] cursor-pointer">

            <img  src="{{asset('images/the_logo_light_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw] {{session('theme_mode') == 'light' ? '' : 'hidden'}} cursor-pointer" onclick="window.location.href='/'" alt="">

            <img  src="{{asset('images/the_logo_dark_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw] {{session('theme_mode') == 'light' ? 'hidden' : ''}} cursor-pointer" onclick="window.location.href='/'"  alt="">


            </div>

            <div id="input_div" class="relative">

                <img id="{{session('theme_mode') == 'light' ? 'search_icon' : ''}}" src="{{asset('images/search_light_mode.gif')}}" class="{{session('theme_mode') == 'light' ? '' : 'hidden'}} absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1 {{$search_input_field_is_active ? 'hidden' : ''}}" alt="">

                <img id="{{session('theme_mode') == 'light' ? '' : 'search_icon'}}" src="{{asset('images/search_dark_mode.gif')}}" class="{{session('theme_mode') == 'light' ? 'hidden' : ''}} absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1 {{$search_input_field_is_active ? 'hidden' : ''}}" alt="">

                   {{-- <img id='search_icon' src="{{$theme_mode == 'light' ? asset('images/search_light_mode.gif') : asset('images/search_dark_mode.gif')}}" class="absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1 {{$search_input_field_is_active ? 'hidden' : ''}}" alt=""> --}}

                <span id='search_text' class="absolute top-1/2 left-10 -translate-y-1/2 h-[80%] mt-1 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#EFF9FF]'}} {{$search_input_field_is_active ? 'hidden' : ''}}">Search</span>

                <input wire:model.live='searchtext' id='search_input' type="text" class="mr-2 h-[36px] w-[50vw] md:w-[30vw] rounded-lg {{$theme_mode == 'light' ? 'bg-[#EFF9FF] text-[#070707]' : 'bg-[#070707] text-[#EFF9FF]' }}  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] px-4 focus: outline-none border-none ">



            </div>

            <div class=" flex justify-end md:w-[20vw]">

            <button class="hidden md:block mr-2 px-8 py-2 rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='/consultation'">Consult Now</button>

            </div>



        </nav>


            {{-- Loading The Searched Data --}}
            <div class="mx-auto md:max-w-[1280px]">
                <p id="no_results_found" class="hidden"></p>
                @if ($search_output)
                    @foreach ($search_output as $post)

                        @if ($theme_mode == 'light')
                            <p>{!! '<p style="color: #121212;text-transform: uppercase; font-weight: bold ; cursor:pointer;"
                            onmouseover="this.style.textDecoration=`underline`;"
                            onmouseout="this.style.textDecoration=`none`;"
                            onclick="window.location.href=`' .  $post->blog_link . '`" >' . $post->blog_title . '</p>'!!}</p>
                            <p>{!! '<p style="color: #121212; ; cursor:pointer"
                            onclick="window.location.href=`' . $post->blog_link . '`" >' . $post->blog_excerpt . '</p>'!!}</p>
                            <hr>
                        @endif

                        @if ($theme_mode == 'dark')
                            <p>{!! '<p style="color: #e7e7e7;text-transform: uppercase; font-weight: bold ; cursor:pointer"
                            onmouseover="this.style.textDecoration=`underline`;"
                            onmouseout="this.style.textDecoration=`none`;"
                            onclick="window.location.href=`' . $post->blog_link . '`" >' . $post->blog_title . '</p>'!!}</p>
                            <p>{!! '<p style="color: #ededed; ; cursor:pointer"
                            onclick="window.location.href=`' . $post->blog_link . '`" >' . $post->blog_excerpt . '</p>'!!}</p>
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
            <div wire:loading wire:target="changeThemeMode" class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

                <div class="flex flex-row justify-center items-center px-2 gap-2">
                    <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                    <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
                </div>


            </div>
        {{-- End Loaders --}}




        <div wire:click="changeThemeMode" class="flex justify-center w-fit mx-auto mt-6 md:hover:scale-105 transition-all cursor-pointer">

            <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] {{$theme_mode == 'light' ? '' : 'hidden'}}">

            <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] {{$theme_mode == 'light' ? 'hidden' : ''}}">

        </div>



        <div class="flex justify-center mt-6 md:hidden hidden">

            <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"  onclick="window.location.href='/consultation'">Consult Now</button>

        </div>


        <div class="flex flex-col max-w-[1280px] justify-center items-center mx-auto grow mt-2 md:mt-0">

        <div class="{{$theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}} gap-4 md:gap-16 flex flex-col-reverse md:flex-row max-w-[1280px] mx-auto justify-center items-center ">

            <div class=" md:mt-[-5vh]">

                <p id="my_name" class="font-poppins text-lg text-center md:text-left  md:text-xl mb-2 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}  "  style="opacity: 0">Hello, I'm Habib,</p>

                <h2 id="full_stack" class="font-poppins text-center md:text-left text-6xl {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}    "   style="opacity: 0">Full Stack</h2>

                <h2 id="developer" class="font-poppins text-6xl text-center md:text-left  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}    "   style="opacity: 0">Developer</h2>

                <p id="based_in" class="font-poppins text-center md:text-left  text-lg md:text-xl mt-2 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}    "   style="opacity: 0">based in Dhaka, Bangladesh.</p>

            </div>


            <div  class="">
                    <img id="profile_img" src="{{asset('images/whole_profile-min.png')}}" class=" w-[30vh] md:w-[40vh]   "  style="opacity: 0"  alt="">
                </div>

            </div>

                <div class="mt-[4vh] md:mt-[10vh] animate-fadeIn5">
                    <img id="scroll_down" src="{{asset('images/scroll-down.png')}}" class="w-[60px] animate-bounce   "   style="opacity: 0" alt="Scroll Down">
                </div>




    </div>

    </div>


    {{-- Portfolio Showcase Section --}}
    <div class="flex w-full {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} h-[600px]"
    style="box-shadow: 0px 4px 3px rgba(0, 0, 0, 0.2), inset 0px 4px 3px rgba(0, 0, 0, 0.2);">


            <div class="max-w-[1280px] gap-[10%] mx-auto flex   w-[1280px]">

                <div class="flex justify-center w-[45%] items-center h-full ">

                    <img src="{{asset('images/nature.jpg')}}" class="max-h-[400px] rounded-lg" alt="">

                </div>

                <div class="flex flex-col justify-center w-[45%] items-center h-full ">
                    <h2 class="text-left text-2xl font-medium w-full mb-4">E-Commerce
                    </h2>

                    <p class="text-left">Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. </p>

                    <div class="flex gap-4 justify-start w-full my-4">
                        <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Demo</button>

                        <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Source Code</button>
                    </div>

                    <h2 class="text-left  w-full"><span class="text-lg font-medium">Technologies Used:</span> React , Laravel , Mysql</h2>

                </div>

            </div>






    </div>

    <div class="flex w-full h-[600px]">

        <div class="max-w-[1280px] gap-[10%] mx-auto flex flex-row-reverse   w-[1280px]">

            <div class="flex justify-center w-[45%] items-center h-full ">

                <img src="{{asset('images/nature.jpg')}}" class="max-h-[400px] rounded-lg" alt="">

            </div>

            <div class="flex flex-col justify-center w-[45%] items-center h-full ">
                <h2 class="text-left text-2xl font-medium w-full mb-4">E-Commerce
                </h2>

                <p class="text-left">Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. </p>

                <div class="flex gap-4 justify-start w-full my-4">
                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Demo</button>

                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Source Code</button>
                </div>

                <h2 class="text-left  w-full"><span class="text-lg font-medium">Technologies Used:</span> React , Laravel , Mysql</h2>

            </div>

        </div>


    </div>

    <div class="flex w-full {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} h-[600px]" style="box-shadow: 0px 4px 3px rgba(0, 0, 0, 0.2) ,  inset 0px 4px 3px rgba(0, 0, 0, 0.2);">


        <div class="max-w-[1280px] gap-[10%] mx-auto flex   w-[1280px]">

            <div class="flex justify-center w-[45%] items-center h-full ">

                <img src="{{asset('images/nature.jpg')}}" class="max-h-[400px] rounded-lg" alt="">

            </div>

            <div class="flex flex-col justify-center w-[45%] items-center h-full ">
                <h2 class="text-left text-2xl font-medium w-full mb-4">E-Commerce
                </h2>

                <p class="text-left">Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. </p>

                <div class="flex gap-4 justify-start w-full my-4">
                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Demo</button>

                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Source Code</button>
                </div>

                <h2 class="text-left  w-full"><span class="text-lg font-medium">Technologies Used:</span> React , Laravel , Mysql</h2>

            </div>

        </div>


    </div>

    <div class="flex w-full h-[600px]">

        <div class="max-w-[1280px] gap-[10%] mx-auto flex flex-row-reverse   w-[1280px]">

            <div class="flex justify-center w-[45%] items-center h-full ">

                <img src="{{asset('images/nature.jpg')}}" class="max-h-[400px] rounded-lg" alt="">

            </div>

            <div class="flex flex-col justify-center w-[45%] items-center h-full ">
                <h2 class="text-left text-2xl font-medium w-full mb-4">E-Commerce
                </h2>

                <p class="text-left">Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. </p>

                <div class="flex gap-4 justify-start w-full my-4">
                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Demo</button>

                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Source Code</button>
                </div>

                <h2 class="text-left  w-full"><span class="text-lg font-medium">Technologies Used:</span> React , Laravel , Mysql</h2>

            </div>

        </div>


    </div>

    <div class="flex w-full {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} h-[600px]" style="box-shadow: 0px 4px 3px rgba(0, 0, 0, 0.2) ,  inset 0px 4px 3px rgba(0, 0, 0, 0.2);">


        <div class="max-w-[1280px] gap-[10%] mx-auto flex   w-[1280px]">

            <div class="flex justify-center w-[45%] items-center h-full ">

                <img src="{{asset('images/nature.jpg')}}" class="max-h-[400px] rounded-lg" alt="">

            </div>

            <div class="flex flex-col justify-center w-[45%] items-center h-full ">
                <h2 class="text-left text-2xl font-medium w-full mb-4">E-Commerce
                </h2>

                <p class="text-left">Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. </p>

                <div class="flex gap-4 justify-start w-full my-4">
                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Demo</button>

                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Source Code</button>
                </div>

                <h2 class="text-left  w-full"><span class="text-lg font-medium">Technologies Used:</span> React , Laravel , Mysql</h2>

            </div>

        </div>


    </div>

    <div class="flex w-full h-[600px]" style="box-shadow: 0px 4px 3px rgba(0, 0, 0, 0.2)">

        <div class="max-w-[1280px] gap-[10%] mx-auto flex flex-row-reverse   w-[1280px]">

            <div class="flex justify-center w-[45%] items-center h-full ">

                <img src="{{asset('images/nature.jpg')}}" class="max-h-[400px] rounded-lg" alt="">

            </div>

            <div class="flex flex-col justify-center w-[45%] items-center h-full ">
                <h2 class="text-left text-2xl font-medium w-full mb-4">E-Commerce
                </h2>

                <p class="text-left">Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. Some details about the project. </p>

                <div class="flex gap-4 justify-start w-full my-4">
                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Demo</button>

                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Source Code</button>
                </div>

                <h2 class="text-left  w-full"><span class="text-lg font-medium">Technologies Used:</span> React , Laravel , Mysql</h2>

            </div>

        </div>


    </div>
    {{-- End Portfolio Showcase Section --}}




        <div class="flex flex-col justify-center mt-6  md:max-w-[1280px]  mx-auto">

            <h1 class="text-3xl text-center font-semibold  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Our Dental Services</h1>

            <p class="text-sm   text-center px-4 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">{{$banner_headline}}</p>

            <p class="text-lg font-medium text-center mt-8 px-4 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Click on 'Select' to get the estimated fee and book an appointment. If you want to know more, click on the 'Details' button</p>

        </div>



        {{-- Service Cards --}}
        <div class="flex flex-col md:flex-row flex-wrap justify-center items-center my-6 gap-6 md:max-w-[1280px] mx-auto">


            {{-- Root Canal Treatment --}}
            <div class="flex flex-col w-[96vw] md:max-w-[30%] h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

                <div class="{{$theme_mode == 'light' ? 'bg-[#4189d1]' : ''}}  mt-6 rounded-lg border-1  bg-[#EFF9FF]">
                <img src="{{asset('images/root_canal_treatment.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                 </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Root Canal Treatment</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Root canal treatment (endodontics) is a dental procedure used to treat infection at the centre of a tooth.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='{{env('BASE_LINK')}}/services/root_canal_treatment'"><a href="{{env('BASE_LINK')}}/services/root_canal_treatment">Select</a></button>

                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='{{env('BASE_LINK')}}/details/root_canal_treatment'"><a href="{{env('BASE_LINK')}}/details/root_canal_treatment">Details</a></button>
                </div>

            </div>




            {{-- Cosmetic Dentistry --}}
            <div class="flex flex-col w-[96vw] md:max-w-[30%]  h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

                <div class="{{$theme_mode == 'light' ? 'bg-[#4189d1]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/cosmetic_dentist.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Cosmetic Dentistry</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Cosmetic dentistry is the branch of dentistry that focuses on improving the appearance of your smile.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"  onclick="window.location.href='{{env('BASE_LINK')}}/services/cosmetic_dentist'"><a href="{{env('BASE_LINK')}}/services/cosmetic_dentist">Select</a></button>

                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='{{env('BASE_LINK')}}/details/cosmetic_dentist'"><a href="{{env('BASE_LINK')}}/details/cosmetic_dentist">Details</a></button>
                </div>

            </div>




            {{-- Dental Implants--}}
            <div class="flex flex-col w-[96vw] md:max-w-[30%]  h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


                <div class="{{$theme_mode == 'light' ? 'bg-[#4189d1]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/dental_implant.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Dental Implants</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">A dental implant is an artificial tooth root that’s placed into your jaw to hold a prosthetic tooth or bridge.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"  onclick="window.location.href='{{env('BASE_LINK')}}/services/dental_implants'"><a href="{{env('BASE_LINK')}}/services/dental_implants">Select</a></button>

                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='{{env('BASE_LINK')}}/details/dental_implants'"><a href="{{env('BASE_LINK')}}/details/dental_implants">Details</a></button>
                </div>

            </div>




            {{-- Teeth Whitening--}}
            <div class="flex flex-col w-[96vw] md:max-w-[30%]  h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


                <div class="{{$theme_mode == 'light' ? 'bg-[#4189d1]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/teeth_whitening.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Teeth Whitening</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">It's never been easier to brighten your smile at home. There are all kinds of products you can try.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='{{env('BASE_LINK')}}/services/teeth_whitening'"><a href="{{env('BASE_LINK')}}/services/teeth_whitening">Select</a></button>

                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='{{env('BASE_LINK')}}/details/teeth_whitening'"><a href="{{env('BASE_LINK')}}/details/teeth_whitening">Details</a></button>
                </div>

            </div>



            {{-- Emergency Dentistry --}}
            <div class="flex flex-col w-[96vw]  md:max-w-[30%] h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


                <div class="{{$theme_mode == 'light' ? 'bg-[#4189d1]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/emergency_dentistry.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Emergency Dentistry</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">In general, any dental problem that needs immediate treatment to stop bleeding, alleviate severe pain.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='{{env('BASE_LINK')}}/services/emergency_dentistry'"><a href="{{env('BASE_LINK')}}/services/emergency_dentistry">Select</a></button>

                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='{{env('BASE_LINK')}}/details/emergency_dentistry'"><a href="{{env('BASE_LINK')}}/details/emergency_dentistry">Details</a></button>
                </div>

            </div>



            {{-- Prevention --}}
            <div class="flex flex-col w-[96vw] md:max-w-[30%]  h-full md:min-h-[300px] md:hover:scale-105 transition-all  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


                <div class="{{$theme_mode == 'light' ? 'bg-[#4189d1]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/prevention.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Prevention</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Preventive dentistry is dental care that helps maintain good oral health. a combination of regular dental.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='{{env('BASE_LINK')}}/services/prevention'"><a href="{{env('BASE_LINK')}}/services/prevention">Select</a></button>

                    <button class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='{{env('BASE_LINK')}}/details/prevention'"><a href="{{env('BASE_LINK')}}/details/prevention">Details</a></button>
                </div>

            </div>




        </div>



          {{-- Consult Now Button --}}
          <button class="mt-4 px-8 py-2 w-[90vw] md:max-w-[300px] mx-auto rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all "  onclick="window.location.href='/consultation'"><a href="{{env('BASE_LINK')}}/consultation">Consult Now</a></button>



          {{-- Footer Element --}}
          <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">



              <div class="flex flex-col md:flex-row justify-center md:justify-between items-center w-[96vw] md:max-w-[500px] mb-4">

                <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all">
                <p class="{{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}} hover:underline"  onclick="window.location.href='{{env('BASE_LINK')}}/blog_showcase'">Blogs</p><img src="{{session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png')}}" class="h-[12px] w-[12px]" alt="">
                 </div>
                <p  class="{{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}} hidden md:block opacity-50">|</p>

                <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all">
                    <p class="{{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}} hover:underline" onclick="window.location.href='{{env('BASE_LINK')}}/admin_dashboard'">Admin Dashboard</p><img src="{{session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png')}}" class="h-[12px] w-[12px]" alt="">
                     </div>
                    <p  class="{{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}  hidden md:block opacity-50">|</p>

                <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all">
                    <p class="{{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}} hover:underline" onclick="window.location.href='{{env('BASE_LINK')}}/privacy_policy'">Privacy Policy</p><img src="{{session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png')}}" class="h-[12px] w-[12px]" alt="">
                        </div>
                    <p  class="{{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}  hidden md:block opacity-50">|</p>

                <div class="flex flex-row justify-center items-center cursor-pointer hover:scale-105 transition-all">
                    <p class="{{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}} hover:underline"  onclick="window.location.href='{{env('BASE_LINK')}}/about'">About Me</p><img src="{{session('theme_mode') == 'light' ? asset('images/external_link_light_mode.png') : asset('images/external_link_dark_mode.png')}}" class="h-[12px] w-[12px]" alt="">
                        </div>


              </div>


              <img id='footer_icon' src="{{$theme_mode == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'"   alt="">

              <p class=" text-center {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

              <p class=" text-center {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>


          </div>








        {{-- JavaScript --}}
        <script  src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

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

               if(document.getElementById('search_input').value == ''){
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

                    if(document.getElementById('search_input').value == ''){


                            Livewire.dispatch('new_load_alert_for_serch_strings', {});



                    }


                    // }, 10);


                Livewire.on('alert-manager', () => {


                    if(document.getElementById('search_input').value !== '' || document.activeElement === document.getElementById('search_input')){

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




                    Livewire.on('load_animation', () => {// Doing this to avoid the rerendering issue in javascript

                                 animation_function();

                        })





                })



        </script>


        <script>
            document.addEventListener('load', () => {

            })
        </script>












</div>





