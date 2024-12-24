

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
            <img src="{{asset('images/prevention.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{session('theme_mode') == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
        </div>

        <h1 class="text-center text-2xl font-medium {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mt-2">Prevention</h1>

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
        <h1 class="text-3xl font-bold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-6">
            A Complete Guide to General Dental Prevention (Plus a Price Estimation Tool!)
        </h1>

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Maintaining good oral health is essential not just for a bright smile, but for overall health and well-being. General dental prevention services, like routine cleanings and oral exams, help you avoid more severe issues down the road. In this blog, we’ll break down what general dental prevention services entail, why they are crucial, and how you can estimate the cost of these essential procedures using our price estimator.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            What Are General Prevention Services?
        </h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            General prevention services are routine dental treatments designed to keep your teeth and gums healthy. These typically include:
        </p>
        <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            <li><strong>Routine Cleanings:</strong> Professional teeth cleaning helps remove plaque and tartar buildup that regular brushing and flossing can't reach.</li>
            <li><strong>Oral Exams:</strong> Routine exams allow your dentist to detect early signs of dental issues, such as cavities or gum disease.</li>
            <li><strong>Fluoride Treatments:</strong> Fluoride strengthens the tooth enamel, helping to prevent decay.</li>
            <li><strong>X-Rays:</strong> X-rays provide a closer look at what’s happening beneath the surface, especially in areas not visible to the naked eye.</li>
        </ul>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Why Are General Prevention Services Important?
        </h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Regular preventive dental care plays a crucial role in keeping your teeth and gums healthy. Here are a few reasons why these services are so important:
        </p>
        <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            <li><strong>Prevents Cavities:</strong> Routine cleanings help to remove plaque, which can harden and lead to tooth decay.</li>
            <li><strong>Detects Early Issues:</strong> Oral exams catch problems like cavities, gum disease, and oral cancer before they become more severe.</li>
            <li><strong>Improves Oral Hygiene:</strong> Dental cleanings encourage good oral habits and can boost overall health.</li>
        </ul>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            What to Expect During a General Prevention Appointment
        </h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            A typical general prevention visit involves a series of steps aimed at maintaining and assessing your dental health. Here’s what you can expect:
        </p>
        <ol class="list-decimal list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            <li><strong>Initial Examination:</strong> Your dentist will begin by checking your teeth, gums, and mouth for any signs of issues like decay, cavities, or gum disease.</li>
            <li><strong>Cleaning:</strong> A dental hygienist will clean your teeth by removing plaque and tartar from areas that are hard to reach with a toothbrush.</li>
            <li><strong>Fluoride Treatment:</strong> If needed, you may receive a fluoride treatment to strengthen your teeth.</li>
            <li><strong>X-Rays:</strong> If required, your dentist may take X-rays to get a closer look at areas that need further assessment.</li>
        </ol>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Price Estimation for General Prevention Services
        </h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            The cost of general prevention services can vary depending on the type of cleaning, the need for X-rays, and other additional treatments. Our price estimator tool below will help you calculate an accurate estimate for your next visit.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Conclusion
        </h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">
            Prioritizing general dental prevention helps ensure a healthy smile for years to come. By staying on top of routine cleanings and oral exams, you’re not only saving your teeth but also preventing more significant dental expenses down the road. Use our price estimator to get an idea of the cost of your next appointment, and keep smiling with confidence!
        </p>
    </div>



    {{-- Consult Now Button --}}
    <div class="flex flex-col w-[96%] max-w-[800px] mx-auto items-center justify-center mt-6 {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg py-4  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} px-4">If you are sure that you have this problem and want to receive our service, then please click on the "Select" button. But, if you are not exactly sure, then please click on the "Consult Now" button.</p>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/services/prevention'">Select</button>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/consultation' ">Consult Now</button>

    </div>




      {{-- Footer Element --}}
      <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'"   alt="">

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

    </div>







</div>






