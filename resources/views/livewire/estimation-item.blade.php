<div
    class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]' }}">

    @livewire('components.header', [
        'theme_mode' => session('theme_mode'),
        'back_button_link' => '/admin_dashboard/price_estimator_management/manage_card_options',
    ])

    @livewire('components.sidebar', [
        'theme_mode' => session('theme_mode'),
    ])


        @if ($notify_error)
            <div
                class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit mx-auto w-[90%] max-w-[400px]  bg-[#9f1a1a] py-4 rounded-lg z-10">
                <div class="flex flex-row justify-between items-center px-8">

                    <p class="text-white text-center">{{ $notify_error }}</p>

                </div>

                <button wire:click="clear_error"
                    class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

            </div>
        @endif


        @if ($notify_success)
            <div
                class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
                <div class="flex flex-row justify-between items-center px-8">

                    <p class="text-white text-left">{{ $notify_success }}</p>

                </div>

                <button wire:click="clear_success"
                    class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

            </div>
        @endif

        {{-- End All Flash Messages --}}




    @if ($confirm_deletable_option_key !== null)
        <div id="appointment_unfulfilled"
            class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px] bg-red-800 py-4 rounded-lg z-10">
            <div class="flex flex-col justify-between items-center px-8">

                <p class="text-white text-3xl font-semibold">Confirmation Alert</p>

                {{-- <p class="text-white text-left">{{session('appointment_unfulfilled')}}</p> --}}
                <p class="text-white text-center">Are you sure you want to delete this option?</p>

            </div>

            {{-- <button onclick="document.getElementById('appointment_unfulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

            <div class="flex flex-row justify-between items-center py-4 gap-4">

                <button wire:click="confirmDeleteOption"
                    class="text-white border-2 border-white px-4 rounded-lg hover:scale-110">Delete</button>

                <button wire:click="clear_confirmDeleteOption"
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

    <div wire:loading wire:target="toggle_selection_mode"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Selection Mode...</span>
        </div>


    </div>


    <div wire:loading wire:target="deleteSelectionItem"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Deletion...</span>
        </div>


    </div>

    <div wire:loading wire:target="editSelectionItem"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Edit Section...</span>
        </div>


    </div>


    <div wire:loading wire:target="add_new_selection_item"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Data...</span>
        </div>


    </div>


    <div wire:loading wire:target="cancle_edit_selection_item"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Canceling Data...</span>
        </div>


    </div>


    <div wire:loading wire:target="save_selection"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Saving Data...</span>
        </div>


    </div>

    <div wire:loading wire:target="toggle_checkbox_mode"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Checkbox Mode...</span>
        </div>


    </div>



    <div wire:loading wire:target="save_selection_option"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Saving Data...</span>
        </div>


    </div>


    <div wire:loading wire:target="moveOptionUp"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Moving Option Up...</span>
        </div>


    </div>


    <div wire:loading wire:target="moveOptionDown"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Moving Option Down...</span>
        </div>


    </div>



    <div wire:loading wire:target="save_checkbox_option"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Saving Data...</span>
        </div>


    </div>



    <div wire:loading wire:target="save_option_details_link"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Saving Data...</span>
        </div>


    </div>


    <div wire:loading wire:target="editOption"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing Edit Option...</span>
        </div>


    </div>


    <div wire:loading wire:target="cancel_checkbox_option_edit"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing...</span>
        </div>


    </div>


    <div wire:loading wire:target="calcel_selection_option_edit"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Processing...</span>
        </div>


    </div>


    <div wire:loading wire:target="moveSelectionItemUp"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Moving Item Up...</span>
        </div>


    </div>


    <div wire:loading wire:target="moveSelectionItemDown"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Moving Item Down...</span>
        </div>


    </div>


    <div wire:loading wire:target="confirmDeleteOption"
        class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

        <div class="flex flex-row justify-center items-center px-2 gap-2">
            <img src="{{ asset('images/loading.png') }}" class="h-[24px] rounded-full animate-spin" alt="">

            <span class=" text-white py-2 rounded-lg"> Deleting Option...</span>
        </div>


    </div>

    {{-- <div wire:click="changeThemeMode" class="flex justify-center">

                <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? '' : 'hidden'}}">

                <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? 'hidden' : ''}}">

            </div> --}}






    <main id="main_form_element" class="flex flex-col w-[96vw] md:max-w-[800px] mx-auto mt-4 min-h-screen">

        <h2
            class="text-2xl md:text-4xl mb-2 text-center {{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }}">
            {{ $card_title }}</h2>
        {{--

            <pre>{{ print_r($items_array_js_version, true) }}</pre>
            <pre>{{ print_r($items_array_php_version, true) }}</pre> --}}

        {{-- <button
         wire:click="confirm_window( 'deleteOption' , '{{ $option['id'] }}', 'Are You Sure You Want To Delete This Option?')"
         class="h-[35px] w-[100px] rounded-lg bg-red-800 mt-2 md:mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">Delete</button>
     <button wire:click="editOption('{{ $option['id'] }}')"
         class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] mt-2 md:mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">Edit</button> --}}
        <div class="flex border-gray-400 border-b w-full">
            <div class="w-[50%] border-gray-400 border-r flex justify-end pr-2 pb-2">
                <button wire:click="toggle_selection_mode"
                    class="rounded-lg
                     {{ $selection_mode ? 'bg-[#1A579F] text-white' : '' }}
                    {{ session('theme_mode') == 'light' && !$selection_mode ? 'bg-[#d6e0ec] text-black' : '' }}
                    {{ session('theme_mode') !== 'light' && !$selection_mode ? 'bg-[#3a3a3a] text-white' : '' }}
                       mt-2 md:mt-4 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] lg:hover:scale-105 px-6 py-3 md:px-10 md:py-4 transition-all">Selection</button>
            </div>
            <div class="w-[50%] border-gray-400 border-l flex pl-2 pb-2">
                <button wire:click="toggle_checkbox_mode"
                    class="rounded-lg
                    {{ $checkbox_mode ? 'bg-[#1A579F] text-white' : '' }}
                     {{ session('theme_mode') == 'light' && !$checkbox_mode ? 'bg-[#d6e0ec] text-black' : '' }}
                      {{ session('theme_mode') !== 'light' && !$checkbox_mode ? 'bg-[#3a3a3a] text-white' : '' }}
                         mt-2 md:mt-4  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] lg:hover:scale-105 px-6 py-3 md:px-10 md:py-4 transition-all">Checkbox</button>
            </div>
        </div>


        @if ($selection_mode)
            {{-- Create Card Option --}}

            <div
                class="flex flex-col justify-center items-center mt-8 {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} px-4 py-8 mx-auto w-[96vw] max-w-[800px] rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">




                <div id="add_new_option" class="flex flex-col justify-center items-center my-4">

                    {{-- @if ($editable_option_id) --}}
                    <h2
                        class="text-2xl md:text-4xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                        {{ $editable_option_key_selection !== null ? 'Update Selection' : 'Add Selection' }} </h2>
                    {{-- @endif --}}

                    <div class="flex flex-col mt-2 max-w-[680px]">

                        <label for="title"
                            class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Selection
                            Title</label>

                        <input wire:model="selection_title" type="text"
                            class="w-[92vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                            id="title">

                    </div>


                </div>

                <div class="border-2 border-[#1A579F] p-2 sm:p-4 rounded-lg flex flex-col">

                    <h2
                        class="text-xl md:text-2xl block mx-auto {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                        {{ $editable_selection_item_key !== null ? 'Update Selection Item' : 'Add Selection Item' }}
                    </h2>

                    <div class="flex flex-col mt-2 max-w-[680px]">

                        <label for="blog_excerpt"
                            class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Item
                            Name (Maximum 80 characters)</label>

                        <textarea wire:model="selection_item_name" type="text"
                            class="w-[92vw] md:max-w-full  py-2 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff] text-black' : 'bg-[#202329] text-white' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                            id="blog_excerpt" maxlength="80" rows="4"></textarea>

                    </div>

                    <div class="flex flex-col mt-2 max-w-[680px]">

                        <label for="title"
                            class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Value (Use '00' for zero amount of money)</label>

                        <input wire:model="selection_item_value" type="number"
                            class="w-[92vw] md:max-w-[50%] py-2 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                            id="title">

                    </div>

                    <button wire:click="add_new_selection_item"
                        class="h-[44px] w-[120px] rounded-lg bg-[#1A579F] mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">{{ $editable_selection_item_key !== null ? 'Update' : 'Add' }}
                    </button>

                    <button wire:click="cancle_edit_selection_item"
                        class="{{ $editable_selection_item_key !== null ? '' : 'hidden' }} h-[44px] w-[120px] rounded-lg bg-red-800 mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Cancel
                        Edit </button>

                    <div
                        class="flex flex-col gap-4 w-full max-w-[680px] max-h-[70vh] overflow-auto {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-black' }} items-center  mt-16  px-4 py-4 md:px-8 rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                        <h2
                            class="text-lg md:text-xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                            Created
                            Selection Items</h2>

                        {{-- @foreach ($options_array as $option) --}}
                        @foreach ($addable_selection_items as $key => $item)
                            <div
                                class="flex w-full flex-col justify-center items-center p-4 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8]' : 'bg-[#1e1d1d]' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]">

                                <p
                                    class="text-2xl text-center {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                                    <span
                                        class="{{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }} text-2xl font-bold">Item:
                                    </span>{{ $item['name'] }}
                                </p>


                                <p
                                    class="text-2xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                                    <span
                                        class="{{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }} text-2xl font-bold">Value:
                                    </span>{{ $item['value'] }}
                                </p>



                                {{-- <button wire:click="deleteOption('{{ $option['id'] }}')" --}}
                                <div class="flex gap-4 justify-center items-center">
                                    <button wire:click="deleteSelectionItem('{{ $key }}')"
                                        class="h-[35px] w-[100px] rounded-lg bg-red-800 mt-2 md:mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">Delete</button>
                                    <button wire:click="editSelectionItem('{{ $key }}')"
                                        class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] mt-2 md:mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">Edit</button>
                                </div>

                                <div class="flex gap-4 justify-center items-center">
                                    <button wire:click="moveSelectionItemUp('{{ $key }}')"
                                        class="h-[35px] w-[120px] rounded-lg bg-[#1A579F] mt-2 md:mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all"> &uarr; Move Up</button>
                                    <button wire:click="moveSelectionItemDown('{{ $key }}')"
                                        class="h-[35px] w-[120px] rounded-lg bg-[#1A579F] mt-2 md:mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">&darr; Move Down</button>
                                </div>
                            </div>
                        @endforeach

                        @if (count($addable_selection_items) == 0)
                            <p class="text-md {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                                No Selection Items Added</p>
                        @endif

                    </div>

                </div>

                {{-- End Created Items Section --}}
                <button wire:click="save_selection_option"
                    class="h-[64px] w-[240px] text-2xl rounded-lg bg-[#1A579F] mt-16 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">{{ $editable_option_key_selection === null ? 'Save' : 'Update' }}</button>
                <button wire:click="calcel_selection_option_edit"
                    class="{{ $editable_option_key_selection === null ? 'hidden' : '' }} h-[64px] w-[240px] text-2xl rounded-lg bg-red-800 mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Cancel
                    Edit</button>


            </div>


            {{-- End Card Option --}}
        @endif




        @if ($checkbox_mode)
            {{-- Create Card Checkbox --}}

            <div
                class="flex flex-col justify-center items-center mt-8 {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} px-4 py-8 mx-auto w-[96vw] max-w-[800px] rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">




                <div id="add_new_option" class="flex flex-col justify-center items-center my-4">

                    {{-- @if ($editable_option_id) --}}
                    <h2
                        class="text-2xl md:text-4xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                        {{ $editable_option_key_checkbox === null ? 'Add' : 'Edit' }} Card
                        Checkbox</h2>
                    {{-- @endif --}}

                    <div class="flex flex-col mt-2 max-w-[680px]">

                        <label for="title"
                            class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Checkbox
                            Title</label>

                        <input wire:model="checkbox_title" type="text"
                            class="w-[92vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                            id="title">

                    </div>


                </div>

                <div class="flex flex-col max-w-[680px]">

                    <label for="title"
                        class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Value</label>

                    <input wire:model="checkbox_value" type="number"
                        class="w-[92vw] md:max-w-[50%] py-2 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                        id="title">

                </div>


                {{-- End Created Items Section --}}
                <button wire:click="save_checkbox_option"
                    class="h-[64px] w-[240px] text-2xl rounded-lg bg-[#1A579F] mt-8 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">{{ $editable_option_key_checkbox === null ? 'Save' : 'Update' }}</button>

                <button wire:click="cancel_checkbox_option_edit"
                    class="{{ $editable_option_key_checkbox === null ? 'hidden' : '' }} h-[64px] w-[240px] text-2xl rounded-lg bg-red-800 mt-4 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Cancel
                    Edit</button>

            </div>


            {{-- End Card Checkbox --}}
        @endif











        {{-- Manage Created Option Items --}}

        <div
            class="flex flex-col justify-center items-center mt-8 {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} px-4 py-8 mx-auto w-[96vw] max-w-[800px] rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <div
                class="flex flex-col gap-4 w-full max-h-[70vh] overflow-auto {{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-black' }} items-center  mt-4  px-4 py-4 md:px-8 rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                <h2
                    class="text-2xl md:text-4xl font-bold {{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }}">
                    Created Options</h2>

                {{-- @foreach ($options_array as $option) --}}
                @foreach ($items_array_php_version as $main_key => $item)
                    <div
                        class="flex w-full flex-col justify-center items-center py-4 {{ session('theme_mode') == 'light' ? 'bg-[#deeaf8]' : 'bg-[#1e1d1d]' }} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]">

                        <p class="text-2xl px-4 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                            {{-- <span class="text-[#1A579F] text-2xl font-bold">Title: </span>This is the option</p> --}}
                            <span
                                class="{{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }} text-2xl font-bold">{{ $item['type'] == 'select' ? 'Select' : 'Checkbox' }}
                                : </span>{{ $item['title'] }}
                        </p>

                        <div
                            class="border-2 border-gray-500 rounded-lg text-center w-[70vw] p-2 my-2 md:w-[70%] mx-auto">
                            @if ($item['type'] == 'select')
                                @foreach ($item['options'] as $key => $option)
                                    <p
                                        class="text-lg {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                                        <span
                                            class="{{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }} text-lg font-bold">Option
                                            {{ $key + 1 }}:
                                        </span>{{ $option['option_name'] }}<span
                                            class="{{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }} text-lg font-bold">
                                            -
                                            {{ $option['option_value'] }}</span>
                                    </p>
                                @endforeach
                            @endif

                            @if ($item['type'] == 'checkbox')
                                <p
                                    class="text-lg {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                                    <span
                                        class="{{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }} text-lg font-bold">Name:
                                    </span>{{ $item['option']['checkbox_name'] }}
                                </p>
                                <p
                                    class="text-lg {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                                    <span
                                        class="{{ session('theme_mode') == 'light' ? 'text-[#1A579F]' : 'text-white' }} text-lg font-bold">Value:
                                    </span>{{ $item['option']['checkbox_value'] }}
                                </p>
                            @endif

                            {{-- <p class="text-lg {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                                    <span class="text-[#1A579F] text-lg font-bold">Option 1: </span>This is the text.<span class="text-[#1A579F] text-lg font-bold"> - 300</span></p>
                                <p class="text-lg {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                                    <span class="text-[#1A579F] text-lg font-bold">Option 1: </span>This is the text.<span class="text-[#1A579F] text-lg font-bold"> - 300</span></p>
                                <p class="text-lg {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                                    <span class="text-[#1A579F] text-lg font-bold">Option 1: </span>This is the text.<span class="text-[#1A579F] text-lg font-bold"> - 300</span></p>
                                <p class="text-lg {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                                    <span class="text-[#1A579F] text-lg font-bold">Option 1: </span>This is the text.<span class="text-[#1A579F] text-lg font-bold"> - 300</span></p> --}}

                        </div>

                        {{-- <button wire:click="deleteOption('{{ $option['id'] }}')" --}}
                        <div class="flex flex-col gap-4 mt-2 justify-center items-center">
                            <div class="flex flex-wrap gap-4 justify-center items-center">
                                <button wire:click="deleteOption('{{ $main_key }}')"
                                    class="h-[35px] w-[100px] rounded-lg bg-red-800 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">Delete</button>
                                <button wire:click="editOption('{{ $main_key }}')"
                                    class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">Edit</button>
                            </div>
                            <div class="flex flex-wrap gap-4 justify-center items-center">
                                <button wire:click="moveOptionUp('{{ $main_key }}')"
                                    class="h-[35px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">&uarr;
                                    Move Up</button>
                                <button wire:click="moveOptionDown('{{ $main_key }}')"
                                    class="h-[35px] w-[120px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110  transition-all">&darr;
                                    Move Down</button>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if (count($items_array_php_version) == 0)
                    <p
                        class="text-lg text-center {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                        No Options Created</p>
                @endif

            </div>

            {{-- End Manage Created Option Items --}}




    </main>




    <div
        class="flex flex-col justify-center items-center mt-8 {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} px-4 py-8 mx-auto w-[96vw] max-w-[800px] rounded-lg  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">




        <div id="add_new_option" class="flex flex-col justify-center items-center my-4">

            {{-- @if ($editable_option_id) --}}
            <h2 class="text-2xl md:text-4xl {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">
                Option Details Link</h2>
            {{-- @endif --}}

            <div class="flex flex-col mt-2 max-w-[680px]">

                <label for="title"
                    class="opacity-80 {{ session('theme_mode') == 'light' ? 'text-black' : 'text-white' }}">Blog
                    Link</label>

                <input wire:model="option_details_link" type="text"
                    class="w-[92vw] md:max-w-full py-2 {{ session('theme_mode') == 'light' ? 'bg-[#eff9ff] text-black' : 'bg-[#202329] text-white' }}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]  outline-none border-none  px-2"
                    id="title">

            </div>


        </div>



        {{-- End Created Items Section --}}
        <button wire:click="save_option_details_link"
            class="h-[64px] w-[240px] text-2xl rounded-lg bg-[#1A579F] mt-8 text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Save</button>


    </div>




    {{-- Footer Element --}}
    @livewire('components.footer', [
        'theme_mode' => session('theme_mode'),
    ])


    <script>
        document.addEventListener('livewire:init', () => {

            Livewire.on('edit_option_triggered', () => {

                window.location.href = "#main_form_element";

            })

        })
    </script>





</div>
