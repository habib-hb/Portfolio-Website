<div
    class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}">

    @livewire('components.header', [
        'theme_mode' => session('theme_mode'),
        'back_button_link' => '/admin_dashboard',
    ])

    @livewire('components.sidebar', [
        'theme_mode' => session('theme_mode'),
    ])

    {{-- <div wire:click="changeThemeMode" class="flex justify-center">

                <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? '' : 'hidden'}}">

                <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? 'hidden' : ''}}">

            </div> --}}



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


    {{-- Loading Spinner --}}
    <div wire:loading wire:target="loadMore"
        class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Loading More Date...</span>

        </div>
    </div>
    {{-- End Loading Spinner --}}




    {{-- Messages --}}
    @if ($notification == 'No More Blog Posts Found')
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-left">{{ $notification }}</p>

            </div>

            <button wire:click="clear_notification"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif



    @if ($notification == 'The Blog Has Been Deleted Successfully')
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-left">{{ $notification }}</p>

            </div>

            <button wire:click="clear_notification"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif

    {{-- End Messages --}}



    {{-- Confirmation Messages --}}

    @if ($notification == 'Are You Sure You Want To Delete This Blog?')
        <div id="appointment_unfulfilled"
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10">
            <div class="flex flex-col justify-between items-center px-8">

                <p class="text-white text-3xl font-semibold">Confirmation</p>

                {{-- <p class="text-white text-left">{{session('appointment_unfulfilled')}}</p> --}}
                <p class="text-white text-center">{{ $notification }}</p>

            </div>

            {{-- <button onclick="document.getElementById('appointment_unfulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

            <div class="flex flex-row justify-between items-center py-4 gap-4">

                <button wire:click="delete_confirmed"
                    class="text-white border-2 border-white px-4 rounded-lg hover:scale-110">Delete</button>

                <button wire:click="clear_notification"
                    class="text-white border-2 border-white px-4 rounded-lg hover:scale-110">Cancel</button>

            </div>




        </div>
    @endif

    {{-- End Confirmation Messages --}}








    <!-- Show a loading spinner while Doing Theme Change Processing -->
    <div wire:loading wire:target="changeThemeMode"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
        </div>


    </div>


    <div wire:loading wire:target="delete_confirmed"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Deleting Blog...</span>
        </div>


    </div>


    <div wire:loading wire:target="moveItemUp"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Moving Blog Up...</span>
        </div>


    </div>


    <div wire:loading wire:target="moveItemDown"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Moving Blog Down...</span>
        </div>


    </div>






    <main class="flex flex-col gap-8 py-8">

        <h1
            class="text-3xl font-semibold text-center {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
            Manage Blogs</h1>
        @foreach ($blogs as $blog)
            <div
                class="flex flex-col md:flex-row justify-center items-center md:justify-start w-[96vw] max-w-[1200px] py-8 md:px-8 {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} mx-auto rounded-lg md:hover:scale-105 transition-all  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

                <img src="{{ $blog['blog_image'] }}" class="max-w-[200px] max-h-[200px] rounded-lg" alt="">

                <div class="flex flex-col justify-center items-center md:justify-start md:items-start mt-4 px-4">

                    <h1
                        class="text-2xl text-center md:text-left font-semibold {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                        {{ $blog['blog_title'] }}</h1>

                    <p class="mt-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                        {{ $blog['blog_excerpt'] }}</p>

                    <div class="mt-4 flex flex-row gap-4">
                        <button
                            class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                            onclick="window.location.href='/admin_dashboard/blogs/blogs_manage/blog_edit/{{ str_replace('/blogs/', '', $blog['blog_link']) }}'">Edit</button>

                        <button wire:click="delete_blog({{ $blog['blog_id'] }})"
                            class="h-[45px] w-[120px] rounded-lg bg-red-800 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Delete</button>
                    </div>

                    <div class="mt-4 flex flex-row gap-4">
                        <button
                            class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"
                            wire:click="moveItemUp('{{ $blog['blog_id'] }}')">&uarr;
                            Move Up</button>

                        <button wire:click="moveItemDown('{{ $blog['blog_id'] }}')"
                            class="h-[45px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">&darr;
                            Move Down</button>
                    </div>


                </div>



            </div>
        @endforeach


        {{-- If No Appointment Data --}}
        @if (count($blogs) == 0)
            <div class="flex flex-col items-center h-[100vh]">

                <p class="mt-16 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">No Blogs Found
                </p>

            </div>
        @endif


        <div class="flex justify-center mt-8">
            <button wire:click="loadMore"
                class="px-8 py-2 bg-[#1A579F] text-white rounded-lg hover:scale-110 transition-all {{ count($blogs) == 0 ? 'hidden' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Load
                More...</button>
        </div>



    </main>





    {{-- Footer Element --}}
    @livewire('components.footer', [
        'theme_mode' => session('theme_mode'),
    ])





</div>
