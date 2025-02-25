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

    <div wire:loading wire:target="blog_image"
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

            <span class=" text-white py-2 rounded-lg"> Updating...</span>
        </div>


    </div>


    {{-- End Show a loading spinner while Doing Theme Change Processing --}}



    {{-- Notifications --}}
    {{-- From Completion Notification --}}
    @if ($form_completion_message)
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-left">{{ $form_completion_message }}</p>

            </div>

            <button wire:click="clear_form_completion_message"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif



    {{-- Form Error Message --}}
    @if ($form_error_message)
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit mx-auto w-[90%] max-w-[400px]  bg-[#9f1a1a] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">

                <p class="text-white text-center">{{ $form_error_message }}</p>

            </div>

            <button wire:click="clear_form_error_message"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif
    {{-- End Notifications --}}



    <div class="flex justify-center relative w-full max-w-[800px] mx-auto mt-6">
        <img src="{{ session('theme_mode') == 'light' ? asset('images/back_light_mode.png') : asset('images/back_dark_mode.png') }}"
            class="absolute left-1 md:left-0 h-[48px] w-[48px]  md:hover:scale-105 transition-all cursor-pointer"
            onclick="window.location.href='/admin_dashboard'" alt="">

        <img wire:click="changeThemeMode" src="{{ asset('images/light_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? '' : 'hidden' }} md:hover:scale-105 transition-all cursor-pointer">

        <img wire:click="changeThemeMode" src="{{ asset('images/dark_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? 'hidden' : '' }} md:hover:scale-105 transition-all cursor-pointer">

    </div>



    <div class="flex flex-col w-[96vw] md:max-w-[800px] mx-auto mt-4">

        <div class="flex flex-col mt-2">

            <label for="author_name"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Author
                Name</label>

            <input wire:model="author_name" type="text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="author_name">

        </div>

        <div class="flex flex-col mt-2">
            <label for="blog_headline"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Blog
                Headline</label>

            <input wire:model="blog_headline" type="text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="blog_headline">

        </div>

        <div class="flex flex-col mt-2">

            <label for="blog_slug"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Blog Slug
                (Unique Identifier Link Text. eg: "my-blog") </label>

            @if ($slug_already_in_use)
                <p class="text-red-900 font-bold">{{ $slug_already_in_use }}</p>
            @endif

            @if ($slug_available)
                <p class="text-teal-900 font-bold">{{ $slug_available }}</p>
            @endif

            <input wire:model.live="blog_slug" type="text"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="blog_slug">

        </div>

        <div class="flex flex-col mt-2">

            <label for="blog_excerpt"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Blog
                Excerpt</label>

            <textarea wire:model="blog_excerpt" type="text"
                class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="blog_excerpt" rows="4"></textarea>

        </div>

        <div class="flex flex-col mt-2 mb-16">

            <label for="blog_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Blog Thumbnail
                Image</label>

            <img src="{{ $temporary_image }}" class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]" alt="">


            <input wire:model="blog_image" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="blog_image" />

            <p class="text-sm {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">The Image Has To Be
                Less Than 1 MB</p>

            @error('blog_image')
                <span class="text-red-500">{{ $message }}</span>
            @enderror


        </div>


        <!-- The editor container -->
        <div
            class="{{ session('theme_mode') == 'light' ? '[&_.theme-changable]:bg-[#deeaf8] [&_.theme-changable]:text-black' : '[&_.theme-changable]:bg-[#202329] [&_.theme-changable]:text-white' }} [&_p]:text-md [&_h3]:text-lg [&_h2]:text-2xl [&_h1]:text-3xl [&_span]:!bg-transparent {{ session('theme_mode') == 'light' ? 'text-black [&_span]:!text-black [&_.ql-picker-options]:!bg-[#deeaf8]' : 'text-white [&_span]:!text-white [&_.ql-picker-options]:!bg-[#202329]' }}">
            <div wire:ignore>
                <div id="editor"
                    class="w-[96vw] md:max-w-full [&_.ql-editor]:min-h-[400px] theme-changable rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none">
                    {!! $blog_area !!}
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

                    // setTimeout(() => {
                    //     quill = new Quill('#editor', {
                    //         theme: 'snow'
                    //     })
                    //     let existing_content = @json($blog_area);
                    //     quill.setText(existing_content);
                    //     alert(existing_content);
                    // }, 10);

                });

                Livewire.on('refresh-blog-area', () => {

                    setTimeout(() => {

                        quill.setText("");

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





        <div
            class="flex flex-col gap-4 md:gap-8 justify-center items-center my-8 {{ $loading_image ? 'hidden' : '' }}">

            <button wire:click="save"
                class="bg-[#1a579f] hover:scale-110 transition-all w-[200px] text-white font-bold py-2 px-4 rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Update</button>

            <button onclick="history.back()"
                class="bg-red-800 hover:scale-110 transition-all w-[200px] text-white font-bold py-2 px-4 rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Cancel</button>

        </div>







        {{-- <button wire:click="test_image" >Image DD Test</button>

                <button wire:click="test_textarea" >Textarea DD Test</button> --}}






    </div>





    {{-- Blogs Edit Section --}}
    <div
        class="flex flex-col justify-center items-center mt-8 {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} px-4 py-8 mx-auto w-[96vw] max-w-[800px] rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <h1 class="flex flex-row text-center {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">To
            edit or delete blogs, click on the "Manage Blogs" button below</h1>

        <button
            class="px-4 py-2 w-[280px] bg-[#1A579F] text-white rounded-lg hover:scale-110 transition-all mt-4 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]"
            onclick="window.location.href='/admin_dashboard/blogs/blogs_manage'">Manage Blogs <img
                src="{{ asset('images/external_link_dark_mode.png') }}"
                class="w-[14px] inline -mt-1 transition-all" /></button>

    </div>
    {{-- End Blogs Edit Section --}}







    {{-- Footer Element --}}
    <div
        class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon'
            src="{{ session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png') }}"
            class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt="">

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">All
            Rights Reserved @2024</p>

        <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
            @valueadderhabib</p>

    </div>


</div>
