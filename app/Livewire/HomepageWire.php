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

    public $portfolios_array = [];

    public $estimation_options= [];

    public $admin_login_popup_is_active = false;

    public $admin_name;

    public $admin_password;

    public $notify_success;

    public $notify_error;

    public $admin_active = false;



    public function mount()
    {
        if(!session('theme_mode')) {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);

        }else{

            $this->theme_mode = session('theme_mode');

        }

        //Retriving Estimation Data
            $estimationItemsArray = DB::table('price_estimation')->get();

            $this->estimation_options = $estimationItemsArray;
        //End Retriving Estimation Data


        if(session()->has('admin_name')){

            $this->admin_active = true;
            
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


        $portfolios_db = DB::select("SELECT * FROM portfolio_items");

        $this->portfolios_array = array_map(function ($item) {
            return [
                'portfolio_title' => $item->portfolio_title,
                'portfolio_description' => $item->portfolio_description,
                'portfolio_image_link' => $item->portfolio_image_link,
                'technologies_used' => $item->technologies_used,
                'portfolio_site_link' => $item->portfolio_site_link,
                'portfolio_github_link' => $item->portfolio_github_link,
                'id' => $item->id
            ];
        }, $portfolios_db);
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

    public function adminLoginPopup(){
        if($this->admin_login_popup_is_active){

            $this->admin_login_popup_is_active = false;

        }else{

            $this->admin_login_popup_is_active = true;

        }
    }



    public function login()
    {

        if(empty($this->admin_name) || empty($this->admin_password)){
            $this->notify_error = "Admin Name and Password Cann't Be Empty";
            return;
        }

        $db_admin_name = DB::table('site_data')->where('title', 'admin_username')->pluck('data')->first();

        $db_admin_password = DB::table('site_data')->where('title', 'admin_password')->pluck('data')->first();

        if ($this->admin_name == $db_admin_name && $this->admin_password == $db_admin_password) {

            session(['admin_name' => $this->admin_name]);

            $this->notify_success = "Login Successful";

            $this->admin_login_popup_is_active = false;

            $this->admin_name = null;
            $this->admin_password = null;

            return redirect('/admin_dashboard');

        }else {

            $this->notify_error = "Invalid Credentials";

            session(['admin_name' => null]);

        }

        // if (Auth::attempt($credentials)) {
        //     session()->regenerate();
        //     return redirect()->to('/admin/dashboard');
        // } else {
        //     $this->addError('admin_name', 'Invalid credentials.');
        // }
    }


    public function clear_notify_error(){
        $this->notify_error = null;
    }

    public function clear_notify_success(){
        $this->notify_success = null;
    }



    public function render()
    {
        return view('livewire.homepage-wire');
    }
}
