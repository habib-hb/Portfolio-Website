<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class About extends Component
{

    public $about_title;

    public $about_excerpt;

    public $about_icon_image;

    public $about_profile_image;

    public $about_me_content;

    public function mount(){

        $about_me = DB::table('about-me-page')->where('id', 1)->first();
        $this->about_title = $about_me->title;
        $this->about_excerpt = $about_me->excerpt;
        $this->about_icon_image = $about_me->icon_image;
        $this->about_profile_image = $about_me->profile_image;
        $this->about_me_content = $about_me->content;
    }

    public function changeThemeMode(){

        if(session('theme_mode') == 'light'){

            session(['theme_mode' => 'dark']);

        }else{


            session(['theme_mode' => 'light']);

        }

        $this->dispatch('alert-manager');

    }



    public function render()
    {
        return view('livewire.about');
    }
}
