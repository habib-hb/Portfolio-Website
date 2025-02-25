<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}"
    data-theme-mode="{{ session('theme_mode') }}" id="main_div">

    <nav
        class="flex justify-center items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-center md:w-[20vw]">

            <img src="{{ asset('images/the_logo_light_mode.png') }}"
                class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} cursor-pointer"
                onclick="window.location.href='/'" alt="">

            <img src="{{ asset('images/the_logo_dark_mode.png') }}"
                class="ml-2 h-[64px] max-w-[45vw] {{ session('theme_mode') == 'light' ? 'hidden' : '' }} cursor-pointer"
                onclick="window.location.href='/'" alt="">

        </div>



    </nav>


    <!-- Show a loading spinner while Doing Theme Change Processing -->
    <div wire:loading wire:target="changeThemeMode"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
        </div>


    </div>

    <div wire:loading wire:target="about_icon_image"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Image...</span>
        </div>


    </div>

    <div wire:loading wire:target="about_profile_image"
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



    <div class="flex justify-center relative w-full max-w-[800px] mx-auto mt-6">
        <img src="{{ session('theme_mode') == 'light' ? asset('images/back_light_mode.png') : asset('images/back_dark_mode.png') }}"
            class="absolute left-1 md:left-0 h-[48px] w-[48px]  md:hover:scale-105 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard/static-page-management'" alt="">

        <img wire:click="changeThemeMode" src="{{ asset('images/light_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} md:hover:scale-105 transition-all cursor-pointer">

        <img wire:click="changeThemeMode" src="{{ asset('images/dark_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? 'hidden' : '' }} md:hover:scale-105 transition-all cursor-pointer">

    </div>



    <div class="flex flex-col w-[96vw] md:max-w-[800px] mx-auto mt-4">

        <h1
            class="text-[24px] lg:text-[36px] font-semibold text-center block mx-auto {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
            About Me Page Details</h1>

        <div class="flex flex-col mt-2">

            <label for="author_name"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Title</label>

            <input wire:model="about_title" type="text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="author_name">

        </div>

        <div class="flex flex-col mt-2">

            <label for="blog_excerpt"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Blog
                Excerpt</label>

            <textarea wire:model="about_excerpt" type="text"
                class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="about_excerpt" rows="4"></textarea>

        </div>

        <div class="flex flex-col mt-2 mb-6">

            <label for="blog_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">About Me Title
                Icon</label>

            @if ($temporary_image_icon)
                <img src="{{ $temporary_image_icon }}" class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]"
                    alt="">
            @endif

            <input wire:model="about_icon_image" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="about_icon_image" />

            <p class="text-sm {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">The Image Has To Be
                Less Than 1 MB</p>

            @error('about_icon_image')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>


        <div class="flex flex-col mt-2 mb-6">

            <label for="blog_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">About Me
                Profile Picture</label>

            @if ($temporary_image_profile)
                <img src="{{ $temporary_image_profile }}" class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]"
                    alt="">
            @endif

            <input wire:model="about_profile_image" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="about_profile_image" />

            <p class="text-sm {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">The Image Has To
                Be
                Less Than 1 MB</p>

            @error('about_profile_image')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>





        <!-- The editor container -->
        <div
            class="{{ session('theme_mode') == 'light' ? '[&_.theme-changable]:bg-[#deeaf8] [&_.theme-changable]:text-black' : '[&_.theme-changable]:bg-[#202329] [&_.theme-changable]:text-white' }} [&_p]:text-md [&_h3]:text-lg [&_h2]:text-2xl [&_h1]:text-3xl [&_span]:!bg-transparent {{ session('theme_mode') == 'light' ? 'text-black [&_span]:!text-black [&_.ql-picker-options]:!bg-[#deeaf8]' : 'text-white [&_span]:!text-white [&_.ql-picker-options]:!bg-[#202329]' }}">
            <label for="blog_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">About Me
                Content</label>
            <div wire:ignore>
                <div id="editor"
                    class="w-[96vw] md:max-w-full [&_.ql-editor]:min-h-[400px] theme-changable rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none">
                    {!! $about_me_content !!}
                </div>
            </div>
        </div>
        <!-- The editor container End -->



        <!-- Include the Quill library -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

        <!-- Initialize Quill editor -->
        <script>
            let quill = new Quill('#editor', {
                theme: 'snow'
            });

            document.addEventListener('livewire:initialized', function() {


                Livewire.on('alert-manager', () => {



                });

                Livewire.on('refresh-blog-area', () => {

                    setTimeout(() => {

                        quill.setText("");

                    }, 10);

                });

                Livewire.on('refresh-image-area', () => {

                    setTimeout(() => {

                        document.getElementById('about_profile_image').value = null;

                        document.getElementById('about_icon_image').value = null;

                    }, 10);

                });


            })

            quill.on('text-change', (delta, oldDelta, source) => {
                // if (source == 'user') {
                console.log('A user action triggered this change.');
                let checkNull = quill.getText();
                if (checkNull == '\n') {
                    Livewire.dispatch('updateTextarea', {
                        text: ''
                    });
                    return;
                }
                let deltaOps = quill.root.innerHTML;
                Livewire.dispatch('updateTextarea', {
                    text: deltaOps
                });
                // }
            });
        </script>




        <div class="flex flex-row justify-center items-center my-8">

            <button wire:click="save"
                class="bg-[#1a579f] hover:scale-110 transition-all w-[200px] text-white font-bold py-2 px-4 rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Save</button>

        </div>







        {{-- <button wire:click="test_image" >Image DD Test</button>

                <button wire:click="test_textarea" >Textarea DD Test</button> --}}






    </div>








    {{-- Footer Element --}}
    <div
        class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon'
            src="{{ session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png') }}"
            class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt="">

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">All
            Rights
            Reserved @2024</p>

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            @valueadderhabib</p>

    </div>


</div>
