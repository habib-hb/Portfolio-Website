<?php

namespace App\Livewire;

use App\Models\banner_headline;
use App\Models\blog_posts;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
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

    public $skills_section_items_array = [];

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

    public $skills_caption;

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

    public $recaptcha_token;

    public $no_search_results_found_show = false;




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

        $this->skills_caption = DB::table('site_data')->where('title', 'skills_caption')->first()->data;

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

        //Retriving Skills Section Data
        $skills_section_items_db = DB::select("SELECT * FROM skills_section");

        $this->skills_section_items_array = array_map(function ($item) {
            return ['id' => $item->id, 'skill_title' => $item->skill_title, 'skill_icon' => $item->skill_icon];
        }, $skills_section_items_db);
        //End Retriving Skills Section Data


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

            // $this->search_output = blog_posts::search($this->searchtext)->orderBy('blog_title', 'asc')->take(5)->get()->map(function ($post) {
            //     // Replace the search text with the highlighted version in a case-insensitive way
            //     $highlighted = '<b class="text-[#1A579F] ">' . e($this->searchtext) . '</b>';

            //     $post->blog_title = str_ireplace($this->searchtext, $highlighted, e($post->blog_title));
            //     $post->blog_excerpt = str_ireplace($this->searchtext, $highlighted, e($post->blog_excerpt));

            //     // if($post->blog_type == 'custom'){
            //     //     $post->blog_link = '/blogs/' . $post->blog_link;
            //     // }

            //     return $post;
            // });

            $this->searchtext = e($this->searchtext);

            $this->no_search_results_found_show = false;

            // $this->search_output = DB::table('blog_posts')
            $first_search_output = DB::table('blog_posts')
            ->where('blog_title', 'like', '%' . $this->searchtext . '%')
            ->orderBy('blog_title', 'asc')
            ->get()
            ->map(function ($post) {
                // Replace the search text with the highlighted version in a case-insensitive way
                $highlighted = '<b class="text-[#1A579F] ">' . e($this->searchtext) . '</b>';

                $post->item_title ='<b style="font-weight: 600; color: #1A579F;">Blog: </b>' . str_ireplace($this->searchtext, $highlighted, $post->blog_title);
                $post->item_excerpt = str_ireplace($this->searchtext, $highlighted, $post->blog_excerpt);
                $post->item_image = $post->blog_image;
                $post->item_link = $post->blog_link;

                // if($post->blog_type == 'custom'){
                //     $post->blog_link = '/blogs/' . $post->blog_link;
                // }

                return $post;
            });


            $second_search_output = DB::table('explore_items')
            ->where('item_title', 'like', '%' . $this->searchtext . '%')
            ->orderBy('item_title', 'asc')
            ->get()
            ->map(function ($item) {
                $highlighted = '<b class="text-[#1A579F] ">' . e($this->searchtext) . '</b>';

                $item->item_title ='<b style="font-weight: 600; color: #1A579F;">Demo: </b>' . str_ireplace($this->searchtext, $highlighted, $item->item_title);
                $item->item_excerpt = str_ireplace($this->searchtext, $highlighted, $item->item_description);
                $item->item_link = $item->site_link;
                $item->item_image = $item->image_link;
                return $item;
            });

            $third_search_output = DB::table('portfolio_items')
            ->where('portfolio_title', 'like', '%' . $this->searchtext . '%')
            ->orderBy('portfolio_title', 'asc')
            ->get()
            ->map(function ($item) {
                $highlighted = '<b class="text-[#1A579F] ">' . e($this->searchtext) . '</b>';

                $item->item_title ='<b style="font-weight: 600; color: #1A579F;">Portfolio: </b>' . str_ireplace($this->searchtext, $highlighted, $item->portfolio_title);
                $item->item_excerpt = str_ireplace($this->searchtext, $highlighted, $item->portfolio_description);
                $item->item_image = $item->portfolio_image_link;
                $item->item_link = $item->portfolio_site_link;
                return $item;
            });

            $fourth_search_output = DB::table('price_estimation')
            ->where('title', 'like', '%' . $this->searchtext . '%')
            ->orderBy('title', 'asc')
            ->get()
            ->map(function ($item) {
                $highlighted = '<b class="text-[#1A579F] ">' . e($this->searchtext) . '</b>';

                $item->item_title ='<b style="font-weight: 600; color: #1A579F;">Service: </b>' . str_ireplace($this->searchtext, $highlighted, $item->title);
                $item->item_excerpt = str_ireplace($this->searchtext, $highlighted, $item->description);
                $item->item_image = $item->icon_link;
                $item->item_link = env('BASE_LINK') . '/services/' .  str_replace(' ', '-', $item->title) . '?id=' .  $item->id;

                return $item;
            });


            $this->search_output = $first_search_output->merge($second_search_output)->merge($third_search_output)->merge($fourth_search_output);

            $this->search_output = $this->search_output->take(5);



            $this->search_output_length = $this->search_output->count();

            if ($this->search_output_length == 0) {

                // $this->dispatch('no_results_found');
                $this->no_search_results_found_show = true;
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


    #[On('recaptcha_token')]
    public function recaptcha_token($token)
    {

        $this->recaptcha_token = $token;

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

        if (empty($this->admin_name) || empty($this->admin_password) || empty($this->recaptcha_token)) {
            $this->notify_error = "Admin Name and Password Cann't Be Empty. And Please Verify The Captcha";
            return;
        }

        $recaptcha_secret = env('RECAPTCHA_SECRET_KEY');
        $recaptcha_response = $this->recaptcha_token;

        $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";

        $recaptcha = Http::asForm()->post($recaptcha_url, [
            'secret' => $recaptcha_secret,
            'response' => $recaptcha_response
        ]);

        $recaptcha = $recaptcha->json();

        if (!$recaptcha['success']) {
            $this->notify_error = "Please Verify The Captcha";
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
