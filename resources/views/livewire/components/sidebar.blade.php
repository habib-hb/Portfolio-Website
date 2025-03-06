  <div>

  {{-- Sidebar Test --}}

 <!-- Navigation Toggle -->
 <div class="xl:hidden fixed bottom-[40px] end-3">
    <button type="button"
        class="h-10 w-10 inline-flex justify-center items-center gap-x-2 text-start text-sm font-medium rounded-full shadow-sm align-middle hover:scale-110 bg-[#1a579f] text-white "
        aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-sidebar-mini-sidebar"
        aria-label="Toggle navigation" data-hs-overlay="#hs-sidebar-mini-sidebar">
        &#9776;
    </button>
</div>
<!-- End Navigation Toggle -->

    <!-- Sidebar -->
    <div id="hs-sidebar-mini-sidebar"
        class="hs-overlay [--auto-close:lg] xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 w-20
                hs-overlay-open:translate-x-0
                -translate-x-full transition-all duration-300 transform
                h-fit
                max-h-[calc(100vh_-_130px)]
                hidden
                fixed top-[120px] start-2 bottom-0 z-[60]
                rounded-lg
                shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]
                {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} "
        role="dialog" tabindex="-1" aria-label="Sidebar">
        <div class="relative flex flex-col max-h-full ">
            <!-- Header -->
            <header class=" flex justify-center items-center gap-x-2">
                <div class="xl:hidden absolute top-1 -end-3">
                    <!-- Close Button -->
                    <button type="button"
                        class="flex justify-center items-center gap-x-3 size-6 {{ session('theme_mode') == 'light' ? 'bg-white border-gray-200 text-gray-600 hover:bg-gray-100 focus:bg-gray-100' : 'bg-neutral-800 border-neutral-700 text-neutral-400 hover:bg-neutral-700 focus:bg-neutral-700 hover:text-neutral-200 focus:text-neutral-200' }}  border  text-sm  rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none "
                        data-hs-overlay="#hs-sidebar-mini-sidebar">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                    <!-- End Close Button -->
                </div>
            </header>
            <!-- End Header -->

            <!-- Body -->
            <nav
                class="max-h-[calc(100vh_-_130px)] overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full {{ session('theme_mode') == 'light' ? '[&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300' : '[&::-webkit-scrollbar-track]:bg-neutral-700 [&::-webkit-scrollbar-thumb]:bg-neutral-500' }}  ">

                <div class="flex flex-col justify-center items-center gap-y-2 py-[24px]">

                    <!-- Site Configuration -->
                    <div class="hs-tooltip [--placement:right] inline-block">
                        <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none"
                            href="/admin_dashboard/site-configuration">
                            <img src="{{ asset('images/site-configuration.png') }}" class="h-[36px] rounded-lg bg-[#eff9ff] p-1"
                                alt="">
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs  rounded-lg whitespace-nowrap "
                                role="tooltip">
                                Site Configuration
                            </span>
                        </a>
                    </div>
                    <!-- End Site Configuration -->

                    <!-- Appointments -->
                    <div class="hs-tooltip [--placement:right] inline-block">
                        <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none"
                            href="/admin_dashboard/appointments">
                            <img src="{{ asset('images/appointments.png') }}" class="h-[36px] rounded-lg bg-[#eff9ff] p-1"
                                alt="">
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs  rounded-lg whitespace-nowrap "
                                role="tooltip">
                                Appointments
                            </span>
                        </a>
                    </div>
                    <!-- End Appointments -->

                    <!-- Blogs -->
                    <div class="hs-tooltip [--placement:right] inline-block">
                        <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none"
                            href="/admin_dashboard/blogs">
                            <img src="{{ asset('images/blogs.png') }}" class="h-[36px] rounded-lg bg-[#eff9ff] p-1" alt="">
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs  rounded-lg whitespace-nowrap "
                                role="tooltip">
                                Blogs
                            </span>
                        </a>
                    </div>
                    <!-- End Blogs -->

                    <!-- Schedules Management -->
                    <div class="hs-tooltip [--placement:right] inline-block">
                        <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none"
                            href="/admin_dashboard/schedules_management">
                            <img src="{{ asset('images/schedules-management.png') }}" class="h-[36px] rounded-lg bg-[#eff9ff] p-1"
                                alt="">
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs  rounded-lg whitespace-nowrap "
                                role="tooltip">
                                Schedules Management
                            </span>
                        </a>
                    </div>
                    <!-- End Schedules Management -->

                    <!-- Explore Section Management -->
                    <div class="hs-tooltip [--placement:right] inline-block">
                        <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none"
                            href="/admin_dashboard/explore_section_management">
                            <img src="{{ asset('images/explore-section-management.png') }}" class="h-[36px] rounded-lg bg-[#eff9ff] p-1"
                                alt="">
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs rounded-lg whitespace-nowrap"
                                role="tooltip">
                                Explore Section Management
                            </span>
                        </a>
                    </div>
                    <!-- End Explore Section Management -->

                    <!-- Portfolio Section Management -->
                    <div class="hs-tooltip [--placement:right] inline-block">
                        <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none"
                            href="/admin_dashboard/portfolio_section_management">
                            <img src="{{ asset('images/portfolio-section-management.png') }}" class="h-[36px] rounded-lg bg-[#eff9ff] p-1"
                                alt="">
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs rounded-lg whitespace-nowrap"
                                role="tooltip">
                                Portfolio Section Management
                            </span>
                        </a>
                    </div>
                    <!-- End Portfolio Section Management -->

                    <!-- Price Estimator Management -->
                    <div class="hs-tooltip [--placement:right] inline-block">
                        <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none"
                            href="/admin_dashboard/price_estimator_management">
                            <img src="{{ asset('images/price-estimator-management.png') }}"
                                class="h-[36px] rounded-lg bg-[#eff9ff] p-1" alt="">
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs rounded-lg whitespace-nowrap"
                                role="tooltip">
                                Price Estimator Management
                            </span>
                        </a>
                    </div>
                    <!-- End Price Estimator Management -->

                    <!-- Contact Messages -->
                    <div class="hs-tooltip [--placement:right] inline-block">
                        <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none"
                            href="/admin_dashboard/contact_messages">
                            <img src="{{ asset('images/contact-messages.png') }}" class="h-[36px] rounded-lg bg-[#eff9ff] p-1"
                                alt="">
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs rounded-lg whitespace-nowrap"
                                role="tooltip">
                                Contact Messages
                            </span>
                        </a>
                    </div>
                    <!-- End Contact Messages -->

                    <!-- Static Page Management -->
                    <div class="hs-tooltip [--placement:right] inline-block">
                        <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none"
                            href="/admin_dashboard/static-page-management">
                            <img src="{{ asset('images/static-page-management.png') }}" class="h-[36px] rounded-lg bg-[#eff9ff] p-1"
                                alt="">
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs rounded-lg whitespace-nowrap"
                                role="tooltip">
                                Static Page Management
                            </span>
                        </a>
                    </div>
                    <!-- End Static Page Management -->

                    <!-- Collaboration Section Management -->
                    <div class="hs-tooltip [--placement:right] inline-block">
                        <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none"
                            href="/admin_dashboard/collaboration-section-management">
                            <img src="{{ asset('images/collaboration-section-management.png') }}" class="h-[36px] rounded-lg bg-[#eff9ff] p-1"
                                alt="">
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs rounded-lg whitespace-nowrap"
                                role="tooltip">
                                Collaboration Section Management
                            </span>
                        </a>
                    </div>
                    <!-- End Collaboration Section Management -->

                    <!-- Testimonials Section Management -->
                    <div class="hs-tooltip [--placement:right] inline-block">
                        <a class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent disabled:opacity-50 disabled:pointer-events-none"
                            href="/admin_dashboard/testimonials-section-management">
                            <img src="{{ asset('images/testimonials-section-management.png') }}" class="h-[36px] rounded-lg bg-[#eff9ff] p-1"
                                alt="">
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 {{ session('theme_mode') == 'light' ? 'bg-[#1e1d1d] text-white' : 'bg-white text-black' }} text-xs rounded-lg whitespace-nowrap"
                                role="tooltip">
                                Testimonials Section Management
                            </span>
                        </a>
                    </div>
                    <!-- End Testimonials Section Management -->




                </div>
            </nav>
            <!-- End Body -->
        </div>
    </div>
    <!-- End Sidebar -->


    {{-- End Sidebar Test --}}

    <script>
        // document.addEventListener('livewire:initialized', () => {

        //     Livewire.on('sidebar-theme-change', () => {

        //         setTimeout(() => {

        //             Livewire.dispatch('sidebar-theme-change-from-js');

        //         }, 10);

        //     })

        // })
    </script>

</div>
