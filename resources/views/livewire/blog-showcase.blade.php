

<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}}">

    <div class="sticky top-0  {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff]' : 'bg-[#090909]' }} z-50">
    <nav class="flex justify-center md:justify-between items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto my-2 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-start md:w-[20vw] cursor-pointer">

            <img  src="{{asset('images/the_logo_light_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw] {{session('theme_mode') == 'light' ? '' : 'hidden'}} cursor-pointer" onclick="window.location.href='/'" alt="">

            <img  src="{{asset('images/the_logo_dark_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw] {{session('theme_mode') == 'light' ? 'hidden' : ''}} cursor-pointer" onclick="window.location.href='/'"  alt="">

        </div>

        {{-- <div id="input_div" class="relative">

            <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/search_light_mode.gif') : asset('images/search_dark_mode.gif')}}" class="absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1" alt="">

            <span id='search_text' class="absolute top-1/2 left-10 -translate-y-1/2 h-[80%] mt-1 {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#EFF9FF]'}}">Search</span>

            <input id='search_input' type="text" class="mr-2 h-[36px] w-[50vw] md:w-[30vw] rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#EFF9FF] text-[#070707]' : 'bg-[#070707] text-[#EFF9FF]' }}  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] px-4 focus: outline-none border-none ">



        </div> --}}

        <div class=" flex justify-end md:w-[20vw]">

        <button class="hidden md:block mr-2 px-8 py-2 rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='/contact'">Contact Me</button>

        </div>



    </nav>
    </div>

            {{-- <div wire:click="changeThemeMode" class="flex justify-center">

                <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? '' : 'hidden'}}">

                <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? 'hidden' : ''}}">

            </div> --}}


    {{-- Loading Spinner --}}
    <div wire:loading wire:target="loadMore" class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Loading More Date...</span>

        </div>
    </div>
    {{-- End Loading Spinner --}}




    {{-- Messages --}}
     @if ($notification == "No More Blog Posts Found")

     <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
         <div class="flex flex-row justify-between items-center px-8">


             <p class="text-white text-left">{{$notification}}</p>

         </div>

         <button wire:click="clear_notification" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

     </div>

     @endif
    {{-- End Messages --}}



    <div class="flex justify-center relative w-full max-w-[1200px] mx-auto mt-6">
        <img src="{{session('theme_mode') == 'light' ? asset('images/back_light_mode.png') : asset('images/back_dark_mode.png')}}" class="absolute left-1 md:left-0 h-[48px] w-[48px]  md:hover:scale-105 transition-all cursor-pointer" onclick="window.history.back()" alt="">

        <img wire:click="changeThemeMode" src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? '' : 'hidden'}} md:hover:scale-105 transition-all cursor-pointer">

        <img wire:click="changeThemeMode" src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? 'hidden' : ''}} md:hover:scale-105 transition-all cursor-pointer">

    </div>




        <!-- Show a loading spinner while Doing Theme Change Processing -->
        <div wire:loading wire:target="changeThemeMode" class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

            <div class="flex flex-row justify-center items-center px-2 gap-2">
                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
            </div>


        </div>






        <main class="flex flex-col gap-8 py-8">


            @foreach ($blogs as $blog)


                <div class="flex flex-col md:flex-row justify-center items-center md:justify-start w-[96vw] max-w-[1200px] py-8 md:px-8 {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} mx-auto rounded-lg md:hover:scale-105 transition-all  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" onclick="window.location.href='{{$blog['blog_link']}}'">

                    <img src="{{$blog['blog_image']}}" class="max-w-[200px] max-h-[200px] rounded-lg" alt="">

                    <div class="mt-4 px-4">

                        <h1 class="text-2xl text-center md:text-left font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">{{$blog['blog_title']}}</h1>

                        <p class="mt-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">{{$blog['blog_excerpt']}}...<a class=" {{session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-[#5893d6]'}} font-medium" href="{{$blog['blog_link']}}">Read More</a></p>

                    </div>

                </div>


            @endforeach


             {{-- If No Appointment Data --}}
        @if(count($blogs) == 0)
        <div class="flex flex-col items-center h-[100vh]">

            <p class="mt-16 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">No Blogs Found</p>

        </div>
         @endif


            <div class="flex justify-center mt-8">
                <button wire:click="loadMore" class="px-8 py-2 bg-[#1A579F] text-white rounded-lg hover:scale-110 transition-all {{count($blogs) == 0 ? 'hidden' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Load More...</button>
           </div>



        </main>





      {{-- Footer Element --}}
      <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-16 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'"   alt="">

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

    </div>





</div>








