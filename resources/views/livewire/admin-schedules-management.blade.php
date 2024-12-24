
<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}}"  data-theme-mode="{{ session('theme_mode') }} " id="main_div">

    <nav class="flex justify-center items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-center md:w-[20vw]">

            <img  src="{{asset('images/the_logo_light_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw] {{session('theme_mode') == 'light' ? '' : 'hidden'}} cursor-pointer" onclick="window.location.href='/'" alt="">

            <img  src="{{asset('images/the_logo_dark_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw] {{session('theme_mode') == 'light' ? 'hidden' : ''}} cursor-pointer" onclick="window.location.href='/'"  alt="">

        </div>



    </nav>



    <div wire:click="changeThemeMode" class="flex justify-center w-fit mx-auto mt-6 md:hover:scale-105 transition-all cursor-pointer">

        <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? '' : 'hidden'}}">

        <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? 'hidden' : ''}}">

    </div>




    <main>

        <div class="flex flex-col justify-center items-center mt-8 max-w-[800px] mx-auto px-4 md:px-0">

            <h1 class="text-2xl font-semibold text-center md:text-center w-full {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Schedules Input Panel</h1>

            <p class="text-left md:text-center mt-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">After Adding All The Schedules, Click On The “Save” Button To Set The New Schedule List Live For Appointments. The New Schedule List Will Replace The Old Schedule List. All The Appointments Enlisted From The Old Schedule List Will Be Moved To "Unsettled Appointments" Panel. From There You Can Resettle The Appointments By Clicking The "Settle Appointment" Button And Selecting A New Schedule.</p>

        </div>



      {{-- Processing Messages --}}


         <!-- Show a loading spinner while Doing Theme Change Processing -->
         <div wire:loading wire:target="changeThemeMode" class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

            <div class="flex flex-row justify-center items-center px-2 gap-2">
                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
            </div>


        </div>


        <div wire:loading wire:target="show_weekly_holidays_options" class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
            <div class="flex flex-row justify-center items-center px-2 gap-2">

                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing...</span>

            </div>
        </div>

        <div wire:loading wire:target="add_weekly_holidays" class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
            <div class="flex flex-row justify-center items-center px-2 gap-2">

                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing...</span>

            </div>
        </div>

        <div wire:loading wire:target="selectAnnualHolidays" class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
            <div class="flex flex-row justify-center items-center px-2 gap-2">

                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing...</span>

            </div>
        </div>


        <div wire:loading wire:target="submittedAnnualHolidays" class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
            <div class="flex flex-row justify-center items-center px-2 gap-2">

                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing...</span>

            </div>
        </div>

        <div wire:loading wire:target="setAM" class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
            <div class="flex flex-row justify-center items-center px-2 gap-2">

                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing...</span>

            </div>
        </div>

        <div wire:loading wire:target="setPM" class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
            <div class="flex flex-row justify-center items-center px-2 gap-2">

                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing...</span>

            </div>
        </div>

      {{-- End Processing Messages --}}



      {{-- Notifications --}}

      @if($notification == "Schedules Added Successfully")

        <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-center">{{$notification }}</p>

            </div>

            <button wire:click="clear_notification" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>

     @endif



      @if($notification == "Please fill all the fields")

        <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-center">{{$notification }}</p>

            </div>

            <button wire:click="clear_notification" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>

     @endif



      @if($notification == "Please keep at least one working day")

        <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-center">{{$notification }}</p>

            </div>

            <button wire:click="clear_notification" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>

     @endif


     @if($notification == "New Date Added Successfully")

        <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-center">{{$notification }}</p>

            </div>

            <button wire:click="clear_notification" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>

     @endif



     @if($notification == "Date Added Successfully")

        <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-center">{{$notification }}</p>

            </div>

            <button wire:click="clear_notification" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>

     @endif



     @if($notification == "The Date Was Already Added")

     <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10">
         <div class="flex flex-row justify-between items-center px-8">


             <p class="text-white text-center">{{$notification }}</p>

         </div>

         <button wire:click="clear_notification" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

     </div>

     @endif


    @if($notification == "Please Select A Date")

        <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-center">{{$notification }}</p>

            </div>

            <button wire:click="clear_notification" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>

    @endif



    @if($notification == "Holiday Deleted Successfully")

    <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10">
        <div class="flex flex-row justify-between items-center px-8">


            <p class="text-white text-center">{{$notification }}</p>

        </div>

        <button wire:click="clear_notification" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

    </div>

    @endif


    @if($notification == "The Schedule Has Been Added Above")

        <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-center">{{$notification }}</p>

            </div>

            <button wire:click="clear_notification" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>

     @endif




     @if($notification == "The Schedule Has Already Been Added Above")

     <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10">
         <div class="flex flex-row justify-between items-center px-8">


             <p class="text-white text-center">{{$notification }}</p>

         </div>

         <button wire:click="clear_notification" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

     </div>

     @endif

      {{-- End Notifications --}}





        {{-- Schedule List --}}
        <div class="flex flex-col justify-center items-center mt-8 max-w-[800px] mx-auto {{count($added_schedules) > 0 ? '' : 'hidden'}}">

            <h2 class="text-xl font-semibold mb-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Schedule List</h2>

            @foreach ($added_schedules as $key => $schedule)

            <p class="text-center py-2 px-8 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white'}}  mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] ">{{$schedule}}</p>

            @endforeach

            {{-- <p class="text-center py-2 px-8 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white'}}  mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]  cursor-pointer">11:10 - 12:00 AM</p>

            <p class="text-center py-2 px-8 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white'}}  mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]  cursor-pointer">11:10 - 12:00 AM</p>

            <p class="text-center py-2 px-8 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white'}}  mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]  cursor-pointer">11:10 - 12:00 AM</p> --}}

            {{-- <p class="text-sm {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">No new schedule added</p> --}}

            {{-- Weekly Holidays Button --}}
            <button wire:click="show_weekly_holidays_options" class="px-4 py-2 w-[200px] bg-[#1A579F] text-white rounded-lg hover:scale-110 transition-all  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] mt-2">Set Weekly Holidays <img src="{{asset('images/press_down.png')}}" class="w-[14px] inline -mt-1 {{$weekly_holidays_option_selected ? 'rotate-180' : 'rotate-0'}}  transition-all" /></button>

                <div class="flex flex-col justify-center gap-3 items-center mt-2 {{$weekly_holidays_option_selected ? '' : 'hidden'}}">

                    <p wire:click="add_weekly_holidays('SAT')" class="text-center w-[170px] py-2 px-8 {{in_array('SAT', $added_weekly_holidays) ? ' bg-[#1A579F] text-white' :  (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}   rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] cursor-pointer hover:scale-110 transition-all ">Saturday</p>

                    <p wire:click="add_weekly_holidays('SUN')" class="text-center w-[170px] py-2 px-8 {{ in_array('SUN', $added_weekly_holidays) ? ' bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}   rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] cursor-pointer hover:scale-110 transition-all ">Sunday</p>

                    <p wire:click="add_weekly_holidays('MON')" class="text-center w-[170px] py-2 px-8 {{ in_array('MON', $added_weekly_holidays) ? ' bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}   rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] cursor-pointer hover:scale-110 transition-all ">Monday</p>

                    <p wire:click="add_weekly_holidays('TUE')" class="text-center w-[170px] py-2 px-8 {{ in_array('TUE', $added_weekly_holidays) ? ' bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}   rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] cursor-pointer hover:scale-110 transition-all ">Tuesday</p>

                    <p wire:click="add_weekly_holidays('WED')" class="text-center w-[170px] py-2 px-8 {{ in_array('WED', $added_weekly_holidays) ? ' bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}   rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] cursor-pointer hover:scale-110 transition-all ">Wednessday</p>

                    <p wire:click="add_weekly_holidays('THU')" class="text-center w-[170px] py-2 px-8 {{ in_array('THU', $added_weekly_holidays) ? ' bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}   rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] cursor-pointer hover:scale-110 transition-all ">Thursday</p>

                    <p wire:click="add_weekly_holidays('FRI')" class="text-center w-[170px] py-2 px-8 {{ in_array('FRI', $added_weekly_holidays) ? ' bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}   rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] cursor-pointer hover:scale-110 transition-all ">Friday</p>


                </div>


            {{-- Save Button --}}
            <button class="bg-[#1A579F] text-white font-semibold py-2 px-8 mt-8 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" wire:click="saveScheduleList">Save</button>

            <div class="flex flex-col md:flex-row justify-center items-center gap-4 mt-8">

                {{-- Reset Button --}}
                <button class="bg-[#1A579F]  text-white font-semibold py-2 w-[160px]  rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" wire:click="resetScheduleList">Reset List</button>

                {{-- Delete Last Item --}}
                <button class="bg-[#1A579F] text-white font-semibold py-2 w-[160px]  rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" wire:click="deleteLastListItem">Delete Last Item</button>

            </div>


        </div>








        {{-- Add Schedules --}}
        <div class="flex flex-col justify-center items-center mt-16 max-w-[300px] mx-auto px-4 md:px-0">

            <h2 class="text-xl font-semibold mb-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Add Schedules</h2>

            {{-- Input Field Start Time --}}
            <div class="flex flex-col justify-center items-center w-full">

                <p class="font-medium {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Start Time</p>


                <div class="flex flex-row justify-center items-center gap-4 w-full">

                    <div class="flex flex-col justify-center items-center">

                        <p class="text-sm {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Hour</p>

                        <input wire:model="start_time_hour" type="number" max="12" min="1"  class="w-[40vw] md:max-w-[100px] py-2   {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2" id="age">

                    </div>

                    <div class="flex flex-col justify-center items-center">

                        <p class="text-sm {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Minute</p>

                        <input wire:model="start_time_minute" type="number" max="59" min="0"  class="w-[40vw] md:max-w-[100px] py-2   {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2" id="age">

                    </div>


                </div>

            </div>
            {{-- End Input Field Start Time --}}


            {{-- Input Field End Time --}}
            <div class="flex flex-col justify-center items-center w-full mt-4">

                <p class="font-medium {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">End Time</p>


                <div class="flex flex-row justify-center items-center gap-4 w-full">

                    <div class="flex flex-col justify-center items-center">

                        <p class="text-sm {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Hour</p>

                        <input wire:model="end_time_hour" type="number" max="12" min="1"  class="w-[40vw] md:max-w-[100px] py-2   {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2" id="age">

                    </div>

                    <div class="flex flex-col justify-center items-center">

                        <p class="text-sm {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Minute</p>

                        <input wire:model="end_time_minute" type="number" max="59" min="0"  class="w-[40vw] md:max-w-[100px] py-2   {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2" id="age">

                    </div>


                </div>

            </div>
            {{-- End Input Field End Time --}}



            {{-- AM/ PM Selection --}}

                <div class="flex flex-col justify-center items-center mt-4">

                    <p class="font-medium {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">AM / PM</p>

                    <div class="flex flex-row gap-4 mt-2">

                        <button wire:click="setAM" class="h-[35px] w-[100px] rounded-lg {{$am_or_pm == 'AM' ? 'bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">AM</button>

                        <button wire:click="setPM" class="h-[35px] w-[100px] rounded-lg {{$am_or_pm == 'PM' ? 'bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">PM</button>

                    </div>

                </div>

            {{-- End AM/ PM Selection --}}



            <button wire:click="addSchedule" class="bg-[#1A579F] text-white font-semibold py-2 px-8 mt-8 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Add Schedule</button>


            <p class="text-sm text-center mt-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Added Schedules Will Be Listed Above. Press The "Save" Button From There To Make The New Schedule List Live.</p>



        </div>





        {{-- Annual Holidays Section --}}

         <div class="flex flex-col justify-center items-center mt-8 {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} px-4 py-8 mx-auto w-[96vw] max-w-[800px] rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <h1 class="flex flex-row text-center {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">To Select Special Annual Holidays Or Annual Off Days, Click The "Select Annual Holidays" Button Below. If You Want To View Already Submitted Holidays Or Delete Specific Holidays, Click The "Submitted Annual Holidays" Button.</h1>

            {{-- Select Annual Holidays Section --}}

            <button wire:click="selectAnnualHolidays" class="px-4 py-2 w-[280px] bg-[#1A579F] text-white rounded-lg hover:scale-110 transition-all mt-4 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Select Annual Holidays <img src="{{asset('images/press_down.png')}}" class="w-[14px] inline -mt-1 {{$annual_holidays_option_selected ? 'rotate-180' : 'rotate-0'}}  transition-all" /></button>


            <div class="flex flex-col justify-center items-center my-4 {{$annual_holidays_option_selected ? '' : 'hidden'}}">


                    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Format(yyyy-mm-dd)</p>
                    <div class="relative max-w-sm">

                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>

                        <input  id="datepicker-format" datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" datepicker-orientation="top left" type="text" class="date_selector bg-[#deeaf8]  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-[#202329]  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-none border-none   shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]" placeholder="Select date">

                    </div>


                    <button onclick="submitAnnualHolidays()" class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Save</button>


            </div>


            {{-- End Select Annual Holidays Section --}}


            {{-- Submitted Annual Holidays Section --}}
            <button wire:click="submittedAnnualHolidays" class="px-4 py-2 w-[280px] bg-[#1A579F] text-white rounded-lg hover:scale-110 transition-all mt-4 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Submitted Annual Holidays <img src="{{asset('images/press_down.png')}}" class="w-[14px] inline -mt-1 {{$submitted_annual_holidays_option_selected ? 'rotate-180' : 'rotate-0'}}  transition-all" /></button>


                <div class="flex flex-col gap-4 w-full max-h-[70vh] overflow-auto {{session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-black'}} items-center  my-4  px-4 py-4 md:px-8 {{$submitted_annual_holidays_option_selected ? '' : 'hidden'}} rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

                    @foreach ($database_holidays as $date)

                        <div class="flex w-full flex-col justify-center items-center py-4 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8]' : 'bg-[#1e1d1d]'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]">

                            <p class="text-2xl {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">{{ (new DateTime($date))->format('jS F, Y') }}</p>

                            <button wire:click="deleteHoliday('{{$date}}')" class="h-[35px] w-[100px] rounded-lg bg-red-800 mt-2 md:mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">Delete</button>
                    </div>

                    @endforeach


                    @if (count($database_holidays) == 0)

                        <p class="text-lg text-center {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">No Submitted Holidays</p>

                    @endif



                </div>

            {{-- End Submitted Annual Holidays Section --}}

        </div>

        {{-- End Annual Holidays Section --}}








    </main>




 {{-- Footer Element --}}
 <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


    <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'"   alt="">

    <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

    <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

</div>







<script>

    document.addEventListener('livewire:initialized', () => {

        Livewire.on('alert-manager', () => {

            setTimeout(() => {

                document.body.classList.contains('dark') ? document.body.classList.remove('dark') : document.body.classList.add('dark');

            }, 100);

        })

    })


    let submitAnnualHolidays = ()=>{
        let date_value = document.getElementById('datepicker-format').value;

        Livewire.dispatch('save_selected_date', {date:date_value});
    }


</script>


</div>






