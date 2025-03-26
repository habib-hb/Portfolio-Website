<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PrivacyPolicy extends Component
{
    public $privacy_policy_content;

    public $privacy_title_icon;

    //New Additions
    public $site_logo_light;

    public $site_logo_dark;

    public $footer_logo_light;

    public $footer_logo_dark;

    public $footer_top_layer_text;

    public $footer_bottom_layer_text;
    //End New Additions
    public function mount()
    {

        $privacy_policy = DB::table('privacy-policy-page')->where('id', 1)->first();
        $this->privacy_policy_content = $privacy_policy->content;
        $this->privacy_title_icon = $privacy_policy->title_icon;

        //New Additions
        $this->site_logo_light = DB::table('site_data')->where('title', 'site_logo_light_mode')->first()->data;

        $this->site_logo_dark = DB::table('site_data')->where('title', 'site_logo_dark_mode')->first()->data;

        $this->footer_logo_light = DB::table('site_data')->where('title', 'footer_logo_light_mode')->first()->data;

        $this->footer_logo_dark = DB::table('site_data')->where('title', 'footer_logo_dark_mode')->first()->data;

        $this->footer_top_layer_text = DB::table('site_data')->where('title', 'footer_top_layer_text')->first()->data;

        $this->footer_bottom_layer_text = DB::table('site_data')->where('title', 'footer_bottom_layer_text')->first()->data;
        //End New Additions

    }

    public function changeThemeMode()
    {

        if (session('theme_mode') == 'light') {

            session(['theme_mode' => 'dark']);
        } else {


            session(['theme_mode' => 'light']);
        }

        $this->dispatch('alert-manager');
    }

    public function render()
    {
        return view('livewire.privacy-policy');
    }
}
