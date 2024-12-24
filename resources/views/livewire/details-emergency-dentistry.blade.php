

<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}}">

    <nav class="flex justify-center md:justify-between items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-start md:w-[20vw] cursor-pointer">

            <img  src="{{asset('images/the_logo_light_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw] {{session('theme_mode') == 'light' ? '' : 'hidden'}} cursor-pointer" onclick="window.location.href='/'" alt="">

            <img  src="{{asset('images/the_logo_dark_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw] {{session('theme_mode') == 'light' ? 'hidden' : ''}} cursor-pointer" onclick="window.location.href='/'"  alt="">

        </div>

        {{-- <div id="input_div" class="relative">

            <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/search_light_mode.gif') : asset('images/search_dark_mode.gif')}}" class="absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1" alt="">

            <span id='search_text' class="absolute top-1/2 left-10 -translate-y-1/2 h-[80%] mt-1 {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#EFF9FF]'}}">Search</span>

            <input id='search_input' type="text" class="mr-2 h-[36px] w-[50vw] md:w-[30vw] rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#EFF9FF] text-[#070707]' : 'bg-[#070707] text-[#EFF9FF]' }}  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] px-4 focus: outline-none border-none ">



        </div> --}}

        <div class=" flex justify-end md:w-[20vw]">

        <button class="hidden md:block mr-2 px-8 py-2 rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Consult Now</button>

        </div>



    </nav>



     <!-- Show a loading spinner while Doing Theme Change Processing -->
     <div wire:loading wire:target="changeThemeMode" class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
        </div>


    </div>


            {{-- <div wire:click="changeThemeMode" class="flex justify-center">

                <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? '' : 'hidden'}}">

                <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? 'hidden' : ''}}">

            </div> --}}

    <div wire:click="changeThemeMode" class="flex justify-center w-fit mx-auto mt-6 md:hover:scale-105 transition-all cursor-pointer">

        <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? '' : 'hidden'}}">

        <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? 'hidden' : ''}}">

    </div>




    {{-- The Headline Card --}}
    <div class="flex flex-col w-[96%] max-w-[800px] mx-auto h-[228px] {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} mt-4 rounded-lg items-center justify-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class="{{session('theme_mode') == 'light' ? 'bg-[#4189d1]' : ''}}  mt-6 rounded-lg border-1  bg-[#EFF9FF]">
            <img src="{{asset('images/emergency_dentistry.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{session('theme_mode') == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
        </div>

        <h1 class="text-center text-2xl font-medium {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mt-2">Emergency Dentistry</h1>

        <div class="flex flex-row items-center gap-2 justify-center mt-2">
            <img src="{{session('theme_mode') == 'light' ? asset('images/person_icon_light_mode.png') : asset('images/person_icon_dark_mode.png')}}" class="h-[40px] w-[40px]" alt="">

            <div class="flex flex-col justify-start items-start ">

                <p class="text-left font-semibold p-0 m-0 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Dr. Habibur Rahman</p>

                <p class="text-left {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">27 July, 2022</p>

            </div>
        </div>
    </div>



    {{-- The Blog Text Section --}}
    <div class="max-w-[800px] mx-auto py-8 px-4">
       <h1 class="text-3xl font-bold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-6">Emergency Dentistry: What You Need to Know (Plus a Price Estimation Guide!)</h1>

       <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> Dental emergencies can happen at any time, and they often require immediate attention to prevent further complications. Whether it's a sudden toothache, a broken tooth, or a dental injury, knowing when and where to seek emergency dental care can make all the difference in preserving your oral health. In this blog, we’ll explore the most common types of dental emergencies, what you can expect during treatment, and how to use our price estimator to help plan for the cost of emergency dental care. </p>

       <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">What Is Emergency Dentistry?</h2>

       <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> Emergency dentistry refers to urgent dental care provided to patients experiencing severe pain, trauma, or other dental issues that cannot wait for a scheduled appointment. Common dental emergencies include knocked-out teeth, broken teeth, severe toothaches, and infections. These situations require prompt treatment to alleviate pain, prevent further damage, and, in some cases, save the tooth. </p>

       <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Signs You May Need Emergency Dental Care</h2>

       <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> Dental emergencies can come in many forms, and it's important to recognize the signs so you can seek treatment promptly. Here are some indicators that you may need emergency dental care: </p>

       <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> <li><strong>Severe tooth pain</strong>: If you're experiencing intense or constant pain, it could be a sign of infection or deep decay.</li>

        <li><strong>Broken or knocked-out tooth</strong>: Immediate attention is needed to repair or potentially save the tooth.</li>

        <li><strong>Swollen or bleeding gums</strong>: Excessive swelling or bleeding could indicate an infection or gum injury.</li>

        <li><strong>Dental abscess</strong>: Pus-filled infections around the tooth or gums require urgent treatment to prevent the spread of infection.</li>

        <li><strong>Loose or fractured dental restorations</strong>: A dislodged filling, crown, or bridge can expose sensitive areas and require quick repair.</li>

    </ul> <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">What Happens During an Emergency Dental Visit?</h2>

    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> When you visit an emergency dentist, the goal is to relieve your pain, stabilize the issue, and prevent further complications. Here's what typically happens during an emergency dental visit: </p>

    <ol class="list-decimal list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> <li><strong>Assessment and X-rays:</strong> Your dentist will examine the affected area and may take X-rays to determine the extent of the issue.</li>

        <li><strong>Immediate Treatment:</strong> Depending on the emergency, your dentist may remove an infection, repair a broken tooth, or stabilize a knocked-out tooth.</li>

        <li><strong>Pain Relief:</strong> Local anesthesia or pain management strategies are used to keep you comfortable during the procedure.</li> <li><strong>Follow-Up Care:</strong> After stabilizing the issue, your dentist will advise on any further treatment, such as placing a permanent crown or treating an underlying infection.</li>

    </ol>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Why Seek Emergency Dental Care?</h2>

    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> Delaying treatment for a dental emergency can lead to more severe complications, such as infections spreading to other areas of the body or permanent damage to your teeth and gums. Prompt care can save you from additional pain and costly procedures in the future, such as extractions or dental implants. </p>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Common Myths About Emergency Dentistry</h2>

    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> Emergency dentistry can be misunderstood, leading to confusion or fear. Here are a few myths about emergency dental care that we’d like to debunk: </p> <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> <li><strong>Myth 1:</strong> You should always wait until your next scheduled appointment – For serious pain or injuries, delaying care can worsen the issue.</li>

        <li><strong>Myth 2:</strong> Emergency dental care is always expensive – Many insurance plans cover emergency visits, and our price estimator can help you get an idea of costs upfront.</li>

        <li><strong>Myth 3:</strong> Dental emergencies are rare – Dental emergencies are more common than you think and can happen unexpectedly to anyone.</li> </ul> <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">How to Prepare Financially for Emergency Dental Care</h2>

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> The cost of emergency dental treatment varies depending on the urgency, the number of affected teeth, and the type of pain or injury. Using our price estimator, you can get a clearer idea of how much your treatment may cost, which helps you plan ahead financially. It's important to address dental emergencies promptly to avoid further complications or more costly treatments down the road. </p>

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> By using our price estimator, you can factor in variables such as the severity of the pain, the number of affected teeth, and the type of treatment location, helping you plan for the potential costs. </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Conclusion</h2>

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}"> Dental emergencies can be frightening, but prompt care is essential to prevent further damage and alleviate pain. Use our price estimator to get an accurate idea of your treatment costs and ensure that you’re prepared for any unexpected dental emergencies. </p>
    </div>



    {{-- Consult Now Button --}}
    <div class="flex flex-col w-[96%] max-w-[800px] mx-auto items-center justify-center mt-6 {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg py-4  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} px-4">If you are sure that you have this problem and want to receive our service, then please click on the "Select" button. But, if you are not exactly sure, then please click on the "Consult Now" button.</p>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/services/emergency_dentistry'">Select</button>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/consultation' ">Consult Now</button>


    </div>




      {{-- Footer Element --}}
      <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'"   alt="">

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

    </div>







</div>
