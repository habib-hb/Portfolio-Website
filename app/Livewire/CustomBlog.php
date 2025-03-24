<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CustomBlog extends Component
{

    public $blog_image;

    public $blog_title;

    public $blog_excerpt;

    public $blog_text;

    public $blog_author;

    public $blog_date;

    //New Additions
    public $site_logo_light;

    public $site_logo_dark;

    public $footer_logo_light;

    public $footer_logo_dark;

    public $footer_top_layer_text;

    public $footer_bottom_layer_text;
    //End New Additions

    public function mount($blog_image, $blog_title, $blog_excerpt, $blog_text, $blog_author, $blog_date)
    {

        $formattedDate = Carbon::parse($blog_date)->format('jS F, Y');

        $this->blog_image = $blog_image;
        $this->blog_title = $blog_title;
        $this->blog_excerpt = $blog_excerpt;
        $this->blog_text = $blog_text;
        $this->blog_author = $blog_author;
        $this->blog_date = $formattedDate;

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
        return view('livewire.custom-blog');
    }
}
