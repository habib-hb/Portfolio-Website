<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ $theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}">
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


    <div wire:click="changeThemeMode"
        class="flex justify-center w-fit mx-auto mt-6 md:hover:scale-105 transition-all cursor-pointer">

        <img src="{{ asset('images/light_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? '' : 'hidden' }}">

        <img src="{{ asset('images/dark_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? 'hidden' : '' }}">

    </div>

    <div class="mt-6">

        <div class="flex flex-col justify-center mb-6 md:max-w-[1280px]  mx-auto">

            <h1
                class="text-3xl text-center font-semibold  {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                {{ $category_title }}</h1>

            <p class="text-sm   text-center px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                Sub Title</p>

        </div>

    @foreach ($items_array as $index => $item)
       
        @if ($index % 2 == 0)
            <div class="flex w-full {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} py-8  h-fit md:h-[600px]"
                style="box-shadow: 0px 4px 3px rgba(0, 0, 0, 0.2), inset 0px 4px 3px rgba(0, 0, 0, 0.2);">
            @else
                <div class="flex w-full py-8  h-fit md:h-[600px]">
        @endif



        <div
            class="max-w-[1280px] gap-[4%] md:gap-[10%] mx-auto flex flex-col {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} justify-center items-center h-full">

            <div class="flex justify-center w-[96%] mx-auto md:mt-0 md:mx-0 md:w-[45%] items-center h-fit md:h-full ">

                <img src="{{ asset('images/ecommerce-portfolio.png') }}" class="max-h-[400px] rounded-lg"
                    alt="">

            </div>

            <div
                class="flex flex-col justify-center w-[96%] mx-auto md:mt-0 md:mx-0 md:w-[45%] items-center h-fit md:h-full ">
                <h2
                    class="text-center md:text-left text-2xl font-medium w-full my-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                    {{ $item['item_title'] }}
                </h2>

                <div
                    class="flex justify-start items-start w-full {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
                    {!! $item['item_description'] !!}</div>

                <div class="flex gap-4 justify-center md:justify-start w-full my-4">
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
      src="{{ session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png') }}"
      class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt="">

  <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">All
      Rights
      Reserved @2024</p>

  <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
      @valueadderhabib</p>

</div>

</div>
