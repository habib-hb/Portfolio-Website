<div
    class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }} ">

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


    @if (session()->has('patient_details'))
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-left">{{ session('patient_details') }}</p>

            </div>

            <button wire:click="clear_patient_details"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif

    {{-- End All Flash Messages --}}









    {{-- ********* Price Estimator ********** --}}
    <input id="estimated_price" type="hidden">
    <div class="relative">

        <div
            class="flex flex-row justify-between items-center mx-auto  md:max-w-[800px]   py-2 px-2 md:px-0  mt-2 w-full">

            <img src="{{ session('theme_mode') == 'light' ? asset('images/back_light_mode.png') : asset('images/back_dark_mode.png') }}"
                class="h-[48px] w-[48px] cursor-pointer hover:scale-105" onclick="window.history.back()" alt="">

            <h2 class="text-2xl text-center {{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }} ">
                Front End</h2>

            <div class="w-[48px]"></div>

        </div>

        <!-- Total Amount -->
        <div
            class="flex flex-col sticky top-2  justify-between items-center py-2 w-[96vw] md:max-w-[800px]  mx-auto rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">
            <p class="text-center px-4 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Please
                complete the form below to receive an accurate price estimation.</p>
            <p class="text-2xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Total Estimated
                Amount</p>
            <div>
                <img src="{{ asset('images/currency-mode-dollar.png') }}" wire:click="toggle_currency_mode" class="h-[36px] w-auto mt-2 cursor-pointer {{ $currency_mode == 'USD' ? '' : 'hidden' }}" alt="">
                <img src="{{ asset('images/currency-mode-taka.png') }}" wire:click="toggle_currency_mode" class="h-[36px] w-auto mt-2 cursor-pointer {{ $currency_mode == 'TK' ? '' : 'hidden' }}" alt="">
            </div>
            <p class="font-bold text-4xl {{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }} mt-2"
                id="totalAmount">{{ $total_estimated_amount * $currency_rate }} {{$currency_mode}}</p>
            {{-- <p class="font-bold text-4xl text-[#1A579F]" id="totalAmount">{{ $total_estimated_amount }}</p> --}}
        </div>




        <div
            class="flex flex-col w-full md:max-w-[800px] md:px-8  mx-auto  p-2  {{ $theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}  rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <!-- Project Type -->
            <div class="my-2">
                {{-- <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Treatment
                    Complexity</label> --}}
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Project Type</label>

                <select id="project_type"
                    class="w-full py-2  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} ">
                    <option value="150">Static Website: Simple HTML/CSS/JS with no dynamic content - {{150 * $currency_rate}}</option>
                    <option value="300">Dynamic Website: Frontend connected to APIs or backend - {{300 * $currency_rate}}</option>
                    <option value="500">Web Application: Interactive single-page applications (SPAs) - {{500 * $currency_rate}}</option>
                </select>

            </div>


            <!-- Design Integration -->
            <div class="my-2">
                <label class="text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Design Integration</label>
                <select id="design_integration"
                    class="w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">
                    <option value="50">Pre-designed Templates: Use a provided design (e.g., Figma or PSD) - {{50 * $currency_rate}}</option>
                    <option value="250">Custom Design: Create a new design and implement it (Pc focused) - {{250 * $currency_rate}} </option>
                    <option value="400">Responsive Design: Mobile-first approach with cross-device compatibility (Pc and Mobile) - {{400 * $currency_rate}}</option>
                </select>
            </div>


            <!-- Framework/Technology -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Framework/Technology</label>
                <select id="framework"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="50">HTML/CSS/JS Only: No frameworks, pure frontend code - {{50 * $currency_rate}}</option>
                    <option value="150">Frontend Frameworks: React, Next - {{150 * $currency_rate}}</option>
                    <option value="200">Libraries: Material UI, Ant Design, Recharts - {{200 * $currency_rate}}</option>

                </select>
            </div>


            <!-- Features and Functionality -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Features and Functionality</label>
                <select id="features"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="50">Basic Features: Navigation bar, forms, and static content - {{50 * $currency_rate}}</option>
                    <option value="150">Advanced Features: Animations, sliders, carousels, and modals - {{150 * $currency_rate}}</option>
                    <option value="250">Interactive Components: Filters, accordions, dropdowns, etc - {{250 * $currency_rate}}</option>

                </select>
            </div>



            <!-- Pages -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Pages</label>
                <select id="pages"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="50">Single Page: For a landing page or simple application - {{50 * $currency_rate}}</option>
                    <option value="150">Multiple Pages: Multi-page setup with a consistent design - {{150 * $currency_rate}}</option>
                    <option value="200">SPA: Single-page application with routing - {{200 * $currency_rate}}</option>

                </select>
            </div>



            <!-- Responsiveness -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Responsiveness</label>
                <select id="responsiveness"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="100">Desktop Only: Designed for desktop browsers - {{100 * $currency_rate}}
                    </option>
                    <option value="200">Tablet & Mobile: Includes responsive adjustments for smaller devices - {{200 * $currency_rate}}</option>
                    <option value="250">Cross-Browser Compatibility: Ensure functionality on major browsers - {{250 * $currency_rate}}</option>


                </select>
            </div>



            <!-- Animations -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Animations</label>
                <select id="animations"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="50">Basic Animations: Simple transitions and hover effects - {{50 * $currency_rate}}
                    </option>
                    <option value="150">Advanced Animations: Parallax effects, scroll animations, and complex transitions - {{150 * $currency_rate}}
                    </option>
                    <option value="300">3D Animations: Interactive 3D elements using libraries like Three.js - {{300 * $currency_rate}}
                    </option>


                </select>
            </div>



            <!-- Revisions -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Revisions</label>
                <select id="revisions"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="50">Limited Revisions: Fixed number of revisions - {{50 * $currency_rate}}</option>

                    <option value="150">Unlimited Revisions: Higher cost for flexibility - {{150 * $currency_rate}}</option>

                </select>
            </div>


            <!-- Timeline -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Timeline</label>
                <select id="timeline"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="0">Standard Delivery: Cost-effective, longer delivery time - {{0 * $currency_rate}}</option>

                    <option value="200">Express Delivery: Additional cost for quicker completion - {{200 * $currency_rate}}</option>

                </select>
            </div>




            <!-- Additional Services -->
            <div class="mb-4">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Additional
                    Services</label>

                <div class="flex items-center">
                    <input id="dark_mode_support" type="checkbox" value="300"
                        class="h-[20px] w-[20px] bg-[#deeaf8] rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  mr-2" />
                    <label for="dark_mode_support"
                        class=" {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Dark Mode Support
                        ({{300 * $currency_rate}})</label>
                </div>

                <div class="flex items-center mt-2">
                    <input id="hero_section_copywritting" type="checkbox" value="50"
                        class="h-[20px] w-[20px] bg-[#deeaf8] rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  mr-2" />
                    <label for="hero_section_copywritting"
                        class=" {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Hero Section Copywritting
                        ({{ 50 * $currency_rate }})</label>
                </div>

                <div class="flex items-center mt-2">
                    <input id="technical_business_consultancy" type="checkbox" value="150"
                        class="h-[20px] w-[20px] bg-[#deeaf8] rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  mr-2" />
                    <label for="technical_business_consultancy"
                        class=" {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Technical Business Consultancy ({{ 150 * $currency_rate }})</label>
                </div>
            </div>


        </div>

    </div>

    {{-- ********* End Price Estimator ********** --}}










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
                <p class="text-lg {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Patient
                    Details</p>
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

                <label for="age"
                    class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Age</label>

                <input wire:model="user_age" type="number" max="100" min="1"
                    class="w-[50vw] md:max-w-[100px] py-2   {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                    id="age">

            </div>



            <div class="flex flex-col mt-2">

                <label for="age"
                    class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Gender</label>

                <div class="flex flex-row gap-4 mt-2">

                    <button wire:click="selectedGender('male')"
                        class="h-[35px] w-[100px] rounded-lg {{ $clicked_gender == 'male' ? 'bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white') }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Male</button>

                    <button wire:click="selectedGender('female')"
                        class="h-[35px] w-[100px] rounded-lg {{ $clicked_gender == 'female' ? 'bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white') }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Female</button>

                </div>

            </div>



            <div class="flex flex-col mt-2">

                <label for="age"
                    class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Contact
                    Number</label>

                <input wire:model="user_phone" type="number"
                    class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                    id="phone">

            </div>


            <div class="flex flex-col mt-2">

                <label for="name"
                    class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Write Your
                    Problem</label>

                <textarea wire:model="user_problem" type="text"
                    class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                    id="problem" rows="4"></textarea>

            </div>


            {{-- Book Appointment Button --}}
            <button wire:click="bookAppointment"
                class="mt-8 px-8 py-2 w-[90vw] md:max-w-[300px] mx-auto rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all ">Book
                Appointment</button>


        </div>



    </div>



    {{-- ********* End Date Selector ********** --}}













    {{-- Footer Element --}}
    <div
        class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{ $theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon'
            src="{{ $theme_mode == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png') }}"
            class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt="">

        <p class=" text-center {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">All Rights Reserved
            @2024</p>

        <p class=" text-center {{ $theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">@valueadderhabib
        </p>

    </div>
    {{-- End Footer Element --}}










    <script>
        document.addEventListener('livewire:init', () => {

            calculateTotal();

            Livewire.on('patient_details_submitted', () => {

                document.getElementById('name').value = null;
                document.getElementById('age').value = null;
                document.getElementById('phone').value = null;
                document.getElementById('problem').value = null;

                window.location.reload();

            })

            // Livewire.on('estimated_price_load_consistency_root_canal_treatment', () => {

            //     setTimeout(() => {

            //         // calculateTotal();

            //         //The below operation is required because when the component reloads, the javascript value disappears
            //         totalAmountSpan.textContent = localStorage.getItem('total');


            //     }, 10);


            // })

        })


        // ***Price Estimation

        const project_type_select = document.getElementById('project_type');

        const design_integration_select = document.getElementById('design_integration');

        const framework_select = document.getElementById('framework');

        const features_select = document.getElementById('features');

        const pages_select = document.getElementById('pages');

        const responsiveness_select = document.getElementById('responsiveness');

        const animations_select = document.getElementById('animations');

        const revisions_select = document.getElementById('revisions');

        const timeline_select = document.getElementById('timeline');


        // const sessionsInput = document.getElementById('sessions');


        // Checkboxes
        const dark_mode_supportCheckbox = document.getElementById('dark_mode_support');

        const hero_section_copywrittingCheckbox = document.getElementById('hero_section_copywritting');

        const technical_business_consultancyCheckbox = document.getElementById('technical_business_consultancy');

        // Total Amount Element
        const totalAmountSpan = document.getElementById('totalAmount');

        // Function to calculate total price
        function calculateTotal() {

            // Base price from complexity
            let total = parseInt(project_type_select.value);

            if (design_integration_select.value) {
                total = parseInt(design_integration_select.value) + parseInt(project_type_select.value);
            }

            // if (affected_tooth_type_select.value) {
            //     total += parseInt(affected_tooth_type_select.value) * parseInt(number_of_affected_teeth_select.value);
            // }

            if (framework_select.value) {
                total += parseInt(framework_select.value);
            }

            if (features_select.value) {
                total += parseInt(features_select.value);
            }

            if (pages_select.value) {
                total += parseInt(pages_select.value);
            }

            if (responsiveness_select.value) {

                total += parseInt(responsiveness_select.value);

            }

            if (animations_select.value) {
                total += parseInt(animations_select.value);
            }

            if (revisions_select.value) {
                total += parseInt(revisions_select.value);
            }

            if (timeline_select.value) {
                total += parseInt(timeline_select.value);
            }

            // Multiply by number of sessions
            // total *= parseInt(sessionsInput.value);

            // Add optional services
            if (dark_mode_supportCheckbox.checked) {
                total += parseInt(dark_mode_supportCheckbox.value);
            }

            if (hero_section_copywrittingCheckbox.checked) {
                total += parseInt(hero_section_copywrittingCheckbox.value);
            }

            if (technical_business_consultancyCheckbox.checked) {
                total += parseInt(technical_business_consultancyCheckbox.value);
            }

            // Update total amount
            totalAmountSpan.textContent = total;

            localStorage.setItem('total', total);

            // Sending Data To backend
            setTimeout(() => {

                Livewire.dispatch('total_estimated_amount_root_canal_treatment', {
                    total: totalAmountSpan.textContent
                });

            }, 10);
            clearTimeout();

            //  document.getElementById('estimated_price').value = total;



        }

        // // Add event listeners to all inputs
        // complexitySelect.addEventListener('change', calculateTotal);

        // // affected_tooth_type_select.addEventListener('change', calculateTotal);

        // // number_of_affected_teeth_select.addEventListener('change', calculateTotal);

        // number_of_canals_select.addEventListener('change', calculateTotal);

        // location_of_tooth_select.addEventListener('change', calculateTotal);

        // anesthesia_type_select.addEventListener('change', calculateTotal);

        // additional_post_treatment_select.addEventListener('change', calculateTotal);

        // emergency_treatment_select.addEventListener('change', calculateTotal);

        // // sessionsInput.addEventListener('input', calculateTotal);

        // xrayCheckbox.addEventListener('change', calculateTotal);

        // cbctCheckbox.addEventListener('change', calculateTotal);

        // anesthesiaCheckbox.addEventListener('change', calculateTotal);
        // complexitySelect.addEventListener('change', calculateTotal);

        // design_requirements_select.addEventListener('change', calculateTotal);

        // frontend_features_select.addEventListener('change', calculateTotal);

        // backend_features_select.addEventListener('change', calculateTotal);

        // hosting_deployment_select.addEventListener('change', calculateTotal);

        // timeline_select.addEventListener('change', calculateTotal);

        // optional_add_ons_select.addEventListener('change', calculateTotal);

        // revisions_select.addEventListener('change', calculateTotal);

        // dark_mode_supportCheckbox.addEventListener('change', calculateTotal);

        // hero_section_copywrittingCheckbox.addEventListener('change', calculateTotal);

        // technical_business_consultancyCheckbox.addEventListener('change', calculateTotal);

        project_type_select.addEventListener('change', calculateTotal);

        design_integration_select.addEventListener('change', calculateTotal);

        framework_select.addEventListener('change', calculateTotal);

        features_select.addEventListener('change', calculateTotal);

        pages_select.addEventListener('change', calculateTotal);

        responsiveness_select.addEventListener('change', calculateTotal);

        animations_select.addEventListener('change', calculateTotal);

        revisions_select.addEventListener('change', calculateTotal);

        timeline_select.addEventListener('change', calculateTotal);

        dark_mode_supportCheckbox.addEventListener('change', calculateTotal);

        hero_section_copywrittingCheckbox.addEventListener('change', calculateTotal);

        technical_business_consultancyCheckbox.addEventListener('change', calculateTotal);




        // Initial calculation
        // calculateTotal();




        // ***End Price Estimation
    </script>



</div>
