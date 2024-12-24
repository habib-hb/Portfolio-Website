

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



        <div class="min-h-[100vh] mt-8">
             {{-- Privacy Policy --}}
        <div class="{{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} max-w-[800px] mx-auto px-2 md:px-0">

            <h1 class="text-center md:text-start fw-bold h1 text-2xl">Privacy Policy</h1><br><p class="page_speed_1719673183"><strong> LAST MODIFIED: <span id="date">3/10/2024</span></strong></p><br><p><span class="website_name company_name">Value Adder Habib</span> takes your privacy very seriously. This Privacy Policy explains how <span class="website_name">Dental - Value Adder Habib</span> collects, uses, and discloses information, and your choices for managing your information preferences.</p><p>This Privacy Policy describes <span class="website_name">Dental - Value Adder Habib</span>’s data practices associated with our website (<a href="https://dental.valueadderhabib.com/" class="website_url">dental.valueadderhabib.com/</a>) and <span class="website_name">Dental - Value Adder Habib</span> services ("Services"), and the choices that <span class="website_name">Dental - Value Adder Habib</span> provides in connection with our collection and use of your information. This Privacy Policy is intended for website publisher customers ("Publishers"), website merchant customers ("Merchants") and individual users of websites and apps. For Publishers and Merchants, this Policy explains how <span class="website_name">Dental - Value Adder Habib</span> may collect, use and disclose information associated with your company and with your company’s websites and apps that use <span class="website_name">Dental - Value Adder Habib</span> Services. For individual website and app users, this Privacy Policy explains how <span class="website_name">Dental - Value Adder Habib</span> may collect, use, and disclose information when you visit our website or when you use any website or app that uses <span class="website_name">Dental - Value Adder Habib</span> Services.</p><p>Publishers and Merchants and other clients may also have their own policies that govern how they collect, use, and share data. These policies may differ from <span class="website_name">Dental - Value Adder Habib</span>’s policies described in this Privacy Policy. Please consult the privacy policies of the websites you visit and apps you use to become familiar with their privacy practices and to learn about any choices that these companies may offer with respect to their information practices. In addition, any website containing our Services may contain links to websites or content operated and maintained by third parties, over which we have no control. We encourage you to review the privacy policy of a third-party website before disclosing any information to the website.</p><br><br><p><strong class="page_speed_392176928">1. Information Collection and Use</strong></p><br><p><span class="website_name">Dental - Value Adder Habib</span> collects data in a variety of ways - including through the use of log files, pixel tags, cookies, and/or similar technologies. Examples of the types of data that we collect are:</p><br><ul><li>Browser information (e.g. URL, browser type, ‘click through’ data);</li><li>Ad reporting or delivery data (e.g. size/type of ad, ad impressions, location/format of ad, data about interactions with the ad);</li><li>Device-type information (e.g. screen dimensions, device brand and model);</li><li>Information about your activities on our website and Services.</li></ul><br><p>We may combine information that does not directly identify an individual with data collected from other sources and disclose the combined information to participating publishers, advertisers and ad networks so that they can determine whether to bid on ad inventory and in order to improve the relevance of the advertising presented to users. We also use the information we collect to host, operate, maintain, secure, and further develop and improve our Services, such as to keep track of advertising delivery and to measure the effectiveness of advertising delivered through our Services, and investigate compliance with <span class="website_name">Dental - Value Adder Habib</span>’s policies and terms and conditions. Some of the third parties that we work with may contribute additional data to us directly, which we may combine with our own in order to help us provide a better service. We do not collect any information that could be used to directly identify an individual.</p><p><span class="website_name">Dental - Value Adder Habib</span> does not engage in activities that require parental notice or consent under the Children’s Online Privacy Protection Act (COPPA). If you believe that <span class="website_name">Dental - Value Adder Habib</span> has inadvertently collected information from a child under 13 that is subject to parental notice and consent under COPPA, please contact <span class="website_name">Dental - Value Adder Habib</span> using the contact information below to request deletion of the information.</p><br><br><p><strong class="page_speed_392176928">2. Cookies and Other Similar Technologies.</strong></p><br><p>We use cookies (a small file containing a string of characters that uniquely identifies your Web browser), Web beacons (an electronic file placed within a Web site that monitors usage), pixels, tags, and similar technologies to operate and improve our website and Services, including for interest-based advertising as described below. Some of our Service Providers (defined below) may also use such technologies in connection with the services they perform on our behalf.</p><br><br><p><strong class="page_speed_392176928">3. Information Sharing</strong></p><br><p>We will disclose contact and billing information to third parties only as described in this Privacy Policy:</p><br><ul><li>with your express permission;</li><li>with our affiliates, which include entities controlling, controlled by, or under common control with <span class="website_name">Dental - Value Adder Habib</span>;</li><li>where we contract with third parties to provide certain services, such as advertising, analytics, data management services, web hosting, and web development ("Service Providers"). We ask Service Providers to confirm that their privacy and security practices are consistent with ours, we provide our Service Providers with only the information necessary for them to perform the services we request, and Service Providers are prohibited from using such information for purposes other than as specified by <span class="website_name">Dental - Value Adder Habib</span>;</li><li>in the event that <span class="website_name">Dental - Value Adder Habib</span> is merged, sold, or in the event of a transfer of some or all of our assets (including in bankruptcy), or in the event of another corporate change, we may disclose or transfer information in connection with such transaction; and</li><li>where we believe it is necessary to protect <span class="website_name">Dental - Value Adder Habib</span> or our users; to enforce our terms or the legal rights of <span class="website_name">Dental - Value Adder Habib</span> or others; or to comply with a request from governmental authorities, legal process, or other legal obligations.</li></ul><br><p>We may also share and disclose other information that we collect, including aggregate information, as we consider necessary to develop and provide our Services, including in the ways described above. The information that we share in this way would not be considered to personally identify an individual.</p><p><span class="website_name">Dental - Value Adder Habib</span> may also be required to disclose information in response to lawful requests by public authorities, including to meet national security or law enforcement requirements.</p><br><br><p><strong class="page_speed_392176928">4. Interest-Based Advertising and Opting Out</strong></p><br><p><span class="website_name">Dental - Value Adder Habib</span> adheres to the Digital Advertising Alliance (DAA) Self-Regulatory Principles in the US and to the European Digital Advertising Alliance (EDAA) Principles in the EU and the IAB Europe OBA Framework.</p><p>The <span class="website_name">Dental - Value Adder Habib</span> Ad Exchange uses cookies, Web beacons, pixels, tags, and similar technologies to give Publishers the possibility to offer, and Ad Exchange advertisers the ability to show, targeted ads on the device on which you are viewing this policy or a different device. These ads are more likely to be relevant to you because they are based on inferences drawn from location data, web viewing data collected across non-affiliated sites over time, and/or application use data collected across non-affiliated apps over time. This is called "interest-based advertising." In addition, certain third parties may collect data on the <span class="website_name">Dental - Value Adder Habib</span> website and combine this data with information collected from other websites over time for purposes that include interest-based advertising.</p><br><br><p><strong class="page_speed_392176928">5. Opting Out for Cookie-Based Services</strong></p><br><p>If you would like to learn more about this type of advertising, or would prefer to opt out of website interest-based advertising enabled by <span class="website_name">Dental - Value Adder Habib</span>’s Ad Exchange, European Union residents may opt-out of this form of advertising by companies participating in the EDAA at www.youronlinechoices.com and all other users may visit www.aboutads.info/choices to opt out of this form of advertising by companies participating in the DAA self-regulatory program. Please note that in order for your opt-out choice to be effective using this tool, you must ensure that your browser is set to accept third-party cookies such as the <span class="website_name">Dental - Value Adder Habib</span> opt-out cookie. Some browsers block third-party cookies by default, and you may need to change your browser settings to accept third-party cookies before opting out.</p><br><br><p><strong class="page_speed_392176928">6. Opting Out for Certain Non-Cookie Services (in applicable countries)</strong></p><br><p>To help identify your browser and/or possible relationships between different browsers and devices, <span class="website_name">Dental - Value Adder Habib</span> or our partners may use the local storage or cache in your browser. Using the browser cache or local storage helps <span class="website_name">Dental - Value Adder Habib</span> or our partners deliver interest-based advertising to a browser without the use of third-party cookies. We are using local storage only for application processing, not for any tracking processes. To opt out of <span class="website_name">Dental - Value Adder Habib</span>’s use of local storage or the browser cache to provide its services, please (1) use any tools provided by your browser to clear local storage and the browser cache, and (2) turn on any "Do Not Track" header setting offered by your browser. As long as the two steps are completed and maintained on a browser, <span class="website_name">Dental - Value Adder Habib</span> will not use local storage or the cache on that browser to identify and sync browsers and devices. If you also want to opt out of <span class="website_name">Dental - Value Adder Habib</span>’s use of third-party cookies for interest-based advertising as enabled by <span class="website_name">Dental - Value Adder Habib</span>’s Ad Exchange, please see instructions above.</p><br><br><p><strong class="page_speed_392176928">7. Opting Out for Mobile Application Data</strong></p><br><p>To opt out of <span class="website_name">Dental - Value Adder Habib</span>’s collection, use, and transfer of data for interest-based advertising on mobile apps, you may download the DAA’s AppChoices application from the Android or iOS app store on your mobile device. <span class="termzy">Os <a href="https://seguidores.app.br" style="color: black; text-decoration: none;">seguidores brasileios</a> estão interagindo mais.</span> Users outside the United States may not have access to this application; instead, you can use "Limit Ad Tracking" in your iOS settings or "Opt out of interest-based ads" in your Android settings to limit <span class="website_name">Dental - Value Adder Habib</span>’s collection of data for interest-based advertising.</p><br><br><p><strong class="page_speed_392176928">8. Opting Out for Location Data</strong></p><br><p>You may opt out of our collection, use, and transfer of precise location data by using the location services controls in your mobile device’s settings.</p><br><br><p><strong class="page_speed_392176928">9. Effect of Opting Out</strong></p><br><p>If you use a different device or browser, or erase cookies from your browser, you will need to renew your opt-out choice.<img  src="//sstatic1.histats.com/0.gif?4734850&amp;101" alt="" border="0"></p><p>If you opt out of <span class="website_name">Dental - Value Adder Habib</span>’s practices, you may continue to receive interest-based advertising through other companies. Third-party advertisers and ad networks that participate in the <span class="website_name">Dental - Value Adder Habib</span> Ad Exchange may also use their own cookies and other ad service technologies to display and track their ads. We do not control and are not responsible for such third-party advertisers and ad networks’ information practices or their use of cookies and other ad service technologies. To learn more about the practices of these companies, please read their privacy policies.</p><p>Even if you opt-out, <span class="website_name">Dental - Value Adder Habib</span> may continue to collect data for other purposes. You still will receive advertising from the <span class="website_name">Dental - Value Adder Habib</span> Ad Exchange when you visit websites of a Publisher who uses our Services – but such advertisements will not be targeted to you.</p><br><br><p><strong class="page_speed_392176928">10. Reviewing and Updating Information</strong></p><br><p><span class="website_name">Dental - Value Adder Habib</span> takes reasonable steps to ensure that information is accurate, complete, current, and reliable for its intended use. For contact or billing information submitted through our website, you may review, correct, update, or change your information, request that we deactivate your account, or remove your information from our direct marketing efforts, at any time by emailing us <a href="mailto:developerhabib1230@gmail.com" class="website_email">developerhabib1230@gmail.com</a>.</p><br><br><p><strong class="page_speed_392176928">11. International Information Transfers</strong></p><br><p>Please be aware that the information we collect, including contact and billing information, may be transferred to and maintained on servers or databases located outside your state, province, country, or other jurisdiction, where the privacy laws may not be as protective as those in your location. If you are located outside of the United States, please be advised that we process and store information in the United States and your consent to this Privacy Policy or use of <span class="website_name">Dental - Value Adder Habib</span> Services represents your agreement to this processing.</p><br><br><p><strong class="page_speed_392176928">12. Security</strong></p><br><p>Information that we collect is stored using procedures and practices reasonably designed to help protect information from unauthorized access, destruction, use, modification, or disclosure.</p><br><br><p><strong class="page_speed_392176928">13. Policy Updates</strong></p><br><p>From time to time, we may change this Privacy Policy. If we decide to change this Privacy Policy, in whole or in part, we will inform you by posting the revised Privacy Policy on the <span class="website_name">Dental - Value Adder Habib</span> website. Those changes will go into effect on the effective date disclosed in the revised Privacy Policy.</p><br><br><p><strong class="page_speed_392176928">14. Contact Us</strong></p><br><p>If you have any questions or concerns regarding this <span class="website_name">Dental - Value Adder Habib</span> Privacy Policy, please contact us by emailing us at <a href="mailto:developerhabib1230@gmail.com" class="website_email">developerhabib1230@gmail.com</a>.</p>

        </div>

            {{-- End Privacy Policy --}}



        </div>





        {{-- Footer Element --}}
        <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


            <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'"   alt="">

            <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

            <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

        </div>


</div>






