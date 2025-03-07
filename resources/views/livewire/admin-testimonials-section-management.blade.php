<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}"
    data-theme-mode="{{ session('theme_mode') }}" id="main_div">

    @livewire('components.header', [
        'theme_mode' => session('theme_mode'),
        'back_button_link' => '/admin_dashboard',
    ])

    @livewire('components.sidebar', [
        'theme_mode' => session('theme_mode'),
    ])

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


    <div wire:loading wire:target="moveItemUp"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Moving Item Up...</span>
        </div>


    </div>

    <div wire:loading wire:target="moveItemDown"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Moving Item Down...</span>
        </div>


    </div>


    <div wire:loading wire:target="profile_image"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Profile Image...</span>
        </div>


    </div>



    <div wire:loading wire:target="created_testimonials"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing...</span>
        </div>


    </div>


    <div wire:loading wire:target="editTestimonial"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing...</span>
        </div>


    </div>


    <div wire:loading wire:target="deleteTestimonial"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Deleting...</span>
        </div>


    </div>



    <div wire:loading wire:target="cancel_collaboration_item_update"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Calceling Card Update...</span>
        </div>


    </div>






    <main id="add_new_testimonials_card" class="flex flex-col min-h-screen w-[96vw]  md:max-w-[800px] mx-auto">
        <h1
            class="text-2xl font-semibold text-center mt-4 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
            {{ $editable_testimonials_id == null ? 'Add' : 'Edit' }} Testimonial Card</h1>


        <div class="flex flex-col mt-2">

            <label for="title"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Name</label>

            <input type="text" wire:model="name"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>


        <div class="flex flex-col mt-2">

            <label for="site_link"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Profession</label>

            <input type="text" wire:model="profession"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="title">

        </div>


        <div class="flex flex-col mt-2">

            <label for="item_image"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Profile
                Image (Make sure it's less than 1mb)</label>

            @if ($temporary_image_testimonials)
                <img src="{{ $temporary_image_testimonials }}"
                    class="mx-auto md:mx-0 my-4 max-h-[200px] max-w-[200px]" alt="">
            @endif

            <input wire:model="profile_image" type="file" accept="image/*"
                class="w-[96vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="profile_image" />

            @error('profile_image')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>

        <div class="flex flex-col mt-2">

            <label for="blog_excerpt"
                class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Quote</label>

            <textarea wire:model="quote" type="text"
                class="w-[96vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                id="blog_excerpt" rows="4"></textarea>

        </div>




        {{-- <div id="tinymce_div" class="" wire:ignore>

            <textarea id="tinymce">
                {{$blog_area}}
            </textarea>

        </div> --}}


        <div class="flex flex-col gap-4 justify-center items-center my-8">

            <button wire:click="save_item"
                class="bg-[#1a579f] hover:scale-110 transition-all w-[200px] text-white font-bold py-2 px-4 rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">{{ $editable_testimonials_id !== null ? 'Update' : 'Save' }}</button>

            <button wire:click="cancel_collaboration_item_update"
                class="{{ $editable_testimonials_id !== null ? '' : 'hidden' }} bg-red-800  hover:scale-110 transition-all w-[200px] text-white font-bold py-2 px-4 rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Cancel</button>

        </div>



        {{-- Manage Options & Items Section --}}

        <div
            class="flex flex-col justify-center items-center mt-8 {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} px-4 py-8 mx-auto w-[96vw] max-w-[800px] rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <h1
                class="flex flex-row text-center {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                To manage existing testimonials, click on "Created Testimonials Cards".</h1>

            {{-- Created Items Section --}}
            <button wire:click="created_testimonials"
                class="px-4 py-2 w-[290px] bg-[#1A579F] text-white rounded-lg hover:scale-110 transition-all mt-4 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Created
                Testimonials Cards <img src="{{ asset('images/press_down.png') }}"
                    class="w-[14px] inline -mt-1 {{ $created_testimonials_selected ? 'rotate-180' : 'rotate-0' }}  transition-all" /></button>


            <div
                class="flex flex-col gap-4 w-full max-h-[70vh] overflow-auto {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-black' }} items-center  my-4  px-4 py-4 md:px-8 {{ $created_testimonials_selected ? '' : 'hidden' }} rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

                @foreach ($items_array as $item)
                    <div {{-- 'portfolio_title' => $item->portfolio_title,
                    'portfolio_description' => $item->portfolio_description,
                    'portfolio_image_link' => $item->portfolio_image_link,
                    'technologies_used' => $item->technologies_used,
                    'portfolio_site_link' => $item->portfolio_site_link,
                    'portfolio_github_link' => $item->portfolio_github_link,
                    'id' => $item->item_id --}}
                        class="flex w-full flex-col justify-center items-center p-4 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8]' : 'bg-[#1e1d1d]' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]">

                        <img src="{{ $item['profile_image'] }}"
                            class="h-[160px] w-auto max-w-[240px] rounded object-contain" alt="">

                        <p class="text-2xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                            {{ $item['name'] }}</p>

                        <p class="text-xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                            {{ $item['profession'] }}</p>

                        <p class="text-lg {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                            {{ $item['quote'] }}</p>



                        {{-- <button wire:click="deleteItem('{{ $item['id'] }}')" --}}
                        <div class="flex gap-4 justify-center items-center">
                            <button
                                wire:click="confirm_window( 'deleteTestimonial' , '{{ $item['id'] }}', 'Are You Sure You Want To Delete This Testimonial Card?')"
                                class="h-[35px] w-[100px] rounded-lg bg-red-800 mt-2 md:mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">Delete</button>

                            <button wire:click="editTestimonial('{{ $item['id'] }}')"
                                class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] mt-2 md:mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">Edit</button>
                        </div>

                        <div class="flex gap-4 justify-center items-center">
                            <button wire:click="moveItemUp('{{ $item['id'] }}')"
                                class="h-[35px] w-[120px] rounded-lg mt-2 md:mt-4 bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">&uarr;
                                Move Up</button>
                            <button wire:click="moveItemDown('{{ $item['id'] }}')"
                                class="h-[35px] w-[120px] rounded-lg mt-2 md:mt-4 bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">&darr;
                                Move Down</button>
                        </div>
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
    @livewire('components.footer', [
        'theme_mode' => session('theme_mode'),
    ])






    <script>
        document.addEventListener('livewire:initialized', () => {

            Livewire.on('editable-testimonials-area', () => {

                setTimeout(() => {

                    window.location.href = '#add_new_testimonials_card';

                }, 10);

            })

        })
    </script>


</div>
