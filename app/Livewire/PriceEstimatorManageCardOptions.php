<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PriceEstimatorManageCardOptions extends Component
{
    public $items_array=[];
    public $theme_mode;

    public function mount(){
        if(!session('theme_mode')) {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);

        }else{

            $this->theme_mode = session('theme_mode');

        }

        $estimation_cards_db = DB::select("SELECT * FROM price_estimation");

        $this->items_array = array_map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'icon_link' => $item->icon_link
            ];
        }, $estimation_cards_db);
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
        return view('livewire.price-estimator-manage-card-options');
    }
}
