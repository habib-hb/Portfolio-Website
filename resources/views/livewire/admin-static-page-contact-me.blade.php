<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}"
    data-theme-mode="{{ session('theme_mode') }}" id="main_div">

    @livewire('components.header', [
        'theme_mode' => session('theme_mode'),
        'back_button_link' => '/admin_dashboard/static-page-management',
    ])

    @livewire('components.sidebar', [
        'theme_mode' => session('theme_mode'),
    ])


    <!-- Show a loading spinner while Doing Theme Change Processing -->
    <div wire:loading wire:target="changeThemeMode"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
        </div>


    </div>

    <div wire:loading wire:target="email_icon"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Image...</span>
        </div>


    </div>

    <div wire:loading wire:target="phone_icon"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Image...</span>
        </div>


    </div>


    <div wire:loading wire:target="address_icon"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Image...</span>
        </div>


    </div>


    <div wire:loading wire:target="social_icon"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Image...</span>
        </div>


    </div>


    <div wire:loading wire:target="title_icon"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Image...</span>
        </div>


    </div>



    <div wire:loading wire:target="save"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Saving...</span>
        </div>


    </div>


    {{-- End Show a loading spinner while Doing Theme Change Processing --}}



    {{-- Notifications --}}
    {{-- From Completion Notification --}}
    @if ($notify_success)
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-left">{{ $notify_success }}</p>

            </div>

            <button wire:click="clear_notify_success"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif





    {{-- Form Error Message --}}
    @if ($notify_error)
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit mx-auto w-[90%] max-w-[400px]  bg-[#9f1a1a] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">

                <p class="text-white text-center">{{ $notify_error }}</p>

            </div>

            <button wire:click="clear_notify_error"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif
    {{-- End Notifications --}}






    <div class="flex flex-col w-[96vw] md:max-w-[800px] mx-auto mt-4">

        <h1
            class="text-[24px] lg:text-[36px] font-semibold text-center block mx-auto {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
            Contact Me Page Details</h1>

        <div class="flex flex-col mt-2">

            <label for="author_name"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Email</label>

            <input wire:model="email" type="text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="author_name">

        </div>

        <div class="flex flex-col mt-2">

            <label for="author_name"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Phone</label>

            <input wire:model="phone" type="number"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="author_name">

        </div>

        <div class="flex flex-col mt-2">

            <label for="blog_excerpt"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Address</label>

            <textarea wire:model="address" type="text"
                class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="about_excerpt" rows="4"></textarea>

        </div>

        <div class="flex flex-col mt-2">

            <label for="author_name"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Facebook
                Link</label>

            <input wire:model="facebook_link" type="text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="author_name">

        </div>

        <div class="flex flex-col mt-2">

            <label for="author_name"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Instagram
                Link</label>

            <input wire:model="instagram_link" type="text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="author_name">

        </div>

        <div class="flex flex-col mt-2">

            <label for="author_name"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Linkedin
                Link</label>

            <input wire:model="linkedin_link" type="text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="author_name">

        </div>

        <div class="flex flex-col mt-2">

            <label for="author_name"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Twitter/x
                Link</label>

            <input wire:model="twitter_link" type="text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="author_name">

        </div>

        <div class="flex flex-col mt-2">

            <label for="author_name"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Github
                Link</label>

            <input wire:model="github_link" type="text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="author_name">

        </div>

        <div class="flex flex-col mt-2 mb-6">

            <label for="blog_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Email
                Icon</label>

            @if ($temporary_image_email_icon)
                <img src="{{ $temporary_image_email_icon }}" class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]"
                    alt="">
            @endif

            <input wire:model="email_icon" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="about_icon_image" />

            <p class="text-sm {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">The Image Has To
                Be
                Less Than 1 MB</p>

            @error('email_icon')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>


        <div class="flex flex-col mt-2 mb-6">

            <label for="blog_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Phone
                Icon</label>

            @if ($temporary_image_phone_icon)
                <img src="{{ $temporary_image_phone_icon }}" class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]"
                    alt="">
            @endif

            <input wire:model="phone_icon" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="about_profile_image" />

            <p class="text-sm {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">The Image Has To
                Be
                Less Than 1 MB</p>

            @error('phone_icon')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>


        <div class="flex flex-col mt-2 mb-6">

            <label for="blog_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Address
                Icon</label>

            @if ($temporary_image_address_icon)
                <img src="{{ $temporary_image_address_icon }}"
                    class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]" alt="">
            @endif

            <input wire:model="address_icon" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="about_profile_image" />

            <p class="text-sm {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">The Image Has To
                Be
                Less Than 1 MB</p>

            @error('address_icon')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>


        <div class="flex flex-col mt-2 mb-6">

            <label for="blog_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Social
                Icon</label>

            @if ($temporary_image_social_icon)
                <img src="{{ $temporary_image_social_icon }}"
                    class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]" alt="">
            @endif

            <input wire:model="social_icon" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="about_profile_image" />

            <p class="text-sm {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">The Image Has To
                Be
                Less Than 1 MB</p>

            @error('social_icon')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>



        <div class="flex flex-col mt-2 mb-6">

            <label for="blog_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Title
                Icon</label>

            @if ($temporary_image_title_icon)
                <img src="{{ $temporary_image_title_icon }}" class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]"
                    alt="">
            @endif

            <input wire:model="title_icon" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title_icon" />

            <p class="text-sm {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">The Image Has To
                Be
                Less Than 1 MB</p>

            @error('title_icon')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>






        <!-- Initialize Quill editor -->
        <script>
            document.addEventListener('livewire:initialized', function() {


                Livewire.on('alert-manager', () => {



                });

                Livewire.on('refresh-image-area', () => {

                    setTimeout(() => {

                        document.getElementById('about_profile_image').value = null;

                        document.getElementById('about_icon_image').value = null;

                    }, 10);

                });


            })
        </script>




        <div class="flex flex-row justify-center items-center my-8">

            <button wire:click="save"
                class="bg-[#1a579f] hover:scale-110 transition-all w-[200px] text-white font-bold py-2 px-4 rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Save</button>

        </div>







        {{-- <button wire:click="test_image" >Image DD Test</button>

                <button wire:click="test_textarea" >Textarea DD Test</button> --}}






    </div>








    {{-- Footer Element --}}
    @livewire('components.footer', [
        'theme_mode' => session('theme_mode'),
    ])


</div>
