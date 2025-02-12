<?php

namespace App\Livewire;

use App\Models\banner_headline;
use App\Models\blog_posts;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class HomepageWire extends Component
{

    public $theme_mode;

    public $searchtext='';

    public $search_output;

    public $search_input_field_is_active;

    public $search_output_length;

    public $banner_headline;

    public $first_load = true;

    public $options_array = [];



    public function mount()
    {
        if(!session('theme_mode')) {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);

        }else{

            $this->theme_mode = session('theme_mode');

        }

        $this->search_input_field_is_active = session('search_input_field_is_active');

        //Database test for banner_headline
        $banner_headline_check = banner_headline::where('banner_type', "homepage")->first();

        if($banner_headline_check){

            $this->banner_headline = $banner_headline_check->banner_text;

        }else{

            $this->banner_headline = 'We use only the best quality materials on the market in order to provide the best products to our patients, So don’t worry about anything and book yourself.';

        }

        $options_db = DB::select("SELECT * FROM explore_options");

        $this->options_array = array_map(function ($item) {
            return ['id' => $item->id, 'option' => $item->option, 'image_link' => $item->image_link];
        }, $options_db);
    }



    public function updated($property)
    {

        // $property: The name of the current property that was updated

        if ($property === 'searchtext' && !empty($this->searchtext)) {

            // $this->search_output = Names::search($this->searchtext)->get();

            $this->search_output = blog_posts::search($this->searchtext)->orderBy('blog_title', 'asc')->take(5)->get()->map(function ($post) {
                // Replace the search text with the highlighted version in a case-insensitive way
                $highlighted = '<b class="text-[#1A579F] ">' . e($this->searchtext) . '</b>';

                $post->blog_title = str_ireplace($this->searchtext, $highlighted, e($post->blog_title));
                $post->blog_excerpt = str_ireplace($this->searchtext, $highlighted, e($post->blog_excerpt));

                // if($post->blog_type == 'custom'){
                //     $post->blog_link = '/blogs/' . $post->blog_link;
                // }

                return $post;
            });


            $this->search_output_length = $this->search_output->count();

            if($this->search_output_length == 0){

                $this->dispatch('no_results_found');

            }


            $this->search_input_field_is_active = true;

            session(['search_input_field_is_active' => $this->search_input_field_is_active]);


        }else{

            $this->search_output = null;

            $this->search_input_field_is_active = false;

            session(['search_input_field_is_active' => $this->search_input_field_is_active]);

        }

        $this->dispatch('alert-manager');
    }



    #[On('new_load_alert_for_serch_strings')]
    public function new_load_alert_for_serch_strings()
    {
        $this->search_input_field_is_active = false;

        session(['search_input_field_is_active' => $this->search_input_field_is_active]);

        if($this->first_load){

            $this->dispatch('load_animation');

            $this->first_load = false;
        }
    }



    // #[On('theme-change')]
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
        return view('livewire.homepage-wire');
    }
}
