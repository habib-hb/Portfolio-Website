

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
            <img src="{{asset('images/teeth_whitening.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{session('theme_mode') == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
        </div>

        <h1 class="text-center text-2xl font-medium {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mt-2">Teeth Whitening</h1>

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

        <h1 class="text-3xl font-bold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-6">A Comprehensive Guide to Teeth Whitening (With a Handy Price Estimation Tool!)</h1>

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> Brightening your smile with a professional teeth whitening treatment can enhance your confidence and appearance in just a few sessions. With various whitening options available, it’s important to understand the process and costs associated with each one. In this blog, we’ll take a deep dive into what teeth whitening is, why it’s so popular, and how you can achieve a glowing smile. Plus, we’ve included a price estimation tool to help you plan for the procedure. </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">What Is Teeth Whitening?</h2>

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> Teeth whitening is a cosmetic dental procedure aimed at removing stains and discoloration to give you a whiter, brighter smile. Over time, teeth can become stained due to aging, diet (think coffee, wine, and soda), smoking, or even certain medications. Whitening treatments work by breaking down stains on the surface or deep inside the teeth, depending on the method used. </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Why Consider Teeth Whitening?</h2>
         <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> A whiter smile is often associated with good health, youth, and confidence. Teeth whitening can be a quick and effective way to refresh your appearance, especially for important occasions such as weddings, job interviews, or major social events. If you're unhappy with the color of your teeth, whitening can be a simple solution to achieve the smile you've always wanted. </p>

         <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Types of Teeth Whitening Treatments</h2>

         <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> There are several methods available for whitening your teeth, each with its own pros and cons: </p>
          <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
             <li><strong>In-Office Whitening:</strong> A professional treatment performed at the dentist’s office that offers the quickest and most noticeable results. In just one session, your teeth can become multiple shades lighter.</li>
              <li><strong>Take-Home Kits:</strong> These kits, provided by your dentist, allow you to whiten your teeth at your convenience. They include custom trays and whitening gel that you apply over a series of days or weeks.</li>
              <li><strong>Over-the-Counter Products:</strong> Whitening toothpaste, strips, or gels that can be purchased at your local drugstore. While more affordable, these methods tend to be less effective than professional options.</li>
             </ul>

             <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">How Long Does Teeth Whitening Last?</h2>

             <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> The longevity of your teeth whitening results depends on your habits and the type of whitening treatment used. Professional in-office whitening can last from six months to a few years, especially if you avoid stain-causing foods and beverages and maintain good oral hygiene. Take-home kits and over-the-counter products may require more frequent touch-ups to maintain your results. </p>

             <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Myths About Teeth Whitening</h2>
             <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> There are several misconceptions about teeth whitening that might make people hesitant to try it. Let’s clear up some of the most common myths: </p>

             <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> <li><strong>Myth 1:</strong> Whitening damages your teeth – When done correctly, professional teeth whitening is safe and does not harm the enamel.</li>

                <li><strong>Myth 2:</strong> All teeth whiten evenly – Whitening treatments work best on natural teeth, but certain stains (like those caused by medications) may be more difficult to remove.</li>
                 <li><strong>Myth 3:</strong> Once whitened, teeth stay white forever – While teeth whitening can provide long-lasting results, lifestyle choices and diet can cause teeth to stain again over time.</li>

                </ul> <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">What to Expect During a Teeth Whitening Session</h2>

                <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> Teeth whitening sessions are generally quick and pain-free. Here's what typically happens during a professional treatment: </p>

                <ol class="list-decimal list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
                     <li><strong>Preparation:</strong> Your dentist will examine your teeth, clean them, and apply a protective barrier to your gums.</li> <li><strong>Whitening Gel Application:</strong> A peroxide-based gel is applied to the surface of your teeth, which will break down stains.</li>
                      <li><strong>Activation:</strong> In some cases, a special light or laser is used to enhance the whitening effects of the gel.</li>

                      <li><strong>Rinse:</strong> After the treatment, the gel is removed, and you can see immediate results.</li>

                    </ol> <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Teeth Whitening vs. Veneers: What’s the Difference?</h2> <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> While both teeth whitening and veneers can improve the appearance of your smile, they serve different purposes. Teeth whitening removes stains and restores your natural tooth color, whereas veneers are thin shells placed over the teeth to change their shape, size, or color. Veneers are a more permanent solution for individuals with significant discoloration, while whitening is ideal for those looking to brighten their natural teeth. </p>

                    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Planning for the Cost of Teeth Whitening</h2>

                    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> The cost of teeth whitening can vary depending on the type of treatment you choose and the extent of discoloration. In-office whitening tends to be more expensive than at-home kits, but it also delivers the fastest and most dramatic results. Use our price estimator tool to get a personalized cost estimate based on your needs, so you can plan accordingly. </p>

                    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4"> Remember, investing in your smile is an investment in your self-confidence and overall appearance. Be sure to speak with your dentist to discuss the best treatment options for your goals and budget. </p> <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Conclusion</h2>

                    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}"> Teeth whitening is a popular cosmetic treatment that can transform your smile in a short amount of time. Whether you choose in-office whitening, take-home kits, or over-the-counter products, there’s an option for everyone. Use our price estimator to find out how much you can expect to spend, and schedule a consultation with your dentist to begin your journey to a brighter, whiter smile! </p>

    </div>



    {{-- Consult Now Button --}}
    <div class="flex flex-col w-[96%] max-w-[800px] mx-auto items-center justify-center mt-6 {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg py-4  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} px-4">If you are sure that you have this problem and want to receive our service, then please click on the "Select" button. But, if you are not exactly sure, then please click on the "Consult Now" button.</p>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/services/teeth_whitening'">Select</button>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/consultation'">Consult Now</button>

    </div>




      {{-- Footer Element --}}
      <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'"   alt="">

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

    </div>








</div>






