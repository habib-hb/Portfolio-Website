<div
    class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}">

    <nav
        class="flex justify-center  items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-center items-center md:w-[20vw]">

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

    {{-- <div wire:click="changeThemeMode" class="flex justify-center">

                <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? '' : 'hidden'}}">

                <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? 'hidden' : ''}}">

            </div> --}}

    <div class="flex justify-center relative w-full max-w-[800px] mx-auto mt-6">
        <img src="{{ session('theme_mode') == 'light' ? asset('images/back_light_mode.png') : asset('images/back_dark_mode.png') }}"
            class="absolute left-1 md:left-0 h-[48px] w-[48px]  md:hover:scale-105 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard'" alt="">

        <img wire:click="changeThemeMode" src="{{ asset('images/light_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} md:hover:scale-105 transition-all cursor-pointer">

        <img wire:click="changeThemeMode" src="{{ asset('images/dark_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? 'hidden' : '' }} md:hover:scale-105 transition-all cursor-pointer">

    </div>



    {{-- Confirmation Widgets --}}
    @if ($appointment_deletable_id)
        <div id="appointment_unfulfilled"
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10">
            <div class="flex flex-col justify-between items-center px-8">

                <p class="text-white text-3xl font-semibold">Confirmation</p>

                {{-- <p class="text-white text-left">{{session('appointment_unfulfilled')}}</p> --}}
                <p class="text-white text-center">Are You Sure You Want To Delete This Appointment?</p>

            </div>

            {{-- <button onclick="document.getElementById('appointment_unfulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

            <div class="flex flex-row justify-between items-center py-4 gap-4">

                <button wire:click="delete_confirmed"
                    class="text-white border-2 border-white px-4 rounded-lg hover:scale-110">Delete</button>

                <button wire:click="clear_appointment_deletable_id"
                    class="text-white border-2 border-white px-4 rounded-lg hover:scale-110">Cancel</button>

            </div>




        </div>
    @endif


    {{-- End Confirmation Widgets --}}




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


    <div wire:loading wire:target="selectedGender"
        class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing...</span>

        </div>
    </div>


    <div wire:loading wire:target="settleSubmit"
        class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing...</span>

        </div>
    </div>



    <div wire:loading wire:target="delete_confirmed"
        class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing...</span>

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





    <!-- Show a loading spinner while Doing Date Processing -->
    <div wire:loading wire:target="loadMore"
        class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Loading More Date...</span>

        </div>
    </div>



    <!-- Date Processing Spinner -->
    <div wire:loading wire:target="currently_activated_panel"
        class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing...</span>

        </div>
    </div>



    <div wire:loading wire:target="selectedDate"
        class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Date...</span>

        </div>
    </div>






    <div wire:loading wire:target="selectedTime"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Time...</span>
        </div>

    </div>

    <!-- End Date Processing Spinner -->





    {{-- Messages --}}
    @if ($date_not_selected_notification)
        <div id="appointment_unfulfilled"
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10">
            <div class="flex flex-col justify-between items-center px-8">

                <p class="text-white text-3xl font-semibold">Date</p>

                {{-- <p class="text-white text-left">{{session('appointment_unfulfilled')}}</p> --}}
                <p class="text-white text-center">{{ $date_not_selected_notification }}</p>

            </div>

            {{-- <button onclick="document.getElementById('appointment_unfulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

            <button wire:click="clear_date_not_selected_notification"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>



        </div>
    @endif



    @if (session()->has('message'))
        <div id="appointment_unfulfilled"
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10">
            <div class="flex flex-col justify-between items-center px-8">

                <p class="text-white text-3xl font-semibold">Unavailable</p>

                {{-- <p class="text-white text-left">{{session('appointment_unfulfilled')}}</p> --}}
                <p class="text-white text-center">{{ session('message') }}</p>

            </div>

            {{-- <button onclick="document.getElementById('appointment_unfulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

            <button wire:click="clear_message"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>



        </div>
    @endif



    @if ($time_not_selected_notification)
        <div id="appointment_unfulfilled"
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10">
            <div class="flex flex-col justify-between items-center px-8">

                <p class="text-white text-3xl font-semibold">Time</p>

                {{-- <p class="text-white text-left">{{session('appointment_unfulfilled')}}</p> --}}
                <p class="text-white text-center">{{ $time_not_selected_notification }}</p>

            </div>

            {{-- <button onclick="document.getElementById('appointment_unfulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

            <button wire:click="clear_time_not_selected_notification"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>



        </div>
    @endif


    @if ($notification == 'No Filter Option Has Been Set')
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-left">{{ $notification }}</p>

            </div>

            <button wire:click="clear_notification"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110">Close</button>

        </div>
    @endif



    @if ($appointment_settled_notification)
        <div id="appointment_fulfilled"
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-col justify-between items-center px-8">

                <p class="text-white text-3xl font-semibold">Settled</p>

                {{-- <p class="text-white text-left">{{session('appointment_fulfilled')}}</p> --}}
                <p class="text-white text-center">{{ $appointment_settled_notification }}</p>

            </div>

            {{-- <button onclick="document.getElementById('appointment_fulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

            <button wire:click="clear_appointment_settled_notification"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif




    @if ($appointment_deleted_notification)
        <div id="appointment_fulfilled"
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10">
            <div class="flex flex-col justify-between items-center px-8">

                <p class="text-white text-3xl font-semibold">Deleted</p>

                {{-- <p class="text-white text-left">{{session('appointment_fulfilled')}}</p> --}}
                <p class="text-white text-center">{{ $appointment_deleted_notification }}</p>

            </div>

            {{-- <button onclick="document.getElementById('appointment_fulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

            <button wire:click="clear_appointment_deleted_notification"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif



    @if (session()->has('no_more_appointments'))
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-left">{{ session('no_more_appointments') }}</p>

            </div>

            <button wire:click="clear_no_more_appointments"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif

    {{-- End Messages --}}














    <h1
        class="text-2xl font-semibold text-center mt-4 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
        Unsettled Appointments</h1>




    {{-- Filter Button --}}
    <div class=" flex flex-col justify-center items-center">

        <button wire:click="filter_option_button_clicked"><img
                src="{{ $filtered ? asset('images/filtered_button.png') : (session('theme_mode') == 'light' ? asset('images/filter_button_light_mode.png') : asset('images/filter_button_dark_mode.png')) }}"
                class="w-[240px] mt-4 hover:scale-110 transition-all" alt=""></button>

        {{-- Filter Options Section --}}
        <div id="full_filter_options_panel"
            class=" {{ $filter_button_is_clicked ? '' : 'hidden' }} absolute top-24 left-1/2 translate-x-[-50%] w-[96vw] md:max-w-[500px] py-4 mt-4 border-8 {{ session('theme_mode') == 'light' ? 'border-[#d6e0ec] bg-[#EFF9FF]' : 'bg-[#1e1d1d] border-[#1e1d1d]' }} rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] px-4">
            <h2
                class="text-2xl font-semibold text-center {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Options</h2>

            <p class=" {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} mt-2">Filter By Date</p>
            <p class="{{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} text-sm opacity-50">
                Format(yyyy-mm-dd)</p>

            <div id="date-range-picker" date-rangepicker datepicker-format="yyyy-mm-dd"
                class="flex flex-col md:flex-row md:items-center">

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="datepicker-range-start" name="start" type="text"
                        class="date_selector bg-[#deeaf8]  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-[#202329]  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-none border-none   shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]"
                        placeholder="Select start date">
                </div>


                <span class="mx-4 text-gray-500">to</span>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="datepicker-range-end" name="end" type="text"
                        class="date_selector bg-[#deeaf8]  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-[#202329]  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-none border-none   shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]"
                        placeholder="Select end date">
                </div>
            </div>


            {{-- Dropdown Section --}}
            <p class="{{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} mt-4">Filter By Services
            </p>
            <div id="full_dropdown_section">


                <button id="dropdownCheckboxButton" onclick="toggleDropdownRotate()"
                    data-dropdown-toggle="dropdownDefaultCheckbox"
                    class="text-gray-500 bg-[#deeaf8]   font-medium rounded-lg text-sm px-5 py-2.5 text-center justify-center inline-flex items-center dark:text-slate-400 dark:bg-[#202329] w-full    shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]"
                    type="button">Services checkbox <svg id="dropdown_icon" class="w-2.5 h-2.5 ms-3 transition-all"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownDefaultCheckbox"
                    class="z-10 w-[90vw] md:w-[30vw] hidden border-8 {{ session('theme_mode') == 'light' ? 'border-[#d6e0ec] bg-[#EFF9FF]' : 'bg-[#1e1d1d] border-[#1e1d1d]' }} rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] px-2 divide-y divide-gray-100  dark:divide-gray-600">
                    <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownCheckboxButton">
                        <li>
                            <div class="flex items-center">
                                <input id="checkbox-all" onchange="check_all()" type="checkbox" value="All"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="checkbox-item-1"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">All</label>
                            </div>
                        </li>

                        @foreach ($services_name_array as $service)
                            <li>
                                <div class="flex items-center">
                                    <input id="{{ Str::lower(Str::replace(' ', '-', $service)) }}" type="checkbox"
                                        value="{{ $service }}"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="checkbox-item-2"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $service }}</label>
                                </div>
                            </li>
                        @endforeach


                    </ul>
                </div>
            </div>

            {{-- End Dropdown Section --}}



            {{-- Filter By Name --}}
            <div>

                <p class="{{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} mt-4">Filter By Name
                </p>


                <input wire:model="name_filter" type="text"
                    class=" bg-[#deeaf8]  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5  dark:bg-[#202329]  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-none border-none   shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]"
                    placeholder="Type Name">

            </div>
            {{-- End Filter By Name --}}



            {{-- Filter By Email --}}
            <div>

                <p class="{{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} mt-4">Filter By Email
                </p>


                <input wire:model="email_filter" type="text"
                    class=" bg-[#deeaf8]  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5  dark:bg-[#202329]  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-none border-none   shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]"
                    placeholder="Type Email">

            </div>
            {{-- End Filter By Email --}}





            {{-- Filter By Phone Number --}}

            <div class="flex flex-col mt-2">

                <label for="age"
                    class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Contact
                    Number</label>

                <input wire:model="filter_phone" type="number"
                    class="w-full md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                    id="phone">

            </div>

            {{-- End Filter By Phone Number --}}





            {{-- Filter By Estimated Fee --}}

            <div class="flex flex-col justify-center items-center w-full">

                <div class="flex justify-start items-start w-full">
                    <p class=" {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} mt-4">Filter By
                        Estimated Fee</p>
                </div>


                <div class="flex flex-row justify-center items-center md:justify-start gap-4 w-full">

                    <div class="flex flex-col justify-center items-center">


                        <input wire:model="min_estimated_filter" type="number"
                            class="w-[40vw] md:max-w-[100px] py-2   {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                            placeholder="Min">


                    </div>

                    <div class="flex flex-col justify-center items-center">

                        <input wire:model="max_estimated_filter" type="number"
                            class="w-[40vw] md:max-w-[100px] py-2   {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                            placeholder="Max">

                    </div>


                </div>

            </div>

            {{-- End Filter By Estimated Fee --}}



            <div class="flex flex-col justify-center items-center">

                <button
                    class="mt-4  bg-[#1A579F] hover:scale-110 transition-all text-white px-16 py-2 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
                    onclick="submitData()">Filter</button>


                <div class="flex gap-4 justify-center items-center">

                    <button
                        class="mt-4 bg-[#1A579F] hover:scale-110 transition-all text-white px-8 py-2 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
                        onclick="clear_filter()">Reset</button>

                    <button wire:click="filter_option_button_clicked"
                        class="mt-4 bg-[#1A579F] hover:scale-110 transition-all text-white px-8 py-2 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Close</button>

                </div>

            </div>



        </div>





    </div>

    {{-- End Filter Options Section --}}





    <div class="flex flex-col md:flex-row justify-center items-center gap-4 md:gap-8 my-8">
        <button
            class="px-4 w-[260px] py-2 bg-[#1A579F] text-white rounded-lg hover:scale-110
transition-all {{ count($all_appointments) == 0 ? 'hidden' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
            onclick="window.location.href='{{ env('BASE_LINK') }}/admin_dashboard/appointments'">Appointments<img
                src="{{ asset('images/external_link_dark_mode.png') }}" class="inline -mt-1"
                alt="" /></button>

        <button
            class="px-4 w-[260px]  py-2 bg-red-800 text-white rounded-lg hover:scale-110 transition-all  {{ count($all_appointments) == 0 ? 'hidden' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
            onclick="window.location.href='{{ env('BASE_LINK') }}/admin_dashboard/appointments/unfulfilled_appointments'">Unfulfilled
            Appointments<img src="{{ asset('images/external_link_dark_mode.png') }}" class="inline -mt-1"
                alt="" /></button>

        <button
            class="px-4 w-[260px] py-2 bg-[#1A579F] text-white rounded-lg hover:scale-110
transition-all {{ count($all_appointments) == 0 ? 'hidden' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
            onclick="window.location.href='{{ env('BASE_LINK') }}/admin_dashboard/appointments/fulfilled_appointments'">Fulfilled
            Appointments<img src="{{ asset('images/external_link_dark_mode.png') }}" class="inline -mt-1"
                alt="" /></button>
    </div>






    {{-- Appointment Data --}}
    <div class="mt-4 flex flex-col gap-4">

        @foreach ($all_appointments as $appointment)
            <div
                class="flex flex-col justify-center  items-center w-[96vw]  md:max-w-[800px]  md:p-8 px-4 py-8  mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] {{ in_array($appointment['booked_client_id'], $appointment_settled_selected_id) || in_array($appointment['booked_client_id'], $appointment_deleted_selected_id) ? 'hidden' : '' }}">

                <h2
                    class="flex flex-row text-3xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    {{ $appointment['appointment_time'] }}</h2>
                <p class="flex flex-row text-lg {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    {{ \Carbon\Carbon::parse($appointment['appointment_date'])->format('jS F, Y') }}</p>

                <p
                    class="flex flex-row text-2xl font-semibold py-4 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    {{ $appointment['service_name'] ? $appointment['service_name'] : 'Not Entered' }}</p>

                <p
                    class="flex flex-row text-xl font-semibold mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    Client Details</p>

                <p class="flex flex-row  {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    <b>Name: &nbsp;</b>{{ $appointment['name'] }}
                </p>

                <p class=" flex flex-row  {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    <b>Email: &nbsp;</b>{{ $appointment['email'] }}
                </p>

                <p class="flex flex-row  {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    <b>Phone: &nbsp;</b>{{ $appointment['contact_number'] }}
                </p>

                <p class=" flex flex-row  {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    <b>Address: &nbsp;</b>{{ $appointment['address'] ? $appointment['address'] : 'Not Available' }}
                </p>

                <p class=" flex flex-row  {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                    <b>Description: &nbsp;</b>{{ $appointment['written_need'] }}
                </p>

                <p
                    class="flex flex-row  {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }} mt-4 text-lg">
                    <b>Estimated Fee:&nbsp;
                    </b>{{ $appointment['estimated_price'] ? $appointment['estimated_price'] : 'Not Available' }}
                </p>



                <div class="flex flex-col md:flex-row justify-center gap-4 mt-4">
                    <button wire:click="currently_activated_panel({{ $appointment['booked_client_id'] }})"
                        class="px-4 py-2 w-[220px] bg-[#1A579F] text-white rounded-lg hover:scale-110 transition-all  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Settle
                        Appointment <img src="{{ asset('images/press_down.png') }}"
                            class="w-[14px] inline -mt-1 {{ $currently_activated_panel_id == $appointment['booked_client_id'] ? 'rotate-180' : 'rotate-0' }}  transition-all" /></button>

                    <button
                        wire:click="delete_appointment({{ $appointment['booked_client_id'] }}, '{{ $appointment['appointment_date'] }}', '{{ $appointment['appointment_time'] }}')"
                        class="px-4 py-2 w-[200px] bg-red-800 text-white rounded-lg hover:scale-110 transition-all  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Delete
                        Appointment</button>

                </div>



                {{-- Settle Appointment Panel --}}

                <div
                    class="{{ $currently_activated_panel_id == $appointment['booked_client_id'] ? '' : 'hidden' }} mt-8">

                    <div class="flex flex-row justify-start md:justify-center w-[100%]">
                        <p
                            class="text-lg md:text-center {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                            Please Select A Date : {{ $select_date_string }}</p>
                    </div>




                    {{-- Dates Cards --}}
                    <div class="flex flex-row flex-wrap gap-2 justify-center w-[100%] md:max-w-[800px] md:gap-4 mt-2">


                        @foreach ($datesArray as $dates)
                            <div wire:click="selectedDate('{{ $dates['identifier'] }}')"
                                class="flex flex-col justify-center items-center h-[90px] w-[18%] {{ $clicked_date == $dates['identifier'] ? 'bg-[#1A579F]' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8]' : 'bg-[#202329]') }}   rounded-lg mb-1   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-105 transition-all cursor-pointer">

                                <p
                                    class="text-3xl {{ $clicked_date == $dates['identifier'] ? 'text-white' : (session('theme_mode') == 'light' ? 'text-[#6B779A]' : 'text-white') }}">
                                    {{ $dates['day'] }}</p>

                                <p
                                    class="text-sm  {{ $clicked_date == $dates['identifier'] ? 'text-white' : (session('theme_mode') == 'light' ? 'text-[#6B779A]' : 'text-white') }}">
                                    {{ $dates['day_name_abbr'] }}</p>

                            </div>
                        @endforeach



                    </div>



                    {{-- Times Section --}}
                    <div class="mt-8 {{ $clicked_date == '' ? 'hidden' : '' }}">


                        <h2
                            class="text-2xl text-center my-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                            Please Select A Time</h2>
                        <div>

                            @foreach ($timesArray as $time)
                                @if (in_array($time, $bookedTimesArray))
                                    <p wire:click="timeBookedAlert('{{ $time }}')"
                                        class="text-center p-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8]' : 'bg-[#505050] text-[#d3d3d3]' }}   mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] opacity-20 ">
                                        {{ $time }}</p>
                                @else
                                    <p wire:click="selectedTime('{{ $time }}')"
                                        class="text-center p-2 {{ $clicked_time == $time ? 'bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white') }}  mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]  hover:scale-105 transition-all cursor-pointer">
                                        {{ $time }}</p>
                                @endif
                            @endforeach

                        </div>

                    </div>



                    <div class="flex flex-col justify-center items-center mt-8">
                        <button wire:click="settleSubmit"
                            class="px-16 py-2 bg-[#1A579F] text-white rounded-lg hover:scale-110 transition-all {{ count($all_appointments) == 0 ? 'hidden' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Settle</button>
                    </div>


                </div>

                {{-- End Settle Appointment Panel --}}







            </div>
        @endforeach




        {{-- If No Appointment Data --}}
        @if (count($all_appointments) == 0)
            <div class="flex flex-col items-center h-[100vh]">

                <p class="mt-16 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">No Appointments
                    Found</p>

            </div>
        @endif


    </div>


    <div class="flex justify-center mt-8">
        <button wire:click="loadMore"
            class="px-8 py-2 bg-[#1A579F] text-white rounded-lg hover:scale-110
 transition-all  {{ count($all_appointments) == 0 ? 'hidden' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Load
            More...</button>
    </div>





    {{-- Bottom Buttons --}}
    <div class="flex flex-col md:flex-row justify-center items-center gap-4 md:gap-8 mt-16">
        <button
            class="px-4 w-[260px] py-2 bg-[#1A579F] text-white rounded-lg hover:scale-110
transition-all {{ count($all_appointments) == 0 ? 'hidden' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
            onclick="window.location.href='{{ env('BASE_LINK') }}/admin_dashboard/appointments'">Appointments<img
                src="{{ asset('images/external_link_dark_mode.png') }}" class="inline -mt-1"
                alt="" /></button>

        <button
            class="px-4 w-[260px]  py-2 bg-red-800 text-white rounded-lg hover:scale-110 transition-all  {{ count($all_appointments) == 0 ? 'hidden' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
            onclick="window.location.href='{{ env('BASE_LINK') }}/admin_dashboard/appointments/unfulfilled_appointments'">Unfulfilled
            Appointments<img src="{{ asset('images/external_link_dark_mode.png') }}" class="inline -mt-1"
                alt="" /></button>

        <button
            class="px-4 w-[260px] py-2 bg-[#1A579F] text-white rounded-lg hover:scale-110
transition-all {{ count($all_appointments) == 0 ? 'hidden' : '' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
            onclick="window.location.href='{{ env('BASE_LINK') }}/admin_dashboard/appointments/fulfilled_appointments'">Fulfilled
            Appointments<img src="{{ asset('images/external_link_dark_mode.png') }}" class="inline -mt-1"
                alt="" /></button>
    </div>




    {{-- Footer Element --}}
    <div
        class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-16 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon'
            src="{{ session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png') }}"
            class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt="">

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">All
            Rights Reserved @2024</p>

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            @valueadderhabib</p>

    </div>






    <script>
        document.addEventListener('livewire:initialized', () => {

            Livewire.on('alert-manager', () => {

                setTimeout(() => {

                    document.body.classList.contains('dark') ? document.body.classList.remove(
                        'dark') : document.body.classList.add('dark');

                }, 100);

            })

        })


        let submitData = () => {

            let start_date_value = document.getElementById('datepicker-range-start').value;

            let end_date_value = document.getElementById('datepicker-range-end').value;

            let selected_services = [];

            let all_available_checkboxes = @json($services_name_array_json);

            all_available_checkboxes = JSON.parse(all_available_checkboxes);


            all_available_checkboxes.forEach(item => {

                document.getElementById(item.toLowerCase().replace(/ /g, '-')).checked == true ?
                    selected_services.push(item) : '';

            })

            // document.getElementById('checkbox-item-1').checked == true ? selected_services.push(
            //     'Root Canal Treatment') : '';
            // document.getElementById('checkbox-item-2').checked == true ? selected_services.push('Cosmetic Dentistry') :
            //     '';
            // document.getElementById('checkbox-item-3').checked == true ? selected_services.push('Dental Implants') : '';
            // document.getElementById('checkbox-item-4').checked == true ? selected_services.push('Teeth Whitening') : '';
            // document.getElementById('checkbox-item-5').checked == true ? selected_services.push('Emergency Dentistry') :
            //     '';
            // document.getElementById('checkbox-item-6').checked == true ? selected_services.push('Prevention') : '';
            // document.getElementById('checkbox-item-7').checked == true ? selected_services.push('Consultation') : '';


            document.getElementById('filter_data_loading').classList.remove('hidden');

            Livewire.dispatch('save_data', {
                start_date: start_date_value,
                end_date: end_date_value,
                selected_services: selected_services
            });

        }


        let check_all = () => {

            if (document.getElementById('checkbox-all').checked == false) {

                let all_available_checkboxes = @json($services_name_array_json);

                all_available_checkboxes = JSON.parse(all_available_checkboxes);

                all_available_checkboxes.forEach(item => {

                    document.getElementById(item.toLowerCase().replace(/ /g, '-')).checked = false;

                })

                // document.getElementById('checkbox-item-1').checked = false;
                // document.getElementById('checkbox-item-2').checked = false;
                // document.getElementById('checkbox-item-3').checked = false;
                // document.getElementById('checkbox-item-4').checked = false;
                // document.getElementById('checkbox-item-5').checked = false;
                // document.getElementById('checkbox-item-6').checked = false;
                // document.getElementById('checkbox-item-7').checked = false;

            } else {

                let all_available_checkboxes = @json($services_name_array_json);

                all_available_checkboxes = JSON.parse(all_available_checkboxes);


                all_available_checkboxes.forEach(item => {

                    document.getElementById(item.toLowerCase().replace(/ /g, '-')).checked = true;

                })

                // document.getElementById('checkbox-item-1').checked = true;
                // document.getElementById('checkbox-item-2').checked = true;
                // document.getElementById('checkbox-item-3').checked = true;
                // document.getElementById('checkbox-item-4').checked = true;
                // document.getElementById('checkbox-item-5').checked = true;
                // document.getElementById('checkbox-item-6').checked = true;
                // document.getElementById('checkbox-item-7').checked = true;

            }

        }



        let toggleDropdownRotate = () => {

            document.getElementById('dropdown_icon').classList.toggle('rotate-180');

        }



        let clear_filter = () => {

            let all_available_checkboxes = @json($services_name_array_json);

            all_available_checkboxes = JSON.parse(all_available_checkboxes);

            all_available_checkboxes.forEach(item => {

                document.getElementById(item.toLowerCase().replace(/ /g, '-')).checked = false;

            })


            // document.getElementById('checkbox-item-1').checked = false;
            // document.getElementById('checkbox-item-2').checked = false;
            // document.getElementById('checkbox-item-3').checked = false;
            // document.getElementById('checkbox-item-4').checked = false;
            // document.getElementById('checkbox-item-5').checked = false;
            // document.getElementById('checkbox-item-6').checked = false;
            // document.getElementById('checkbox-item-7').checked = false;
            document.getElementById('checkbox-all').checked = false;


            document.getElementById('datepicker-range-start').value = '';
            document.getElementById('datepicker-range-end').value = '';

            document.getElementById('filter_clear_loading').classList.remove('hidden');



            Livewire.dispatch('clear_data', {});


        }



        // Section For Dropdown Management when user clicks outside of the dropdown
        const dropdown = document.getElementById('full_dropdown_section');

        // Function to handle clicks outside the dropdown
        document.addEventListener('click', function(event) {
            const isClickInside = dropdown.contains(event.target);

            // If the click is outside the dropdown, perform an action
            if (!isClickInside) {

                if (document.getElementById('dropdown_icon').classList.contains('rotate-180')) {

                    document.getElementById('dropdown_icon').classList.remove('rotate-180');

                };

            }
        });




        // Section For full_filter_options_panel Management when user clicks outside of the dropdown
        const full_filter_options_panel = document.getElementById('full_filter_options_panel');

        // Function to handle clicks outside the dropdown
        document.addEventListener('click', function(event) {
            const isClickInside = full_filter_options_panel.contains(event.target);




            // If the click is outside the dropdown, perform an action
            if (!isClickInside && document.getElementById('datepicker-range-start') !== document.activeElement &&
                document.getElementById('datepicker-range-end') !== document.activeElement) {

                if (!document.getElementById('full_filter_options_panel').classList.contains('hidden')) {

                    document.getElementById('filter_close_outside_clicking_loading').classList.remove('hidden');

                    Livewire.dispatch('hide_filter_section', {});

                }

            }

        });
    </script>






</div>
