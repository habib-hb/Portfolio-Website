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




    <!-- Show a loading spinner while Doing Date Processing -->

    <!-- Show a loading spinner while Doing Theme Change Processing -->
    <div wire:loading wire:target="changeThemeMode"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
        </div>


    </div>

    <div wire:loading wire:target="filter_option_button_clicked"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Filter Section...</span>
        </div>


    </div>




    {{-- Livewire Loading --}}
    <div id="filter_close_outside_clicking_loading"
        class="hidden  text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Filter Section...</span>
        </div>


    </div>


    <div id="filter_clear_loading"
        class="hidden  text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Clearing Filter...</span>
        </div>


    </div>


    <div id="filter_data_loading"
        class="hidden  text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Loading Filtered Data...</span>
        </div>


    </div>


    {{-- End Livewire Loading --}}


    <div wire:loading wire:target="loadMore"
        class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Loading More Date...</span>

        </div>
    </div>

    <div wire:loading wire:target="selectedGender"
        class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing...</span>

        </div>
    </div>


    <div wire:loading wire:target="markAsUnfulfilled"
        class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing...</span>

        </div>
    </div>


    <div wire:loading wire:target="markAsFulfilled"
        class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing...</span>

        </div>
    </div>


    @if ($notify_success)
        <div id="appointment_unfulfilled"
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px] bg-[#1A579F] py-4 rounded-lg z-10">
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



    {{-- @if (session()->has('appointment_fulfilled')) --}}

    @if ($notify_error)
        <div id="appointment_fulfilled"
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px] bg-red-800  py-4 rounded-lg z-10">
            <div class="flex flex-col justify-between items-center px-8">

                <p class="text-white text-3xl font-semibold">Message</p>

                {{-- <p class="text-white text-left">{{session('appointment_fulfilled')}}</p> --}}
                <p class="text-white text-center">{{ $notify_error }}</p>

            </div>

            {{-- <button onclick="document.getElementById('appointment_fulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

            <button wire:click="clear_notify_error"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif



    <h1
        class="text-2xl font-semibold text-center mt-4 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
        Contact Messages</h1>



    {{-- Appointment Data --}}
    <div class="mt-4 flex flex-col gap-4">

        @foreach ($all_contact_messages as $message)
            <div
                class="flex flex-col justify-center  items-center w-[96vw] md:max-w-[800px]  md:p-8 px-4 py-8  mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

                <h2
                    class="flex flex-row text-3xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    {{ $message['time'] }}</h2>
                <p
                    class="  flex flex-row text-lg {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    {{ $message['date'] }} </p>

                <p
                    class=" flex flex-row text-xl font-semibold mb-2  {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    Client Details</p>

                <p class=" flex flex-row  {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    <b>Name: &nbsp;</b>{{ $message['name'] }}
                </p>

                <p class=" flex flex-row  {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    <b>Email: &nbsp;</b>{{ $message['email'] }}
                </p>

                <p class=" flex flex-row  {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    <b>Phone: &nbsp;</b>{{ $message['phone'] }}
                </p>

                <p class=" flex flex-row  {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    <b>Message: &nbsp;</b>{{ $message['message'] }}
                </p>


            </div>
        @endforeach




        {{-- If No Appointment Data --}}
        @if (count($all_contact_messages) == 0)
            <div class="flex flex-col items-center h-[100vh]">

                <p class="mt-16 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">No Contact
                    Messages
                    Found</p>

            </div>
        @endif


    </div>





    <div class="flex justify-center mt-8">
        <button wire:click="loadMore"
            class="px-8 py-2 bg-[#1A579F] text-white rounded-lg hover:scale-110
transition-all  {{ count($all_contact_messages) == 0 ? 'hidden' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Load
            More...</button>
    </div>





    {{-- Footer Element --}}
    @livewire('components.footer', [
        'theme_mode' => session('theme_mode'),
    ])




    <script>
        document.addEventListener('livewire:initialized', () => {

            Livewire.on('alert-manager', () => {

                setTimeout(() => {

                    document.body.classList.contains('dark') ? document.body.classList.remove(
                        'dark') : document.body.classList.add('dark');

                }, 100);

            })

        })
    </script>






</div>
