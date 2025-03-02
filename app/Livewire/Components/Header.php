<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Header extends Component
{
    public $site_logo_light;

    public $site_logo_dark;

    public $back_button_link;

    public function mount($theme_mode, $back_button_link)
    {

        $this->site_logo_light = DB::table('site_data')->where('title', 'site_logo_light_mode')->first()->data;

        $this->site_logo_dark = DB::table('site_data')->where('title', 'site_logo_dark_mode')->first()->data;

        $this->back_button_link = $back_button_link;

        session(['theme_mode' => $theme_mode]);
    }

    public function notifyParentThemeChange()
    {


        $this->dispatch('notify-from-child-component');

        $this->dispatch('theme-change');
    }

    #[On('theme-change')]
    public function changeThemeMode()
    {

        //Doing nothing but re-rendering, the below event does nothing
        $this->dispatch('alert-manager');
    }

    public function render()
    {
        return view('livewire.components.header');
    }
}
