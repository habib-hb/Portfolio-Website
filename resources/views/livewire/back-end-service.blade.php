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
                Back End</h2>

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
                <label class="text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Project Type</label>
                <select id="project_type"
                    class="w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">
                    <option value="200">Basic API: Simple API for fetching and storing data - {{200 * $currency_rate}}</option>
                    <option value="300">Web Application Backend: For dynamic websites or SPAs - {{300 * $currency_rate}} </option>
                    <option value="400">Enterprise Backend: Scalable backend with multiple integrations and microservices - {{400 * $currency_rate}}</option>
                </select>
            </div>


            <!-- Authentication and Authorization -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Authentication and Authorization</label>
                <select id="authentication"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="100">Basic Authentication: Email/password or social logins - {{100 * $currency_rate}}</option>
                    <option value="200">Role-Based Access Control (RBAC): Admin, user, and custom roles - {{200 * $currency_rate}}</option>
                    <option value="300">Advanced Security: Multi-factor authentication (MFA), CAPTCHA, etc - {{300 * $currency_rate}}</option>

                </select>
            </div>


            <!-- Database -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Database</label>
                <select id="database"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="50">Simple Database: Basic CRUD operations - {{50 * $currency_rate}}</option>
                    <option value="100">Schema Design: Simple schema with simple relationships - {{100 * $currency_rate}}</option>
                    <option value="200">Advanced Database: Complex schema with advanced relationships - {{200 * $currency_rate}}</option>

                </select>
            </div>



            <!-- Features -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Features</label>
                <select id="features"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="0">CRUD Operations: Basic Create, Read, Update, Delete operations - {{0 * $currency_rate}}</option>
                    <option value="150">Advanced Features: File uploads, search functionality, filters, etc - {{150 * $currency_rate}}</option>
                    <option value="250">Real-Time Functionality: WebSockets or push notifications - {{250 * $currency_rate}}</option>

                </select>
            </div>



            <!-- API Development -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">API Development</label>
                <select id="api_development"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="50">Basic API: RESTful endpoints for basic CRUD operations - {{50 * $currency_rate}}
                    </option>
                    <option value="200">Advanced API: Complex endpoints, rate limiting, and pagination - {{200 * $currency_rate}}</option>
                    <option value="300">GraphQL API: Flexible query and mutation support - {{300 * $currency_rate}}</option>


                </select>
            </div>



            <!-- Integrations -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Integrations</label>
                <select id="integrations"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">


                    <option value="100">External APIs: Social media APIs, Google Maps, etc - {{100 * $currency_rate}}
                    </option>
                    <option value="200">Third-Party Services: Payment gateways (Stripe, PayPal), email services (Brevo, Mailgun) - {{200 * $currency_rate}}
                    </option>
                    <option value="250">Custom Integrations: Unique services based on client needs - {{250 * $currency_rate}}
                    </option>


                </select>
            </div>



            <!-- Scalability and Performance -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Scalability and Performance</label>
                <select id="scalability_and_performance"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="50">Basic Performance: For small-scale projects - {{50 * $currency_rate}}</option>

                    <option value="150">Optimized Performance: Caching, database indexing, and optimized queries - {{150 * $currency_rate}}</option>

                    <option value="350">Scalable Backend: Load balancing, microservices, and containerization - {{350 * $currency_rate}}</option>

                </select>
            </div>


            <!-- Admin Panel -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Admin Panel</label>
                <select id="admin_panel"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="100">Basic Panel: User management and content updates - {{100 * $currency_rate}}</option>

                    <option value="250">Advanced Panel: Analytics, reports, and detailed settings - {{250 * $currency_rate}}</option>

                    <option value="350">Custom Panel: Fully tailored admin dashboard - {{350 * $currency_rate}}</option>

                </select>
            </div>


            <!-- Hosting and Deployment -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Hosting and Deployment</label>
                <select id="hosting_and_deployment"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="100">Self Hosting: AWS, DigitalOcean, or Google Cloud setup - {{100 * $currency_rate}}</option>

                    <option value="250">Monthly Package: Monthly subscription for hosting and maintainance - {{250 * $currency_rate}}</option>

                </select>
            </div>


            <!-- Timeline -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Timeline</label>
                <select id="timeline"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="0">Standard Delivery: Normal development time - {{0 * $currency_rate}}</option>

                    <option value="250">Express Delivery: Faster completion at a premium cost - {{200 * $currency_rate}}</option>

                </select>
            </div>


            <!-- Revisions and Maintenance -->
            <div class="my-2">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Revisions and Maintenance</label>
                <select id="revisions_and_maintenance"
                    class="w-full py-2  {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2">

                    <option value="50">Fixed Revisions: Limited changes after delivery - {{50 * $currency_rate}}</option>

                    <option value="150">Flexible Revisions: Unlimited updates during the development phase - {{150 * $currency_rate}}</option>

                    <option value="200">Maintenance Plan: Includes monthly or yearly backend support - {{200 * $currency_rate}}</option>

                </select>
            </div>




            <!-- Additional Services -->
            <div class="mb-4">
                <label
                    class=" text-lg mb-2 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Additional
                    Services</label>

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

        const authentication_select = document.getElementById('authentication');

        const database_select = document.getElementById('database');

        const features_select = document.getElementById('features');

        const api_development_select = document.getElementById('api_development');

        const integrations_select = document.getElementById('integrations');

        const scalability_and_performance_select = document.getElementById('scalability_and_performance');

        const admin_panel_select = document.getElementById('admin_panel');

        const hosting_and_deployment_select = document.getElementById('hosting_and_deployment');

        const timeline_select = document.getElementById('timeline');

        const revisions_and_maintenance_select = document.getElementById('revisions_and_maintenance');


        // const sessionsInput = document.getElementById('sessions');


        // Checkboxes
        const technical_business_consultancyCheckbox = document.getElementById('technical_business_consultancy');

        // Total Amount Element
        const totalAmountSpan = document.getElementById('totalAmount');

        // Function to calculate total price
        function calculateTotal() {

            // Base price from complexity
            let total = parseInt(project_type_select.value);

            if (authentication_select.value) {
                total = parseInt(authentication_select.value) + parseInt(project_type_select.value);
            }

            // if (affected_tooth_type_select.value) {
            //     total += parseInt(affected_tooth_type_select.value) * parseInt(number_of_affected_teeth_select.value);
            // }

            if (database_select.value) {
                total += parseInt(database_select.value);
            }

            if (features_select.value) {
                total += parseInt(features_select.value);
            }

            if (api_development_select.value) {
                total += parseInt(api_development_select.value);
            }

            if (integrations_select.value) {

                total += parseInt(integrations_select.value);

            }

            if (scalability_and_performance_select.value) {
                total += parseInt(scalability_and_performance_select.value);
            }

            if (admin_panel_select.value) {
                total += parseInt(admin_panel_select.value);
            }

            if (hosting_and_deployment_select.value) {
                total += parseInt(hosting_and_deployment_select.value);
            }

            if (timeline_select.value) {
                total += parseInt(timeline_select.value);
            }

            if (revisions_and_maintenance_select.value) {
                total += parseInt(revisions_and_maintenance_select.value);
            }

            // Multiply by number of sessions
            // total *= parseInt(sessionsInput.value);

            // Add optional services

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

        project_type_select.addEventListener('change', calculateTotal);

        authentication_select.addEventListener('change', calculateTotal);

        database_select.addEventListener('change', calculateTotal);

        features_select.addEventListener('change', calculateTotal);

        api_development_select.addEventListener('change', calculateTotal);

        integrations_select.addEventListener('change', calculateTotal);

        scalability_and_performance_select.addEventListener('change', calculateTotal);

        admin_panel_select.addEventListener('change', calculateTotal);

        hosting_and_deployment_select.addEventListener('change', calculateTotal);

        timeline_select.addEventListener('change', calculateTotal);

        revisions_and_maintenance_select.addEventListener('change', calculateTotal);

        technical_business_consultancyCheckbox.addEventListener('change', calculateTotal);




        // Initial calculation
        // calculateTotal();




        // ***End Price Estimation
    </script>



</div>
