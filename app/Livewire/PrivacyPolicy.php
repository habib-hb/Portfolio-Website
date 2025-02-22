<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PrivacyPolicy extends Component
{
    public $privacy_policy_content;

    public $privacy_title_icon;
    public function mount(){

        $privacy_policy = DB::table('privacy-policy-page')->where('id', 1)->first();
        $this->privacy_policy_content = $privacy_policy->content;
        $this->privacy_title_icon = $privacy_policy->title_icon;
        
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
        return view('livewire.privacy-policy');
    }
}
