<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SingleCategoryPage extends Component
{
    public $category_title;

    public $category_id;

    public $theme_mode;

    public $items_array=[];

    public $page_caption;

    public function mount($category_title, $category_id)
    {

        if(!session('theme_mode')) {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);

        }else{

            $this->theme_mode = session('theme_mode');

        }


        $this->category_title = $category_title;
        $this->category_id = $category_id;

        $this->page_caption = DB::table('site_data')->where('title', 'categories_page_caption')->first()->data;

        $items_db = DB::select("SELECT
                    explore_items.*,
                    explore_options.*,
                    explore_items.image_link AS item_image,
                    explore_options.image_link AS option_image,
                    explore_items.id AS item_id,
                    explore_options.id AS option_id
                    FROM explore_items
                    LEFT JOIN explore_options ON explore_items.option_id = explore_options.id
                    WHERE explore_items.option_id = ?", [(int) $category_id]);

        $this->items_array = array_map(function ($item) {
            return [
                'option_title' => $item->option,
                'item_title' => $item->item_title,
                'image_link' => $item->item_image,
                'item_description' => $item->item_description,
                'site_link' => $item->site_link,
                'id' => $item->item_id
            ];
        }, $items_db);

    }


    public function changeThemeMode(){

        if($this->theme_mode == 'light'){

            $this->theme_mode = 'dark';

            session(['theme_mode' => $this->theme_mode]);

        }else{

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);

        }

        $this->dispatch('alert-manager');

    }


    public function render()
    {
        return view('livewire.single-category-page');
    }
}
