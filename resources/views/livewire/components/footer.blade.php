  {{-- Footer Element --}}
  <div
  class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-16 rounded-lg {{ session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]' }} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


  <img id='footer_icon' src="{{ session('theme_mode') == 'light' ? $footer_logo_light : $footer_logo_dark }}"
      class="h-[44px] cursor-pointer" onclick="window.location.href='/'" alt="" cursor-data-color="#1A579F">

  <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
      {{ $footer_top_layer_text }}</p>

  <p class=" text-center {{ session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]' }}">
      {{ $footer_bottom_layer_text }}
  </p>

</div>
