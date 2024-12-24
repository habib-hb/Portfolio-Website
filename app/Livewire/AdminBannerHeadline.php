<?php

namespace App\Livewire;

use App\Models\banner_headline;
use Livewire\Component;

class AdminBannerHeadline extends Component
{


    public $banner_headline;


    public function save(){

            if(!$this->banner_headline){

                session()->flash('banner_error_message', 'Banner Headline Cann\'t Be Empty');

                return;
            }

            //Database Check
            $database_check_banner_headline = banner_headline::where('banner_type', "homepage")->first();

            if(!$database_check_banner_headline){
            banner_headline::create([
                'banner_text' => $this->banner_headline,
                'banner_type' => "homepage"
            ]);

            session()->flash('banner_message', 'Banner Headline Created Successfully');

        }else{

            $database_check_banner_headline->update([
                'banner_text' => $this->banner_headline
            ]);

            session()->flash('banner_message', 'Banner Headline Updated Successfully');

        }

        }



    public function changeThemeMode(){

        if(session('theme_mode') == 'light'){

            session(['theme_mode' => 'dark']);

        }else{


            session(['theme_mode' => 'light']);

        }

        $this->dispatch('alert-manager');

    }


    public function clear_banner_message(){

        session()->flash('banner_message', null);

    }


    public function clear_banner_error_message(){

        session()->flash('banner_error_message', null);

    }


    public function render()
    {
        return view('livewire.admin-banner-headline');
    }
}
