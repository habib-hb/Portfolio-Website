

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
            <img src="{{asset('images/cosmetic_dentist.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{session('theme_mode') == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
        </div>

        <h1 class="text-center text-2xl font-medium {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mt-2">Cosmetic Dentistry</h1>

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
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Your smile is one of the first things people notice about you, so it’s no surprise that cosmetic dentistry has become increasingly popular. Whether you’re looking to whiten your teeth, fix a chipped tooth, or undergo a complete smile makeover, there are various cosmetic dental treatments available today to enhance your smile. In this blog, we’ll explore the different types of cosmetic dental procedures, what you can expect from them, and how to estimate the costs using our price estimator tool.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">What Is Cosmetic Dentistry?</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Cosmetic dentistry refers to any dental work aimed at improving the appearance of your teeth, gums, or overall smile. Unlike restorative dentistry, which focuses on health and function, cosmetic procedures are primarily elective but can greatly enhance self-confidence. Some common procedures include teeth whitening, veneers, bonding, and even orthodontics like Invisalign. Whether it’s addressing minor imperfections or undertaking a full smile transformation, cosmetic dentistry has a solution for almost any concern.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Types of Cosmetic Dental Procedures</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            There are various cosmetic dental treatments available, depending on your needs and desired outcome. Here are some of the most popular options:
        </p>
        <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            <li><strong>Teeth Whitening</strong>: A quick and non-invasive way to brighten your smile. Professional whitening can make your teeth several shades lighter in just one visit.</li>
            <li><strong>Veneers</strong>: Thin porcelain or composite resin shells placed on the front surface of teeth to cover imperfections like discoloration, chips, or misalignment.</li>
            <li><strong>Dental Bonding</strong>: A tooth-colored resin applied to teeth to repair chips, gaps, or other minor flaws. It’s an affordable alternative to veneers.</li>
            <li><strong>Invisalign</strong>: Clear aligners that straighten teeth discreetly, making it a great option for adults looking to correct their smile without traditional braces.</li>
            <li><strong>Crowns</strong>: Caps placed over damaged or misshapen teeth to restore appearance and function.</li>
        </ul>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">When Should You Consider Cosmetic Dentistry?</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Cosmetic dentistry is ideal for individuals who are dissatisfied with the appearance of their teeth. Whether you have a specific issue like stains or chipped teeth or are simply looking for a more attractive smile, cosmetic dental treatments can make a significant difference. Consult with your dentist to discuss which options best suit your goals and your current dental health.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Benefits of Cosmetic Dentistry</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            There are both aesthetic and psychological benefits to improving your smile. Cosmetic dental procedures can enhance your overall facial appearance, boost your confidence, and positively impact your social and professional life. With modern technology, many treatments are minimally invasive and require little downtime.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Myths About Cosmetic Dentistry</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Despite its popularity, cosmetic dentistry is still surrounded by misconceptions. Let’s debunk a few common myths:
        </p>
        <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            <li><strong>Myth 1:</strong> Cosmetic dentistry is only for celebrities – While it's true that many public figures opt for these treatments, they are accessible and affordable for the general public as well.</li>
            <li><strong>Myth 2:</strong> Cosmetic procedures damage teeth – Most cosmetic procedures are designed to preserve or even strengthen natural teeth.</li>
            <li><strong>Myth 3:</strong> It's too expensive – There are various pricing options and financing plans available, making it possible for nearly anyone to improve their smile.</li>
        </ul>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Recovering from Cosmetic Dental Procedures</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Recovery varies depending on the procedure, but most cosmetic treatments involve little to no downtime. You might experience mild sensitivity after teeth whitening or slight discomfort following procedures like veneers or bonding, but these symptoms typically subside within a few days. Be sure to follow your dentist’s aftercare instructions to ensure a smooth recovery.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Planning for the Cost of Cosmetic Dentistry</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Cosmetic dentistry costs vary depending on the procedure and the complexity of your case. Factors such as the materials used, the expertise of your dentist, and your geographical location can affect the final price. To get a better idea of what to expect, use our price estimator to receive a customized cost breakdown based on your needs.
        </p>

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            While cosmetic dentistry is often considered an investment, the long-term benefits of having a confident, beautiful smile are well worth it. Speak to your dentist about financing options and payment plans to make the process more affordable.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Conclusion</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">
            Cosmetic dentistry offers a wide range of treatments that can dramatically improve the appearance of your smile. From whitening to veneers to orthodontics, there’s a solution for everyone. Use our price estimator to plan for your desired treatments, and consult with your dentist to find out which options will give you the smile of your dreams.
        </p>
    </div>



    {{-- Consult Now Button --}}
    <div class="flex flex-col w-[96%] max-w-[800px] mx-auto items-center justify-center mt-6 {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg py-4  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} px-4">If you are sure that you have this problem and want to receive our service, then please click on the "Select" button. But, if you are not exactly sure, then please click on the "Consult Now" button.</p>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/services/cosmetic_dentist'">Select</button>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/consultation'">Consult Now</button>

    </div>




      {{-- Footer Element --}}
      <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'"   alt="">

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

    </div>














</div>






