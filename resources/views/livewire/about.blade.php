

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




{{-- Main Element --}}

{{-- About me --}}


 <!-- Main Container -->
  <div class="max-w-4xl mx-auto p-8 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">

    <img src="{{asset('images/about_me_avatar.png')}}" class="max-h-[300px] max-w-[300px] rounded-lg mx-auto" alt="">

    <!-- Header -->
    <header class="text-center mb-12">
      <h1 class="text-4xl font-bold {{session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white'}}">About Me</h1>
    </header>

    <!-- Introduction Section -->
    <section class="mb-8">
      <h2 class="text-2xl font-semibold mb-4">Hello, I'm Habib!</h2>
      <p class="text-lg leading-relaxed">
        I'm a full-stack Laravel developer from Bangladesh, passionate about building functional, user-centered web applications. My love for coding has led me to work on various exciting projects. With a focus on Laravel and front-end technologies, I enjoy bringing ideas to life and solving complex problems with clean, maintainable code.
      </p>
    </section>

    <!-- Dental Project Section -->
    <section class="mb-8">
      <h2 class="text-2xl font-semibold mb-4">My Dental Project</h2>
      <p class="text-lg leading-relaxed">
        Recently, I completed a commercial-level dental project where I implemented several essential features, including:
      </p>
      <ul class="list-disc list-inside mb-4">
        <li>Price estimation system for various dental services</li>
        <li>Blog upload and control system for easy content management</li>
        <li>Appointment booking and appointment editing system</li>
        <li>Calendar feature to manage bookings and schedules</li>
        <li>Schedules management system for seamless appointment organization</li>
      </ul>
      <p class="text-lg leading-relaxed">
        I built this project using Laravel and Livewire to ensure a smooth user experience with real-time updates and responsive design. Working on this project allowed me to dive deep into user-centric features for healthcare and medical services, which was both challenging and rewarding.
      </p>
    </section>

    <!-- E-commerce Project Section -->
    <section class="mb-8">
      <h2 class="text-2xl font-semibold mb-4">E-commerce Project</h2>
      <p class="text-lg leading-relaxed">
        Another major project I developed is a comprehensive e-commerce platform using Laravel and React.js. This project includes a variety of robust features, such as:
      </p>
      <ul class="list-disc list-inside mb-4">
        <li>Product upload and edit system</li>
        <li>User management system</li>
        <li>Admin management for full control over site activities</li>
        <li>Order management for smooth handling of customer orders</li>
        <li>Comments management for user engagement</li>
        <li>Banner upload system for promotional content</li>
      </ul>
      <p class="text-lg leading-relaxed">
        You can check out the project live at <a href="https://ecommerce.valueadderhabib.com" class="text-blue-500 hover:underline">ecommerce.valueadderhabib.com</a>. This e-commerce platform allowed me to explore complex backend logic and dynamic front-end features, enhancing my skills in both Laravel and React.js.
      </p>
    </section>

    <!-- My Approach Section -->
    <section class="mb-8">
      <h2 class="text-2xl font-semibold mb-4">My Approach to Development</h2>
      <p class="text-lg leading-relaxed">
        I believe in writing clean, maintainable code that scales easily and performs efficiently. My favorite framework, Laravel, provides the perfect balance between simplicity and power, allowing me to focus on crafting solutions that meet both business goals and user needs.
      </p>
      <p class="text-lg leading-relaxed">
        I also enjoy using Livewire for real-time, dynamic functionality without the complexity of a full front-end framework. My approach is to always stay curious and keep learning, whether it's diving deeper into JavaScript frameworks or exploring the latest Laravel features.
      </p>
    </section>

    <!-- Hobbies and Interests Section -->
    <section class="mb-8">
      <h2 class="text-2xl font-semibold mb-4">Hobbies and Interests</h2>
      <p class="text-lg leading-relaxed">
        Outside of coding, I enjoy watching travel blogs and infotainment videos on YouTube. These videos not only help me unwind but also spark creativity and broaden my perspective. Learning about different cultures, places, and interesting facts keeps my curiosity alive and gives me new ideas for my work.
      </p>
    </section>

    <!-- Closing Section -->
    <section class="mb-8">
      <h2 class="text-2xl font-semibold mb-4">Looking Ahead</h2>
      <p class="text-lg leading-relaxed">
        As I continue to grow as a developer, I’m always on the lookout for new challenges and opportunities. Whether it’s working on more complex web applications, experimenting with new technologies, or contributing to projects that make a positive impact, I’m excited about what the future holds.
      </p>
      <p class="text-lg leading-relaxed">
        If you’d like to connect, collaborate, or simply have a conversation, feel free to reach out! Let’s create something amazing together.
      </p>
    </section>

  </div>

{{-- End Test About me --}}


{{-- End Main Element --}}







        {{-- Footer Element --}}
        <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


            <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'"   alt="">

            <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

            <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

        </div>


</div>







