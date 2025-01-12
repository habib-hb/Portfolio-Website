

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
            <img src="{{asset('images/full-project.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{session('theme_mode') == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
        </div>

        <h1 class="text-center text-2xl font-medium {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mt-2">Full Project</h1>

        <div class="flex flex-row items-center gap-2 justify-center mt-2">
            <img src="{{session('theme_mode') == 'light' ? asset('images/person_icon_light_mode.png') : asset('images/person_icon_dark_mode.png')}}" class="h-[40px] w-[40px]" alt="">

            <div class="flex flex-col justify-start items-start ">

                <p class="text-left font-semibold p-0 m-0 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Habibur Rahman</p>

                <p class="text-left {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">27 July, 2022</p>

            </div>
        </div>
    </div>



    {{-- The Blog Text Section
    <div class="max-w-[800px] mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}  mb-6">Everything You Need to Know About Root Canal Treatment (Plus a Price Estimation Guide!)</h1>

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            If you're experiencing pain or discomfort in a tooth, it could be a sign that something's going on beneath the surface—perhaps it's time to consider a root canal treatment. While the phrase "root canal" may sound intimidating, modern dentistry has made it a fairly straightforward and comfortable procedure. In this blog, we’ll break down everything you need to know about root canals, from what they are and when they’re needed, to what you can expect during the procedure. Plus, we'll walk you through an easy-to-use price estimator to help you plan financially for your treatment.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">What Is a Root Canal?</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            A root canal is a dental procedure designed to remove infected or damaged tissue from inside a tooth. Each of your teeth has a soft core that contains blood vessels, nerves, and connective tissue. This soft core, known as the pulp, can become infected or inflamed due to deep decay, repeated dental procedures, or injury to the tooth. When the pulp becomes inflamed, it can cause severe pain, sensitivity, and even abscesses. A root canal procedure removes the infected pulp, cleans the inner canals, and seals the tooth to prevent future infections.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Signs You Might Need a Root Canal</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            While only a dentist can officially diagnose the need for a root canal, here are a few common signs that may indicate you should book a visit:
        </p>
        <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            <li><strong>Persistent pain</strong>: If you have ongoing tooth pain that doesn’t go away, especially when you bite down or touch the tooth, it could be a sign of infection.</li>
            <li><strong>Sensitivity</strong>: A tooth that becomes extra sensitive to hot or cold temperatures (and stays sensitive long after the source is removed) might have an underlying issue.</li>
            <li><strong>Gum swelling</strong>: Swollen, tender, or puffy gums near the painful tooth can signal an infection that needs to be addressed.</li>
            <li><strong>Tooth discoloration</strong>: A tooth that becomes darker than the others could have damaged internal tissue.</li>
            <li><strong>Pimples on gums</strong>: Pimples or boils on the gums may indicate an abscess, which is a serious dental issue.</li>
        </ul>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">What Happens During a Root Canal?</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            The idea of a root canal might sound scary, but it’s essentially a routine dental procedure that’s performed to relieve pain, not cause it. Here’s what typically happens during the treatment:
        </p>
        <ol class="list-decimal list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            <li><strong>Numbing the Area:</strong> Your dentist will numb the affected area with local anesthesia to ensure you’re comfortable throughout the procedure.</li>
            <li><strong>Removing the Infected Pulp:</strong> A small opening is made in the tooth to access and remove the infected or damaged pulp.</li>
            <li><strong>Shaping the Canals:</strong> The dentist will shape the canals, preparing them for a filling.</li>
            <li><strong>Filling the Canals:</strong> The cleaned canals are filled with a biocompatible material called gutta-percha.</li>
            <li><strong>Restoring the Tooth:</strong> You may receive a crown to protect the treated tooth.</li>
        </ol>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Why Are Root Canals Important?</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Root canals are vital for saving teeth that might otherwise need to be extracted due to infection or damage. Losing a tooth can lead to more complicated dental problems down the road, such as misalignment of surrounding teeth, difficulty chewing, and jawbone deterioration. By preserving the natural tooth through a root canal, you’re also maintaining your ability to chew normally and smile with confidence.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Myths About Root Canal Treatment</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Despite how common root canal treatment is, it still carries a lot of misconceptions that can cause unnecessary fear. Let’s address some of the most common myths:
        </p>
        <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            <li><strong>Myth 1:</strong> Root canals are painful – Thanks to advancements in dental technology and anesthesia, root canal procedures are usually no more painful than getting a filling.</li>
            <li><strong>Myth 2:</strong> It’s better to pull the tooth – In most cases, it’s preferable to save your natural tooth rather than extracting it.</li>
            <li><strong>Myth 3:</strong> Root canals cause illness – There’s no scientific evidence linking root canal-treated teeth to systemic health issues.</li>
        </ul>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Recovering from a Root Canal</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            After the procedure, it’s normal to feel some sensitivity in the treated area for a few days. Here are some tips for a smooth recovery:
        </p>
        <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            <li>Take over-the-counter pain medication, such as ibuprofen, to manage discomfort.</li>
            <li>Avoid chewing on the treated tooth until your permanent crown is placed.</li>
            <li>Maintain good oral hygiene to keep the area clean and prevent infection.</li>
            <li>Attend any follow-up appointments as recommended by your dentist.</li>
        </ul>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Root Canal vs. Extraction: Why Save the Tooth?</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Some people might wonder whether it’s worth saving the tooth with a root canal or just opting for an extraction. A root canal generally offers long-term benefits such as preserving your smile and avoiding additional dental work like implants or bridges. Keeping your natural tooth is usually the best option unless your dentist advises otherwise.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Planning for the Cost of a Root Canal Treatment</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            The cost of a root canal can vary based on factors such as the complexity of the case, the tooth’s location, and additional services like crowns or sedation. Use our price estimator to get a personalized estimate for your treatment, helping you plan financially.
        </p>

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
            Investing in your dental health now can save you from more serious complications and expenses later. Take the time to estimate the cost and speak with your dentist to determine the best treatment plan.
        </p>

        <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Conclusion</h2>
        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">
            Root canal treatment is a key procedure for saving a tooth that’s been damaged or infected. Use our price estimator to plan your finances, and consult your dentist to determine the best course of action for your dental health.
        </p>
    </div> --}}



{{-- The Blog Text Section --}}
<div class="max-w-[800px] mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-6">
        Everything You Need to Know About Full Project Development (Plus a Price Estimation Guide!)
    </h1>

    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        Building a complete digital solution requires meticulous planning, creativity, and technical expertise. A "Full Project" involves crafting an end-to-end web development solution, including Figma design, frontend development, and backend integration. This blog will guide you through the essentials of a full project, its benefits, and how you can estimate the cost effectively.
    </p>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">What Is a Full Project?</h2>
    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        A full project is a comprehensive web development process that covers everything from designing a visually appealing user interface to coding a functional frontend and integrating a robust backend system. The goal is to create a seamless and scalable solution tailored to your specific requirements.
    </p>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Components of a Full Project</h2>
    <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        <li><strong>Figma Design:</strong> This phase focuses on wireframing and designing the user interface, ensuring a user-friendly and visually appealing layout.</li>
        <li><strong>Frontend Development:</strong> Building the client-side of the application using modern technologies like React, Vue, or plain HTML/CSS/JavaScript.</li>
        <li><strong>Backend Development:</strong> Setting up the server-side logic, database, and APIs to power the application.</li>
    </ul>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Why Choose a Full Project?</h2>
    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        Opting for a full project ensures that every aspect of your digital solution is seamlessly integrated and optimized. Here are some reasons to consider a full project:
    </p>
    <ul class="list-disc list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        <li>Consistency in design and functionality across all components.</li>
        <li>Scalability to accommodate future growth and updates.</li>
        <li>Tailored solutions that align with your business objectives.</li>
        <li>Reduced communication gaps as one team handles all aspects of development.</li>
    </ul>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">What to Expect During the Process</h2>
    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        The full project process typically involves the following steps:
    </p>
    <ol class="list-decimal list-inside {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        <li><strong>Requirement Gathering:</strong> Understanding your goals, target audience, and key features.</li>
        <li><strong>Design Phase:</strong> Creating Figma prototypes and iterating based on your feedback.</li>
        <li><strong>Development:</strong> Coding the frontend and backend to bring the design to life.</li>
        <li><strong>Testing:</strong> Ensuring the solution works flawlessly across devices and browsers.</li>
        <li><strong>Deployment:</strong> Launching the project on your chosen platform.</li>
    </ol>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Planning Your Budget</h2>
    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">
        The cost of a full project varies depending on the complexity, features, and timeline. Use our price estimator to get a personalized quote for your project and make informed financial decisions.
    </p>

    <h2 class="text-2xl font-semibold {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mb-4">Conclusion</h2>
    <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">
        A full project is your one-stop solution for creating a professional, scalable, and user-friendly web application. From design to deployment, each step is tailored to meet your needs. Use our price estimation tool to plan your project and take the first step towards your digital transformation today!
    </p>
</div>



    {{-- Consult Now Button --}}
    <div class="flex flex-col w-[96%] max-w-[800px] mx-auto items-center justify-center mt-6 {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg py-4  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <p class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} px-4">If you are sure that you have this problem and want to receive our service, then please click on the "Select" button. But, if you are not exactly sure, then please click on the "Consult Now" button.</p>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/services/full-project'">Select</button>

        <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all mt-4" onclick="window.location.href='{{env('BASE_LINK')}}/consultation' ">Consult Now</button>

    </div>




      {{-- Footer Element --}}
      <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'"   alt="">

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

    </div>





</div>






