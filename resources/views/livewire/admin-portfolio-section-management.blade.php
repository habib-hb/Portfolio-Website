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

    {{-- Messages --}}
    @if (session()->has('message'))
        <div
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-left">{{ session('message') }}</p>

            </div>

            <button wire:click="remove_session_message"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

        </div>
    @endif

    @if (session()->has('error'))
        <div id="appointment_unfulfilled"
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10">
            <div class="flex flex-col justify-between items-center px-8">

                <p class="text-white text-center">{{ session('error') }}</p>

            </div>

            {{-- <button onclick="document.getElementById('appointment_unfulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

            <button wire:click="remove_session_error"
                class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>



        </div>
    @endif

    {{-- Confirmation Panel --}}
    @if ($confirmation_alert['active'])
        <div id="appointment_unfulfilled"
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  {{ $confirmation_alert['type'] == 'query' ? 'bg-[#1A579F]' : 'bg-red-800' }} py-4 rounded-lg z-10">
            <div class="flex flex-col justify-between items-center px-8">

                <p class="text-white text-3xl font-semibold">{{ $confirmation_alert['title'] }}</p>

                {{-- <p class="text-white text-left">{{session('appointment_unfulfilled')}}</p> --}}
                <p class="text-white text-center">{{ $confirmation_alert['message'] }}</p>

            </div>

            {{-- <button onclick="document.getElementById('appointment_unfulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

            <div class="flex flex-row justify-between items-center py-4 gap-4">

                <button wire:click="{{ $confirmation_alert['action'] }}('{{ $confirmation_alert['id'] }}')"
                    class="text-white border-2 border-white px-4 rounded-lg hover:scale-110">Delete</button>

                <button wire:click="clear_confirmation_alert"
                    class="text-white border-2 border-white px-4 rounded-lg hover:scale-110">Cancel</button>

            </div>




        </div>
    @endif


    <!-- Show a loading spinner while Doing Theme Change Processing -->
    <div wire:loading wire:target="changeThemeMode"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
        </div>


    </div>

    <div wire:loading wire:target="save_item"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Saving Item...</span>
        </div>


    </div>

    <div wire:loading wire:target="save_option"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Saving Option...</span>
        </div>


    </div>

    <div wire:loading wire:target="deleteOption"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Deleting Option...</span>
        </div>


    </div>

    <div wire:loading wire:target="deleteItem"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Deleting Item...</span>
        </div>


    </div>

    <div wire:click="changeThemeMode"
        class="flex justify-center w-fit mx-auto mt-6 md:hover:scale-105 transition-all cursor-pointer">

        <img src="{{ asset('images/light_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? '' : 'hidden' }}">

        <img src="{{ asset('images/dark_mode_toggler.png') }}"
            class="h-[44px] {{ session('theme_mode') == 'light' ? 'hidden' : '' }}">

    </div>




    <main class="flex flex-col min-h-screen w-[96vw]  md:max-w-[800px] mx-auto">
        <h1
            class="text-2xl font-semibold text-center mt-4 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
            Add Portfolio Item</h1>


        <div class="flex flex-col mt-2">

            <label for="title"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Item
                Title</label>

            <input type="text" wire:model="item_title"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>


        <div class="flex flex-col mt-2">

            <label for="site_link"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Site
                Link</label>

            <input type="text" wire:model="site_link"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>


        <div class="flex flex-col mt-2">

            <label for="github_link"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Github
                Link</label>

            <input type="text" wire:model="github_link"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>


        <div class="flex flex-col mt-2 mb-6">

            <label for="item_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Item Thumbnail
                Image (Make sure it's less than 1mb)</label>

            @if ($temporary_image_portfolio)
                <img src="{{ $temporary_image_portfolio }}" class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]"
                    alt="">
            @endif

            <input wire:model="item_image" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="item_image" />

            @error('blog_image')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>

        {{-- TinyMCE Text Area --}}
        <script src="https://cdn.tiny.cloud/1/l55gbz5vnerknywvd7pxpjk7wsgpu3drem4qpol4u13x5327/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>


        <script>
            function tinemce_init() {
                const themeMode = document.getElementById('main_div').getAttribute('data-theme-mode');

                // Destroying the existing TinyMCE instance if it exists
                if (tinymce.get('tinymce')) {
                    tinymce.get('tinymce').remove();
                }

                tinymce.init({
                    selector: '#tinymce',
                    plugins: [
                        // Core editing features
                        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists',
                        'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',

                    ],
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [{
                            value: 'First.Name',
                            title: 'First Name'
                        },
                        {
                            value: 'Email',
                            title: 'Email'
                        },
                    ],
                    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                        'See docs to implement AI Assistant')),

                    // Dark mode logic
                    skin: themeMode === 'dark' ? 'oxide-dark' : 'oxide',
                    // skin: 'oxide-dark',
                    content_css: themeMode === 'dark' ? 'dark' : 'default',
                    // content_css: 'dark',


                    setup: function(editor) {

                        // editor.on('init', function() {
                        //     editor.setContent(value);
                        // });

                        editor.on('change', function() {
                            // Update the Livewire property when TinyMCE content changes
                            Livewire.dispatch('updateTextarea', {
                                text: editor.getContent()
                            });

                        });



                    }
                });

            }

            tinemce_init();

            document.addEventListener('livewire:initialized', function() {


                Livewire.on('alert-manager', () => {

                    setTimeout(() => {

                        tinemce_init();

                    }, 10);

                });


            })
        </script>


        <label class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Item
            Description</label>
        <div id="tinymce_div" class="" wire:ignore>

            <textarea id="tinymce">
                {{$blog_area}}
            </textarea>

        </div>


        <div class="flex flex-col mt-2">

            <label for="technologies_used"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Technologies
                Used (Write Comma Separated Values)</label>

            <input type="text" wire:model="technologies_used"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>


        <div class="flex flex-row justify-center items-center my-8">

            <button wire:click="save_item"
                class="bg-[#1a579f] hover:scale-110 transition-all w-[200px] text-white font-bold py-2 px-4 rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Save</button>

        </div>



        {{-- Manage Options & Items Section --}}

        <div
            class="flex flex-col justify-center items-center mt-8 {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} px-4 py-8 mx-auto w-[96vw] max-w-[800px] rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <h1
                class="flex flex-row text-center {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                To Select Special Annual Holidays Or Annual Off Days, Click The "Select Annual Holidays" Button Below.
                If You Want To View Already Submitted Holidays Or Delete Specific Holidays, Click The "Submitted Annual
                Holidays" Button.</h1>

            {{-- Created Items Section --}}
            <button wire:click="created_portfolios"
                class="px-4 py-2 w-[280px] bg-[#1A579F] text-white rounded-lg hover:scale-110 transition-all mt-4 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Created
                Portfolios <img src="{{ asset('images/press_down.png') }}"
                    class="w-[14px] inline -mt-1 {{ $created_portfolios_selected ? 'rotate-180' : 'rotate-0' }}  transition-all" /></button>


            <div
                class="flex flex-col gap-4 w-full max-h-[70vh] overflow-auto {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-black' }} items-center  my-4  px-4 py-4 md:px-8 {{ $created_portfolios_selected ? '' : 'hidden' }} rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

                @foreach ($items_array as $item)
                    <div {{-- 'portfolio_title' => $item->portfolio_title,
                    'portfolio_description' => $item->portfolio_description,
                    'portfolio_image_link' => $item->portfolio_image_link,
                    'technologies_used' => $item->technologies_used,
                    'portfolio_site_link' => $item->portfolio_site_link,
                    'portfolio_github_link' => $item->portfolio_github_link,
                    'id' => $item->item_id --}}
                        class="flex w-full flex-col justify-center items-center py-4 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8]' : 'bg-[#1e1d1d]' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]">

                        <img src="{{ $item['portfolio_image_link'] }}"
                            class="h-[160px] w-auto max-w-[240px] rounded object-contain" alt="">

                        <p class="text-2xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                            {{ $item['portfolio_title'] }}</p>

                        <a href="{{ $item['portfolio_site_link'] }}" target="_blank"
                            class="text-md opacity-60 {{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }}">
                            Site link: {{ $item['portfolio_site_link'] }}</a>

                        <a href="{{ $item['portfolio_github_link'] }}" target="_blank"
                            class="text-md opacity-60 {{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }}">
                            Github link: {{ $item['portfolio_github_link'] }}</a>

                        <div class="px-5 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                            {!! $item['portfolio_description'] !!}</div>

                        <p
                            class="text-md opacity-75 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                            Technologies Used: {{ $item['technologies_used'] }}</p>

                        {{-- <button wire:click="deleteItem('{{ $item['id'] }}')" --}}
                        <button
                            wire:click="confirm_window( 'deletePortfolio' , '{{ $item['id'] }}', 'Are You Sure You Want To Delete This Portfolio Item?')"
                            class="h-[35px] w-[100px] rounded-lg bg-red-800 mt-2 md:mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">Delete</button>
                    </div>
                @endforeach


                @if (count($items_array) == 0)
                    <p
                        class="text-lg text-center {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                        No Items Found</p>
                @endif



            </div>

            {{-- End Created Items Section --}}

        </div>

        {{-- End Manage Options & Items Section --}}



    </main>





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







    {{-- <script>

    document.addEventListener('livewire:initialized', () => {

        Livewire.on('alert-manager', () => {

            setTimeout(() => {

                document.body.classList.contains('dark') ? document.body.classList.remove('dark') : document.body.classList.add('dark');

            }, 100);

        })

    })



</script> --}}


</div>
