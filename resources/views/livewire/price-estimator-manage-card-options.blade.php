<div
    class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}">

    @livewire('components.header', [
        'theme_mode' => session('theme_mode'),
        'back_button_link' => '/admin_dashboard/price_estimator_management',
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

  





    {{-- Options --}}
    <div class="mt-8 flex flex-col gap-4 min-h-screen">

        @foreach ($items_array as $item)
            <div class="flex flex-col gap-2 justify-center  items-center  w-[96vw]  md:max-w-[800px] px-2 md:px-8 py-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] md:hover:scale-110 transition-all cursor-pointer"
                onclick="window.location.href='/admin_dashboard/price_estimator_management/manage_card_options/{{ $item['id'] }}'">

                <img src="{{ $item['icon_link'] }}" class="h-[64px] rounded-lg" alt="">

                <h2
                    class="text-2xl font-semibold text-center px-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    {{ $item['title'] }}</h2>


                <h2
                    class="text-lg font-semibold [&_p]:text-md [&_h3]:text-lg [&_h2]:text-2xl [&_h1]:text-3xl [&_span]:!bg-transparent {{ session('theme_mode') == 'light' ? 'text-black [&_span]:!text-black' : 'text-white [&_span]:!text-white' }} text-center px-2">
                    {!! $item['description'] !!}</h2>

            </div>
        @endforeach


    </div>







    {{-- Footer Element --}}
    @livewire('components.footer', [
        'theme_mode' => session('theme_mode'),
    ])





</div>
