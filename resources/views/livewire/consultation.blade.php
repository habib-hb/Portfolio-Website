<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}} ">

    {{-- All The Looading Notifications --}}

        <!-- Show a loading spinner while Doing Date Processing -->
        <div wire:loading wire:target="selectedDate" class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
            <div class="flex flex-row justify-center items-center px-2 gap-2">

                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing Date...</span>

             </div>
        </div>





        <!-- Show a loading spinner while Doing Time Processing -->
          <div wire:loading wire:target="selectedTime" class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

            <div class="flex flex-row justify-center items-center px-2 gap-2">
                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing Time...</span>
             </div>

        </div>



        <!-- Show a loading spinner while Doing Gender Selection Processing -->
        <div wire:loading wire:target="selectedGender" class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

            <div class="flex flex-row justify-center items-center px-2 gap-2">
                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing Gender Details...</span>
             </div>


        </div>

    {{--End All The Looading Notifications --}}


    {{-- All Flash Messages --}}


        @if (session()->has('message'))

            <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit mx-auto w-[90%] max-w-[400px]  bg-[#9f1a1a] py-4 rounded-lg z-10">
                <div class="flex flex-row justify-between items-center px-8">

                    <p class="text-white text-center">{{ session('message') }}</p>

                </div>

                <button wire:click="clearMessage" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

            </div>

        @endif


        @if (session()->has('patient_details'))

            <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
                <div class="flex flex-row justify-between items-center px-8">


                    <p class="text-white text-left">{{ session('patient_details') }}</p>

                </div>

                <button wire:click="clear_patient_details" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

            </div>

        @endif

    {{-- End All Flash Messages --}}









       {{-- ********* Consultation Price Estimator ********** --}}
        <input id="estimated_price" type="hidden">
        <div class="relative">

            <div class="flex flex-row justify-between items-center mx-auto  md:max-w-[800px] py-2 mt-2  px-2 md:px-0 w-full">
                <img src="{{session('theme_mode') == 'light' ? asset('images/back_light_mode.png') : asset('images/back_dark_mode.png')}}" class="h-[48px] w-[48px] cursor-pointer hover:scale-105" onclick="window.history.back()" alt="">

                <h2 class="text-2xl text-center {{session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white'}} ">Consultation Price Estimator</h2>

                <div class="w-[48px]"></div>
            </div>

            <!-- Total Amount -->
            <div class="flex flex-col sticky top-2 justify-between items-center py-2 w-[96vw] md:max-w-[800px] mx-auto rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">
                <p class="text-center px-4 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Please complete the form below to receive an accurate consultation estimate.</p>
                <p class="text-2xl {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Total Estimated Amount</p>
                <p class="font-bold text-4xl {{session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white'}}" id="totalAmount">{{$total_estimated_amount}}</p>
            </div>

            <div class="flex flex-col w-full md:max-w-[800px] md:px-8 mx-auto p-2 {{$theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}} rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

                <!-- Consultation Type -->
                <div class="my-2">
                    <label class="text-lg mb-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Consultation Type</label>
                    <select id="consultation_type" class="w-full py-2 rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}}">
                        <option value="100">General Consultation - $100</option>
                        <option value="200">Specialist Consultation - $200</option>
                        <option value="300">Emergency Consultation - $300</option>
                    </select>
                </div>

                <!-- Consultation Duration -->
                <div class="my-2">
                    <label class="text-lg mb-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Consultation Duration</label>
                    <select id="consultation_duration" class="w-full py-2 rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}}">
                        <option value="1">15 Minutes - Default</option>
                        <option value="2">30 Minutes</option>
                        <option value="3">1 Hour</option>
                    </select>
                </div>

                <!-- Additional Consultation Services -->
                <div class="my-2">
                    <label class="text-lg mb-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Additional Services</label>
                    <div class="flex items-center">
                        <input id="dental_exam" type="checkbox" value="50" class="h-[20px] w-[20px] rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  mr-2"/>
                        <label for="dental_exam" class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Dental Examination - $50</label>
                    </div>

                    <div class="flex items-center mt-2">
                        <input id="xray" type="checkbox" value="100" class="h-[20px] w-[20px] rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  mr-2"/>
                        <label for="xray" class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">X-ray - $100</label>
                    </div>

                    <div class="flex items-center mt-2">
                        <input id="cbct" type="checkbox" value="150" class="h-[20px] w-[20px] rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  mr-2"/>
                        <label for="cbct" class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">CBCT (3D Imaging) - $150</label>
                    </div>
                </div>
            </div>
        </div>
        {{-- ********* End Consultation Price Estimator ********** --}}










    {{-- ********* Date Selector ********** --}}
    <h2 class="text-2xl md:text-4xl text-center {{session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white'}}   w-[90vw] mx-auto  py-2 px-4 rounded-lg mt-8">Appointment</h2>


    <div class="flex flex-col justify-center items-center mt-2 p-2">

        <div class="flex flex-row justify-start md:justify-center w-[100%]">
              <p class="text-lg md:text-center {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Please Select A Date : {{$select_date_string}}</p>
        </div>




        {{-- Dates Cards --}}
        <div class="flex flex-row flex-wrap gap-2 justify-center w-[100%] md:max-w-[800px] md:gap-4 mt-2">


            @foreach ($datesArray as $dates)

                <div wire:click="selectedDate('{{$dates['identifier']}}')" class="flex flex-col justify-center items-center h-[90px] w-[18%] {{$clicked_date == $dates['identifier'] ? 'bg-[#1A579F]' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8]' : 'bg-[#202329]')}}   rounded-lg mb-1   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-105 transition-all cursor-pointer">

                    <p class="text-3xl {{$clicked_date == $dates['identifier'] ? 'text-white' : (session('theme_mode') == 'light' ? 'text-[#6B779A]' : 'text-white')}}">{{$dates['day']}}</p>

                    <p class="text-sm  {{$clicked_date == $dates['identifier'] ? 'text-white' : (session('theme_mode') == 'light' ? 'text-[#6B779A]' : 'text-white')}}">{{$dates['day_name_abbr']}}</p>

                </div>

            @endforeach



        </div>



        {{-- Times Section --}}
        <div class="mt-8 {{$clicked_date == '' ? 'hidden' : ''}}">


            <h2 class="text-2xl text-center my-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Please Select A Time</h2>
            <div>

                @foreach ($timesArray as $time)

                    @if (in_array($time, $bookedTimesArray))

                        <p wire:click="timeBookedAlert('{{$time}}')" class="text-center p-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8]' : 'bg-[#505050] text-[#d3d3d3]'}}   mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] opacity-20 ">{{$time}}</p>

                    @else

                        <p wire:click="selectedTime('{{$time}}')" class="text-center p-2 {{$clicked_time == $time ? 'bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}  mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]  hover:scale-105 transition-all cursor-pointer">{{$time}}</p>

                    @endif

                @endforeach

            </div>

        </div>


        {{-- Patient Details Section --}}
        <div class="flex flex-col w-full md:max-w-[800px] md:p-8  mt-8">


            <div class="flex flex-row justify-start md:justify-center w-[100%]">
                <p class="text-lg {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Patient Details</p>
            </div>

            <div class="flex flex-col mt-2">

                <label for="name" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Full Name</label>

                <input wire:model="user_name" type="text" class="w-[96vw] md:max-w-full py-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2" id="name">

             </div>



             <div class="flex flex-col mt-2">

                <label for="age" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Age</label>

                <input wire:model="user_age" type="number" max="100" min="1"  class="w-[50vw] md:max-w-[100px] py-2   {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2" id="age">

             </div>



             <div class="flex flex-col mt-2">

                <label for="age" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Gender</label>

                <div class="flex flex-row gap-4 mt-2">

                    <button wire:click="selectedGender('male')" class="h-[35px] w-[100px] rounded-lg {{$clicked_gender == 'male' ? 'bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Male</button>

                    <button wire:click="selectedGender('female')" class="h-[35px] w-[100px] rounded-lg {{$clicked_gender == 'female' ? 'bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Female</button>

                </div>

             </div>



             <div class="flex flex-col mt-2">

                <label  for="age" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Contact Number</label>

                <input wire:model="user_phone" type="number"  class="w-[96vw] md:max-w-full  py-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2" id="phone">

             </div>


             <div class="flex flex-col mt-2">

                <label for="name" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Write Your Problem</label>

                <textarea wire:model="user_problem" type="text" class="w-[96vw] md:max-w-full  py-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2" id="problem" rows="4" ></textarea>

             </div>


             {{-- Book Appointment Button --}}
            <button wire:click="bookAppointment" class="mt-8 px-8 py-2 w-[90vw] md:max-w-[300px] mx-auto rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all ">Book Appointment</button>


         </div>



   </div>



        {{-- ********* End Date Selector ********** --}}













    {{-- Footer Element --}}
    <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon' src="{{$theme_mode == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'" alt="">

        <p class=" text-center {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

        <p class=" text-center {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

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

    const consultation_typeSelect = document.getElementById('consultation_type');

    const consultation_duration_select = document.getElementById('consultation_duration');



    const sessionsInput = document.getElementById('sessions');


    // Checkboxes
    const dental_examCheckbox = document.getElementById('dental_exam');

    const xrayCheckbox = document.getElementById('xray');

    const cbctCheckbox = document.getElementById('cbct');

    // Total Amount Element
    const totalAmountSpan = document.getElementById('totalAmount');

    // Function to calculate total price
    function calculateTotal() {

            // Base price from complexity
            let total = parseInt(consultation_typeSelect.value);


            if(consultation_duration_select.value){
                total = parseInt(consultation_duration_select.value) * parseInt(consultation_typeSelect.value);
            }


            // Multiply by number of sessions
            // total *= parseInt(sessionsInput.value);

            // Add optional services
            if (dental_examCheckbox.checked) {
                total += parseInt(dental_examCheckbox.value);
            }

            if (cbctCheckbox.checked) {
                total += parseInt(cbctCheckbox.value);
            }

            if (xrayCheckbox.checked) {
                total += parseInt(xrayCheckbox.value);
            }

            // Update total amount
            totalAmountSpan.textContent = total;

            localStorage.setItem('total', total);

                // Sending Data To backend
                setTimeout(() => {

                            Livewire.dispatch('total_estimated_amount_consultation', { total: totalAmountSpan.textContent });

                        }, 10);
                clearTimeout();

                //  document.getElementById('estimated_price').value = total;



    }

    // Add event listeners to all inputs
    consultation_typeSelect.addEventListener('change', calculateTotal);

    consultation_duration_select.addEventListener('change', calculateTotal);


    // sessionsInput.addEventListener('input', calculateTotal);

    dental_examCheckbox.addEventListener('change', calculateTotal);

    cbctCheckbox.addEventListener('change', calculateTotal);

    xrayCheckbox.addEventListener('change', calculateTotal);



    // Initial calculation
    // calculateTotal();




    // ***End Price Estimation

   </script>



</div>

