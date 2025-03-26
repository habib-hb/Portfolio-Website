<div
    class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }} ">

    <nav
        class="flex justify-center items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-start cursor-pointer">

            <img src="{{ $site_logo_light }}"
                class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} cursor-pointer"
                onclick="window.location.href='/'" alt="" cursor-data-color="#1A579F">

            <img src="{{ $site_logo_dark }}"
                class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? 'hidden' : '' }} cursor-pointer"
                onclick="window.location.href='/'" alt="" cursor-data-color="#1A579F">


        </div>




    </nav>


    <div class="flex justify-center relative w-full max-w-[800px] mx-auto mt-6">
        <img src="{{session('theme_mode') == 'light' ? asset('images/back_light_mode.png') : asset('images/back_dark_mode.png')}}" class="absolute left-1 md:left-0 h-[48px] w-[48px]  md:hover:scale-105 transition-all cursor-pointer" onclick="window.history.back()" alt="">

        <img wire:click="changeThemeMode" src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? '' : 'hidden'}} md:hover:scale-105 transition-all cursor-pointer" cursor-data-color="#1A579F">

        <img wire:click="changeThemeMode" src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? 'hidden' : ''}} md:hover:scale-105 transition-all cursor-pointer" cursor-data-color="#1A579F">

    </div>


    <!-- Show a loading spinner while Doing Theme Change Processing -->
    <div wire:loading wire:target="changeThemeMode"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
        </div>


    </div>
    {{-- End Loaders --}}


    {{-- All The Looading Notifications --}}

    <!-- Show a loading spinner while Doing Date Processing -->
    <div wire:loading wire:target="selectedDate"
        class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
        <div class="flex flex-row justify-center items-center px-2 gap-2">

            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Date...</span>

        </div>
    </div>





    <!-- Show a loading spinner while Doing Time Processing -->
    <div wire:loading wire:target="selectedTime"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Time...</span>
        </div>

    </div>



    <!-- Show a loading spinner while Doing Gender Selection Processing -->
    <div wire:loading wire:target="selectedGender"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Gender Details...</span>
        </div>


    </div>


    <div wire:loading wire:target="toggle_currency_mode"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Changing Currency...</span>
        </div>


    </div>



    <div wire:loading wire:target="bookAppointment"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Appointment...</span>
        </div>


    </div>


    <div id="price_estimation_loading"
        class="hidden text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Price...</span>
        </div>


    </div>

    {{-- End All The Looading Notifications --}}


    {{-- All Flash Messages --}}


    @if (session()->has('message'))
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit mx-auto w-[90%] max-w-[400px]  bg-[#9f1a1a] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">

                <p class="text-white text-center">{{ session('message') }}</p>

            </div>

            <button wire:click="clearMessage"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif


    @if (session()->has('client_details'))
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-left">{{ session('client_details') }}</p>

            </div>

            <button wire:click="clear_client_details"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif

    {{-- End All Flash Messages --}}









    {{-- ********* Price Estimator ********** --}}
    <input id="estimated_price" type="hidden">
    <div class="relative">

        <div
            class="flex flex-row justify-center items-center mx-auto  md:max-w-[800px]   py-2 px-2 md:px-0  mt-2 w-full">



            <h2 class="text-4xl my-2 font-bold text-center {{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }} ">
                {{ $service_name }}</h2>



        </div>

        <!-- Total Amount -->
        <div
            class="flex flex-col sticky top-2  justify-between items-center py-2 w-[96vw] md:max-w-[800px]  mx-auto rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">
            <p class="text-center px-4 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">{{ $price_estimation_page_caption }}</p>
            <p class="text-2xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Total Estimated
                Amount</p>
            <div>
                <img src="{{ asset('images/currency-mode-dollar.png') }}" wire:click="toggle_currency_mode"
                    class="h-[36px] w-auto mt-2 cursor-pointer {{ $currency_mode == 'USD' ? '' : 'hidden' }} "
                    alt="" cursor-data-color="#1A579F">
                <img src="{{ asset('images/currency-mode-taka.png') }}" wire:click="toggle_currency_mode"
                    class="h-[36px] w-auto mt-2 cursor-pointer {{ $currency_mode == 'TK' ? '' : 'hidden' }} "
                    alt="" cursor-data-color="#1A579F">
            </div>
            <p class="font-bold text-4xl {{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }} mt-2"
                id="totalAmount">{{ $total_estimated_amount * $currency_rate }} {{ $currency_mode }}</p>
            {{-- <p class="font-bold text-4xl {{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }} mt-2"
                id="totalAmount">{{ $total_estimated_amount * $currency_rate }} {{ $currency_mode }}</p> --}}
            {{-- <p class="font-bold text-4xl text-[#1A579F]" id="totalAmount">{{ $total_estimated_amount }}</p> --}}
        </div>




        <div
            class="flex flex-col w-full md:max-w-[800px] md:px-8  mx-auto  p-2  {{ $theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}  rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            @foreach ($estimate_options as $element)
                @if (isset($element['options']))
                    <div class="my-2">
                        <label
                            class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">{{ $element['title'] }}</label>

                        <select id="{{ $element['id_name'] }}"
                            class="w-full md:max-w-[800px] py-2  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} ">
                            {{-- <option value="150">Blog: Simple blogging platform - {{ 150 * $currency_rate }}</option>
                        <option value="300">Business Website: Corporate or portfolio site - {{ 300 * $currency_rate }}
                        </option>
                        <option value="500">E-Commerce: Online store with WooCommerce integration -
                            {{ 500 * $currency_rate }}</option>
                        <option value="700">Custom Website: Tailored features and functionalities -
                            {{ 700 * $currency_rate }}</option> --}}
                            @foreach ($element['options'] as $option)
                                <option class="w-full md:max-w-[800px]" value="{{ $option['option_value'] }}">
                                    <p class="w-full md:max-w-[800px] line-clamp-1">{{ \Illuminate\Support\Str::limit($option['option_name'], 80, '...') }} -
                                        {{ $option['option_value'] * $currency_rate }}</p>
                                </option>
                            @endforeach
                        </select>

                    </div>
                @endif
            @endforeach

            <div class="mb-4">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Additional
                    Services</label>

                @foreach ($estimate_options as $element)
                    @if (isset($element['option']))
                        <div class="flex items-center">
                            <input id="{{ $element['id_name'] }}" type="checkbox"
                                value="{{ $element['option']['checkbox_value'] }}"
                                class="h-[20px] w-[20px] bg-[#deeaf8] rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  mr-2" />
                            <label for="{{ $element['id_name'] }}"
                                class=" {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">{{ $element['option']['checkbox_name'] }}
                                ({{ $element['option']['checkbox_value'] * $currency_rate }})
                            </label>
                        </div>
                    @endif
                @endforeach



                <!-- Additional Services -->



            </div>

        </div>

    </div>

    {{-- ********* End Price Estimator ********** --}}







    <div class="flex flex-col items-center">
        <button
            class="mt-10 px-8 py-2 w-[90vw] md:max-w-[300px] mx-auto rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all "
            onclick="window.location.href='/contact'"><a href="{{ env('BASE_LINK') }}/contact"
                cursor-data-color="#1A579F">Contact Me</a></button>
    </div>

    <div class="flex flex-col justify-center mt-8  md:max-w-[1280px]  mx-auto">
        <p
            class="text-[16px] md:max-w-[80%] block mx-auto mt-2 text-center px-4 {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            If you'd like to have a long discussion with me, please book an appointment below</p>

    </div>








    {{-- ********* Date Selector ********** --}}
    <h2
        class="text-2xl md:text-4xl text-center {{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }}   w-[90vw] mx-auto  py-2 px-4 rounded-lg mt-8">
        Appointment</h2>


    <div class="flex flex-col justify-center items-center mt-2 p-2">

        <div class="flex flex-row justify-start md:justify-center w-[100%]">
            <p class="text-lg md:text-center {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
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


        {{-- Patient Details Section --}}
        <div class="flex flex-col w-full md:max-w-[800px] md:p-8  mt-8">


            <div class="flex flex-row justify-start md:justify-center w-[100%]">
                <p class="text-lg {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Please Enter The Details Below</p>
            </div>

            <div class="flex flex-col mt-2">

                <label for="name"
                    class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Full
                    Name</label>

                <input wire:model="user_name" type="text"
                    class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                    id="name">

            </div>



            <div class="flex flex-col mt-2">

                <label for="email"
                    class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Email</label>

                <input wire:model="user_email" type="email"
                    class="w-[96vw] md:max-w-full py-2   {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                    id="email">

            </div>




            <div class="flex flex-col mt-2">

                <label for="phone"
                    class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Contact
                    Number</label>

                <input wire:model="user_phone" type="number"
                    class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                    id="phone">

            </div>


            <div class="flex flex-col mt-2">

                <label for="address"
                    class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Address (Optional)</label>

                <textarea wire:model="user_address" type="text"
                    class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                    id="address" rows="4"></textarea>

            </div>

            <div class="flex flex-col mt-2">

                <label for="describe"
                    class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Describe
                    Your
                    Needs</label>

                <textarea wire:model="user_needs" type="text"
                    class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                    id="describe" rows="4"></textarea>

            </div>


            {{-- Book Appointment Button --}}
            <button wire:click="bookAppointment"
                class="mt-8 px-8 py-2 w-[90vw] md:max-w-[300px] mx-auto rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all ">Book
                Appointment</button>


        </div>



    </div>



    {{-- ********* End Date Selector ********** --}}






    {{-- <p>{{ $estimate_options_json }}</p> --}}






    {{-- Footer Element --}}
    <div
        class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon'
            src="{{ $theme_mode == 'light' ? $footer_logo_light : $footer_logo_dark }}"
            class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt="" cursor-data-color="#1A579F">

        <p class=" text-center {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">{{ $footer_top_layer_text }}</p>

        <p class=" text-center {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            {{ $footer_bottom_layer_text }}
        </p>

    </div>
    {{-- End Footer Element --}}










    <script>
        document.addEventListener('livewire:init', () => {

            calculateTotal();

            Livewire.on('client_details_submitted', () => {

                document.getElementById('name').value = null;
                document.getElementById('email').value = null;
                document.getElementById('phone').value = null;
                document.getElementById('address').value = null;
                document.getElementById('describe').value = null;

                window.location.reload();

            })

        })


        const estimateOptionsJson = @json($estimate_options_json);
        const estimateOptions = JSON.parse(estimateOptionsJson);




        // Total Amount Element
        const totalAmountSpan = document.getElementById('totalAmount');

        let first_load_check = true;

        // Function to calculate total price
        function calculateTotal() {
            !first_load_check && document.getElementById('price_estimation_loading').classList.remove('hidden');

            first_load_check = false;

            let total = 0;

            estimateOptions.forEach(option => {

                if (option.type === 'select') {

                    if (document.getElementById(option.id_name).value) {

                        total += parseInt(document.getElementById(option.id_name).value);

                    }
                }

                if (option.type === 'checkbox') {

                    if (document.getElementById(option.id_name).checked) {

                        total += parseInt(document.getElementById(option.id_name).value);

                    }
                }
            })

            // Update total amount
            // totalAmountSpan.textContent = total + ' ' + @json($currency_mode)

            localStorage.setItem('total', total);

            // Sending Data To backend
            setTimeout(() => {

                Livewire.dispatch('total_estimated_amount_root_canal_treatment', {
                    total: total
                });

            }, 10);
            clearTimeout();

            return

        }



        estimateOptions.forEach(option => {

            if (option.type === 'select') {

                document.getElementById(option.id_name).addEventListener('change', calculateTotal);

            }

            if (option.type === 'checkbox') {

                document.getElementById(option.id_name).addEventListener('change', calculateTotal);

            }
        })

        // ***End Price Estimation
    </script>



</div>
