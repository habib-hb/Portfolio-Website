<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Footer extends Component
{
    public $footer_logo_light;

    public $footer_logo_dark;

    public $footer_top_layer_text;

    public $footer_bottom_layer_text;

    public function mount()
    {

        $this->footer_logo_light = DB::table('site_data')->where('title', 'footer_logo_light_mode')->first()->data;

        $this->footer_logo_dark = DB::table('site_data')->where('title', 'footer_logo_dark_mode')->first()->data;

        $this->footer_top_layer_text = DB::table('site_data')->where('title', 'footer_top_layer_text')->first()->data;

        $this->footer_bottom_layer_text = DB::table('site_data')->where('title', 'footer_bottom_layer_text')->first()->data;
    }

    #[On('theme-change')]
    public function changeThemeMode()
    {

        //Doing nothing but re-rendering, the below event does nothing
        $this->dispatch('alert-manager');
    }
    public function render()
    {
        return view('livewire.components.footer');
    }
}
