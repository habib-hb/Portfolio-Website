<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ $theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}">
    <nav class="flex justify-center md:justify-between items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-start md:w-[20vw] cursor-pointer">

            <img  src="{{$site_logo_light}}" class="ml-2 h-[64px] max-w-[45vw] {{session('theme_mode') == 'light' ? '' : 'hidden'}} cursor-pointer" onclick="window.location.href='/'" alt="" cursor-data-color="#1A579F">

            <img  src="{{$site_logo_dark}}" class="ml-2 h-[64px] max-w-[45vw] {{session('theme_mode') == 'light' ? 'hidden' : ''}} cursor-pointer" onclick="window.location.href='/'"  alt="" cursor-data-color="#1A579F">

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

        <!-- Show a loading spinner while Doing Theme Change Processing -->
        <div wire:loading wire:target="changeThemeMode"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
        </div>


    </div>


    <div class="flex justify-center relative w-full max-w-[1280px] mx-auto mt-6">
        <img src="{{session('theme_mode') == 'light' ? asset('images/back_light_mode.png') : asset('images/back_dark_mode.png')}}" class="absolute left-1 md:left-0 h-[48px] w-[48px]  md:hover:scale-105 transition-all cursor-pointer" onclick="window.history.back()" alt="">

        <img wire:click="changeThemeMode" src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? '' : 'hidden'}} md:hover:scale-105 transition-all cursor-pointer" cursor-data-color="#1A579F">

        <img wire:click="changeThemeMode" src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? 'hidden' : ''}} md:hover:scale-105 transition-all cursor-pointer" cursor-data-color="#1A579F">

    </div>

    <div class="mt-6 min-h-screen">

        <div class="flex flex-col justify-center mb-6 md:max-w-[1280px]  mx-auto">

            <h1
                class="text-3xl text-center font-semibold  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                {{ $category_title }}</h1>

            <p class="text-sm max-w-[800px] mx-auto mt-2 text-center px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                {{$page_caption}}</p>

        </div>

    @foreach ($items_array as $index => $item)

        @if ($index % 2 == 0)
            <div class="flex w-full px-2 {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} py-8  h-fit lg:h-[600px]"
                style="box-shadow: 0px 4px 3px rgba(0, 0, 0, 0.2), inset 0px 4px 3px rgba(0, 0, 0, 0.2);">
            @else
                <div class="flex w-full px-2 py-8  h-fit lg:h-[600px]" style="{{$index === count($items_array) - 1 ? 'box-shadow: 0px 4px 3px rgba(0, 0, 0, 0.2)' : ''}} ">
        @endif



        <div
            class="max-w-[1280px] gap-[4%] lg:gap-[10%] mx-auto flex flex-col {{ $index % 2 == 0 ? 'lg:flex-row' : 'lg:flex-row-reverse' }} justify-center items-center h-full">

            <div class="flex justify-center w-[96%] mx-auto lg:mt-0 lg:mx-0 lg:w-[45%] items-center h-fit lg:h-full ">

                <a href="{{ $item['site_link'] }}" target="_blank"><img src="{{ $item['image_link'] }}" class="max-h-[400px] rounded-lg"
                    alt="" data-aos="zoom-in"></a>

            </div>

            <div
                class="flex flex-col justify-center w-[96%] mx-auto lg:mt-0 lg:mx-0 lg:w-[45%] items-center h-fit lg:h-full " data-aos="zoom-in">
                <h2
                    class="text-center lg:text-left text-2xl font-medium w-full my-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                    {{ $item['item_title'] }}
                </h2>

                <div
                    class="w-full [&_p]:text-md [&_h3]:text-lg [&_h2]:text-2xl [&_h1]:text-3xl [&_span]:!bg-transparent {{ session('theme_mode') == 'light' ? 'text-black [&_span]:!text-black' : 'text-white [&_span]:!text-white' }}">
                    <p>{!! $item['item_description'] !!}</p></div>

                <div class="flex gap-4 justify-center lg:justify-start w-full my-4">
                    <a href="{{ $item['site_link'] }}" target="_blank"><button
                            class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all ">Demo</button></a>
                </div>

            </div>

        </div>






</div>
@endforeach
</div>



  {{-- Footer Element --}}
  <div
  class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


  <img id='search_icon'
      src="{{ session('theme_mode') == 'light' ? $footer_logo_light : $footer_logo_dark }}"
      class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt="" cursor-data-color="#1A579F">

  <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">All
      {{$footer_top_layer_text}}</p>

  <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
      {{$footer_bottom_layer_text}}</p>

</div>


<script>
    document.addEventListener('livewire:initialized', () => {

        Livewire.on('alert-manager', () => {
            setTimeout(() => {
                AOS.refresh();
            }, 100);
        })

    })
</script>

</div>
