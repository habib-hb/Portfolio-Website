

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
            <img src="{{asset('images/wordpress.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{session('theme_mode') == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
        </div>

        <h1 class="text-center text-2xl font-medium {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mt-2">WordPress</h1>

        <div class="flex flex-row items-center gap-2 justify-center mt-2">
            <img src="{{session('theme_mode') == 'light' ? asset('images/person_icon_light_mode.png') : asset('images/person_icon_dark_mode.png')}}" class="h-[40px] w-[40px]" alt="">

            <div class="flex flex-col justify-start items-start ">

                <p class="text-left font-semibold p-0 m-0 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Habibur Rahman</p>

                <p class="text-left {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">27 July, 2022</p>

            </div>
        </div>
    </div>



{{-- The Blog Text Section --}}
<div class="max-w-[800px] mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-6">
        Everything You Need to Know About WordPress (Plus a Price Estimation Guide!)
    </h1>

    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        WordPress is one of the most versatile and popular platforms for building websites. This blog will guide you through the essentials of WordPress, its standout features, and how to estimate the cost of creating a WordPress website.
    </p>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">What Is WordPress?</h2>
    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        WordPress is an open-source content management system (CMS) that powers millions of websites worldwide. It provides users with an intuitive platform to build and manage blogs, business websites, e-commerce stores, and more without requiring advanced coding knowledge.
    </p>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Key Features of WordPress</h2>
    <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        <li><strong>Customizable Themes:</strong> Choose from thousands of free and premium themes to match your brand identity.</li>
        <li><strong>Plugins:</strong> Extend functionality with a wide range of plugins for SEO, security, e-commerce, and more.</li>
        <li><strong>User-Friendly Interface:</strong> Easily manage your content with a simple and intuitive dashboard.</li>
        <li><strong>SEO-Friendly:</strong> Built-in tools and plugins to improve your site's search engine rankings.</li>
    </ul>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Why Invest in a WordPress Website?</h2>
    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        A WordPress website offers flexibility and scalability for businesses of all sizes. Key benefits include:
    </p>
    <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        <li>Cost-effective solutions for building professional websites.</li>
        <li>Highly customizable to meet specific business needs.</li>
        <li>Strong community support for troubleshooting and updates.</li>
        <li>Scalable platform suitable for blogs, e-commerce, and enterprise websites.</li>
    </ul>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">What to Expect During WordPress Development</h2>
    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        The WordPress development process typically involves:
    </p>
    <ol class="list-decimal list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        <li><strong>Requirement Gathering:</strong> Identifying goals, features, and target audience.</li>
        <li><strong>Theme Selection:</strong> Choosing or customizing a theme that aligns with your vision.</li>
        <li><strong>Plugin Integration:</strong> Adding functionality with the right plugins.</li>
        <li><strong>Content Creation:</strong> Developing and uploading engaging content.</li>
        <li><strong>Testing and Launch:</strong> Ensuring the website is fully functional and optimized before going live.</li>
    </ol>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Planning Your Budget</h2>
    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        The cost of a WordPress website depends on factors like design complexity, plugin requirements, and content volume. Use our price estimation tool to get a tailored quote for your project.
    </p>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Conclusion</h2>
    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">
        WordPress is a robust and flexible platform that can bring your digital vision to life. Whether you’re building a blog, a business website, or an online store, WordPress has the tools to help you succeed. Start your journey today with our price estimation tool!
    </p>
</div>



    {{-- Consult Now Button --}}
    <div class="flex flex-col w-[96%] max-w-[800px] mx-auto items-center justify-center mt-6 {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg py-4  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} px-4">If you are sure that you have this problem and want to receive our service, then please click on the "Select" button. But, if you are not exactly sure, then please click on the "Consult Now" button.</p>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/services/wordpress'">Select</button>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/consultation' ">Consult Now</button>

    </div>




      {{-- Footer Element --}}
      <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'"   alt="">

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

    </div>





</div>






