<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class Sidebar extends Component
{

    public function mount( $theme_mode ){

        session(['theme_mode' => $theme_mode]);


}


#[On('theme-change')]
public function changeThemeMode(){

    //Doing nothing but re-rendering, the below event does nothing
    $this->dispatch('alert-manager');

}


    public function render()
    {
        return view('livewire.components.sidebar');
    }
}
