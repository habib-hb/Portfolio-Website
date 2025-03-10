<?php

namespace App\Livewire;

use App\Models\banner_headline;
use App\Models\blog_posts;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class HomepageWire extends Component
{

    public $theme_mode;

    public $searchtext = '';

    public $search_output;

    public $search_input_field_is_active;

    public $search_output_length;

    public $banner_headline;

    public $first_load = true;

    public $options_array = [];

    public $portfolios_array = [];

    public $estimation_options = [];

    public $admin_login_popup_is_active = false;

    public $admin_name;

    public $admin_password;

    public $notify_success;

    public $notify_error;

    public $admin_active = false;

    public $hero_avatar_image;

    public $top_layer_text;

    public $up_middle_layer_text;

    public $down_middle_layer_text;

    public $end_layer_text;

    public $categories_caption;

    public $services_caption;

    public $my_portfolio_caption;

    public $collaborations_caption;

    public $testimonials_caption;

    public $collaboration_cards;

    public $testimonials_cards;

    //New Additions
    public $site_logo_light;

    public $site_logo_dark;

    public $footer_logo_light;

    public $footer_logo_dark;

    public $footer_top_layer_text;

    public $footer_bottom_layer_text;
    //End New Additions

    public $consultation_client_phone;




    public function mount()
    {
        if (!session('theme_mode')) {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);
        } else {

            $this->theme_mode = session('theme_mode');
        }

        $this->hero_avatar_image = DB::table('site_data')->where('title', 'hero_avatar_image')->first()->data;

        $this->top_layer_text = DB::table('site_data')->where('title', 'hero_top_layer_text')->first()->data;

        $this->up_middle_layer_text = DB::table('site_data')->where('title', 'hero_up_middle_layer_text')->first()->data;

        $this->down_middle_layer_text = DB::table('site_data')->where('title', 'hero_down_middle_layer_text')->first()->data;

        $this->end_layer_text = DB::table('site_data')->where('title', 'hero_end_layer_text')->first()->data;

        $this->categories_caption = DB::table('site_data')->where('title', 'categories_caption')->first()->data;

        $this->services_caption = DB::table('site_data')->where('title', 'services_caption')->first()->data;

        $this->my_portfolio_caption = DB::table('site_data')->where('title', 'my_portfolio_caption')->first()->data;

        $this->collaborations_caption = DB::table('site_data')->where('title', 'collaborations_caption')->first()->data;

        $this->testimonials_caption = DB::table('site_data')->where('title', 'testimonials_caption')->first()->data;

        //New Additions
        $this->site_logo_light = DB::table('site_data')->where('title', 'site_logo_light_mode')->first()->data;

        $this->site_logo_dark = DB::table('site_data')->where('title', 'site_logo_dark_mode')->first()->data;

        $this->footer_logo_light = DB::table('site_data')->where('title', 'footer_logo_light_mode')->first()->data;

        $this->footer_logo_dark = DB::table('site_data')->where('title', 'footer_logo_dark_mode')->first()->data;

        $this->footer_top_layer_text = DB::table('site_data')->where('title', 'footer_top_layer_text')->first()->data;

        $this->footer_bottom_layer_text = DB::table('site_data')->where('title', 'footer_bottom_layer_text')->first()->data;
        //End New Additions



        //Retriving Estimation Data
        $estimationItemsArray = DB::table('price_estimation')->get();

        $this->estimation_options = $estimationItemsArray;
        //End Retriving Estimation Data


        if (session()->has('admin_name')) {

            $this->admin_active = true;
        }


        $this->search_input_field_is_active = session('search_input_field_is_active');

        //Database test for banner_headline
        $banner_headline_check = banner_headline::where('banner_type', "homepage")->first();

        if ($banner_headline_check) {

            $this->banner_headline = $banner_headline_check->banner_text;
        } else {

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

        $collaboration_cards_db = DB::select("SELECT * FROM collaboration_section");

        $this->collaboration_cards = array_map(function ($item) {
            return [
                'name' => $item->name,
                'profession' => $item->profession,
                'profile_image' => $item->profile_image,
                'id' => $item->id
            ];
        }, $collaboration_cards_db);

        $testimonials_cards_db = DB::select("SELECT * FROM testimonials_section");

        $this->testimonials_cards = array_map(function ($item) {
            return [
                'name' => $item->name,
                'profession' => $item->profession,
                'profile_image' => $item->profile_image,
                'quote' => $item->quote,
                'id' => $item->id
            ];
        }, $testimonials_cards_db);
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

            if ($this->search_output_length == 0) {

                $this->dispatch('no_results_found');
            }


            $this->search_input_field_is_active = true;

            session(['search_input_field_is_active' => $this->search_input_field_is_active]);
        } else {

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

        if ($this->first_load) {

            $this->dispatch('load_animation');

            $this->first_load = false;
        }
    }


    #[On('activate_search_input_field')]
    public function activate_search_input_field()
    {
        $this->search_input_field_is_active = true;

        session(['search_input_field_is_active' => $this->search_input_field_is_active]);

        $this->dispatch('alert-manager');
    }



    // #[On('theme-change')]
    public function changeThemeMode()
    {

        if ($this->theme_mode == 'light') {

            $this->theme_mode = 'dark';

            session(['theme_mode' => $this->theme_mode]);
        } else {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);
        }

        $this->dispatch('alert-manager');
    }

    public function adminLoginPopup()
    {
        if ($this->admin_login_popup_is_active) {

            $this->admin_login_popup_is_active = false;
        } else {

            $this->admin_login_popup_is_active = true;
        }

        $this->dispatch('alert-manager');
    }



    public function login()
    {

        if (empty($this->admin_name) || empty($this->admin_password)) {
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

            // return redirect('/admin_dashboard');
            $this->dispatch('redirect_to_admin_dashboard');

        } else {

            $this->notify_error = "Invalid Credentials";

            session(['admin_name' => null]);
        }

        $this->dispatch('alert-manager');

        // if (Auth::attempt($credentials)) {
        //     session()->regenerate();
        //     return redirect()->to('/admin/dashboard');
        // } else {
        //     $this->addError('admin_name', 'Invalid credentials.');
        // }
    }


    public function clear_notify_error()
    {
        $this->notify_error = null;
        $this->dispatch('alert-manager');
    }

    public function clear_notify_success()
    {
        $this->notify_success = null;
        $this->dispatch('alert-manager');
    }


    public function consultationStripeRedirect()
    {
        if(!$this->consultation_client_phone){
            $this->notify_error = "Please Enter Your Phone Number";
            $this->dispatch('alert-manager');
            return;
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Your Product Name',
                    ],
                    'unit_amount' => 2000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
        ]);

        DB::table('consultation_stripe_bookings')->insert([
            'client_session_id' => $session->id,
            'client_phone' => $this->consultation_client_phone,
            'payment_status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect($session->url);
        // return redirect()->to('https://buy.stripe.com/test_dR6aV95550000000000000000');
    }



    public function render()
    {
        return view('livewire.homepage-wire');
    }
}
