

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
            <img src="{{asset('images/dental_implant.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{session('theme_mode') == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
        </div>

        <h1 class="text-center text-2xl font-medium {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mt-2">Dental Implants</h1>

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
        <h1 class="text-3xl font-bold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-6">Everything You Need to Know About Dental Implants (Plus a Price Estimation Guide!)</h1>

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Missing teeth can affect not only your appearance but also your ability to speak and eat comfortably. Fortunately, dental implants offer a long-lasting solution that looks and feels just like natural teeth. In this blog, we’ll cover everything you need to know about dental implants, from how they work to the benefits they provide. Plus, we’ll walk you through a simple price estimator to help you plan for your procedure.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">What Are Dental Implants?</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Dental implants are small titanium posts that are surgically placed into the jawbone to serve as artificial tooth roots. Once the implants are securely positioned, they provide a strong foundation for attaching replacement teeth, such as crowns, bridges, or dentures. The implant fuses with the jawbone over time, offering a stable and permanent solution for missing teeth.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Why Choose Dental Implants?</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Dental implants are considered the gold standard for tooth replacement for several reasons:
        </p>
        <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            <li><strong>Natural Look and Feel:</strong> Implants mimic the appearance and function of natural teeth, helping you smile with confidence.</li>
            <li><strong>Durability:</strong> With proper care, dental implants can last a lifetime, making them a worthwhile investment.</li>
            <li><strong>Preserving Jawbone Health:</strong> Implants prevent bone loss in the jaw, which often occurs after losing a tooth.</li>
            <li><strong>No Impact on Neighboring Teeth:</strong> Unlike bridges, implants don't require altering adjacent healthy teeth.</li>
            <li><strong>Improved Quality of Life:</strong> Dental implants make it easier to eat, speak, and maintain your overall oral health.</li>
        </ul>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">The Dental Implant Procedure</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Getting dental implants is a multi-step process that takes several months to complete. Here's what you can expect:
        </p>
        <ol class="list-decimal list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            <li><strong>Consultation and Planning:</strong> Your dentist will evaluate your oral health and bone structure to determine if you're a good candidate for implants.</li>
            <li><strong>Implant Placement:</strong> The titanium implant is surgically inserted into the jawbone, where it will gradually integrate over a few months.</li>
            <li><strong>Healing Period:</strong> It takes time for the implant to fuse with the bone, a process called osseointegration.</li>
            <li><strong>Attaching the Abutment:</strong> After healing, an abutment is placed on top of the implant to connect it with the replacement tooth.</li>
            <li><strong>Final Restoration:</strong> The custom-made crown, bridge, or denture is then attached, completing the process.</li>
        </ol>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Common Myths About Dental Implants</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            While dental implants are highly successful, some misconceptions still linger. Let's debunk a few common myths:
        </p>
        <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            <li><strong>Myth 1:</strong> Implants are painful – The procedure is typically done under local anesthesia, and most patients report minimal discomfort during recovery.</li>
            <li><strong>Myth 2:</strong> Implants are too expensive – While the upfront cost may be higher than other treatments, the long-term benefits and durability of implants make them cost-effective in the long run.</li>
            <li><strong>Myth 3:</strong> Implants aren’t safe for older adults – Age isn’t usually a barrier to getting implants as long as your overall health and jawbone are suitable for the procedure.</li>
        </ul>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Caring for Your Dental Implants</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Dental implants require the same level of care as your natural teeth. Follow these tips to maintain your implants:
        </p>
        <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            <li>Brush twice a day and floss daily to keep your implants and surrounding gums healthy.</li>
            <li>Visit your dentist regularly for check-ups and professional cleanings.</li>
            <li>Avoid chewing on hard items like ice or pens, which could damage your implant crown.</li>
        </ul>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Planning for the Cost of Dental Implants</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            The cost of dental implants can vary based on factors such as the number of implants needed, the complexity of the case, and the materials used for your restoration. Our price estimator can help you get an accurate estimate based on your specific needs, allowing you to plan financially for this important investment in your smile.
        </p>

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Investing in dental implants can provide long-lasting benefits for your oral health, appearance, and confidence. Use our price estimator and consult your dentist to determine the best treatment plan for you.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Conclusion</h2>

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> Dental implants are a transformative solution for missing teeth, offering a natural look, long-lasting durability, and improved quality of life. By understanding the process and considering the cost, you can make an informed decision about this dental procedure. Don’t hesitate to consult with your dentist and explore our price estimation tool to take the first step toward restoring your smile. </p>

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">
            Ready to find out if dental implants are right for you? Use our online price estimator to get started or book a consultation with our dental experts today!
        </p>

    </div>



    {{-- Consult Now Button --}}
    <div class="flex flex-col w-[96%] max-w-[800px] mx-auto items-center justify-center mt-6 {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg py-4  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} px-4">If you are sure that you have this problem and want to receive our service, then please click on the "Select" button. But, if you are not exactly sure, then please click on the "Consult Now" button.</p>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/services/dental_implants'">Select</button>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/consultation' ">Consult Now</button>

    </div>




      {{-- Footer Element --}}
      <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'"   alt="">

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

    </div>





</div>






