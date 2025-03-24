<?php

namespace App\Livewire;

use App\Models\blog_posts;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BlogShowcase extends Component
{


    public $blogs = [];

    public $database_offset = 0;

    public $database_limit = 10;

    //system variables
    public $notification;

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

        $database_query = blog_posts::where('blog_type', 'custom')
            ->orderBy('blog_id', 'desc')
            ->skip($this->database_offset)
            ->take($this->database_limit)
            ->get();

        $this->blogs = $database_query->toArray();

        // dd($this->blogs);

        // Increase the offset for the next load
        $this->database_offset += $this->database_limit;

        //New Additions
        $this->site_logo_light = DB::table('site_data')->where('title', 'site_logo_light_mode')->first()->data;

        $this->site_logo_dark = DB::table('site_data')->where('title', 'site_logo_dark_mode')->first()->data;

        $this->footer_logo_light = DB::table('site_data')->where('title', 'footer_logo_light_mode')->first()->data;

        $this->footer_logo_dark = DB::table('site_data')->where('title', 'footer_logo_dark_mode')->first()->data;

        $this->footer_top_layer_text = DB::table('site_data')->where('title', 'footer_top_layer_text')->first()->data;

        $this->footer_bottom_layer_text = DB::table('site_data')->where('title', 'footer_bottom_layer_text')->first()->data;
        //End New Additions
    }

    public function loadMore()
    {

        $database_query = blog_posts::where('blog_type', 'custom')
            ->orderBy('updated_at', 'desc')
            ->skip($this->database_offset)
            ->take($this->database_limit)
            ->get();




        if ($database_query->isEmpty()) {

            $this->notification = 'No More Blog Posts Found';
        }

        //Merging Both collections
        $this->blogs = array_merge($this->blogs, $database_query->toArray());


        // Increase the offset for the next load
        $this->database_offset += $this->database_limit;
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


    public function clear_notification()
    {

        $this->notification = null;
    }



    public function render()
    {
        return view('livewire.blog-showcase');
    }
}
