<?php

namespace App\Livewire;

use Livewire\Component;

class PrivacyPolicy extends Component
{

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
