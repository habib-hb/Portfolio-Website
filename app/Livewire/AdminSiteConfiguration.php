<?php

namespace App\Livewire;

use App\Models\banner_headline;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminSiteConfiguration extends Component
{

    use WithFileUploads;
    // public $banner_headline;

    public $temporary_image_site_logo_light;

    public $temporary_image_site_logo_dark;

    public $temporary_image_footer_logo_light;

    public $temporary_image_footer_logo_dark;

    public $temporary_image_hero_avatar;

    public $site_logo_light;

    public $site_logo_dark;

    public $footer_logo_light;

    public $footer_logo_dark;

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

    public $notify_success;

    public $notify_error;

    public $categories_page_caption;

    public $price_estimation_page_caption;

    public $dollar_rate_in_tk;

    public $footer_top_layer_text;

    public $footer_bottom_layer_text;


    // New section this page specific
    public $site_logo_light_specific;

    public $site_logo_dark_specific;

    public $footer_logo_light_specific;

    public $footer_logo_dark_specific;

    public $footer_top_layer_text_specific;

    public $footer_bottom_layer_text_specific;

    public $skills_caption;
    // End New section this page specific

    // Checking changes
    public $temporary_image_hero_avatar_changed = false;
    public $temporary_image_hero_avatar_previous = null;

    public $temporary_image_site_logo_light_changed = false;
    public $temporary_image_site_logo_light_previous = null;

    public $temporary_image_site_logo_dark_changed = false;
    public $temporary_image_site_logo_dark_previous = null;

    public $temporary_image_footer_logo_light_changed = false;
    public $temporary_image_footer_logo_light_previous = null;

    public $temporary_image_footer_logo_dark_changed = false;
    public $temporary_image_footer_logo_dark_previous = null;
    // End Checking changes





    public function mount(){

        $this->temporary_image_hero_avatar = DB::table('site_data')->where('title', 'hero_avatar_image')->first()->data;

        $this->temporary_image_site_logo_light = DB::table('site_data')->where('title', 'site_logo_light_mode')->first()->data;

        $this->temporary_image_site_logo_dark = DB::table('site_data')->where('title', 'site_logo_dark_mode')->first()->data;

        $this->top_layer_text = DB::table('site_data')->where('title', 'hero_top_layer_text')->first()->data;

        $this->up_middle_layer_text = DB::table('site_data')->where('title', 'hero_up_middle_layer_text')->first()->data;

        $this->down_middle_layer_text = DB::table('site_data')->where('title', 'hero_down_middle_layer_text')->first()->data;

        $this->end_layer_text = DB::table('site_data')->where('title', 'hero_end_layer_text')->first()->data;

        $this->categories_caption = DB::table('site_data')->where('title', 'categories_caption')->first()->data;

        $this->services_caption = DB::table('site_data')->where('title', 'services_caption')->first()->data;

        $this->my_portfolio_caption = DB::table('site_data')->where('title', 'my_portfolio_caption')->first()->data;

        $this->collaborations_caption = DB::table('site_data')->where('title', 'collaborations_caption')->first()->data;

        $this->testimonials_caption = DB::table('site_data')->where('title', 'testimonials_caption')->first()->data;

        $this->categories_page_caption = DB::table('site_data')->where('title', 'categories_page_caption')->first()->data;

        $this->price_estimation_page_caption = DB::table('site_data')->where('title', 'price_estimation_page_caption')->first()->data;

        $this->dollar_rate_in_tk = DB::table('site_data')->where('title', 'dollar_rate_in_tk')->first()->data;

        $this->temporary_image_footer_logo_light = DB::table('site_data')->where('title', 'footer_logo_light_mode')->first()->data;

        $this->temporary_image_footer_logo_dark = DB::table('site_data')->where('title', 'footer_logo_dark_mode')->first()->data;

        $this->footer_top_layer_text = DB::table('site_data')->where('title', 'footer_top_layer_text')->first()->data;

        $this->footer_bottom_layer_text = DB::table('site_data')->where('title', 'footer_bottom_layer_text')->first()->data;

        $this->skills_caption = DB::table('site_data')->where('title', 'skills_caption')->first()->data;

        // New section this page specific
        $this->site_logo_light_specific = DB::table('site_data')->where('title', 'site_logo_light_mode')->first()->data;

        $this->site_logo_dark_specific = DB::table('site_data')->where('title', 'site_logo_dark_mode')->first()->data;

        $this->footer_logo_light_specific = DB::table('site_data')->where('title', 'footer_logo_light_mode')->first()->data;

        $this->footer_logo_dark_specific = DB::table('site_data')->where('title', 'footer_logo_dark_mode')->first()->data;

        $this->footer_top_layer_text_specific = DB::table('site_data')->where('title', 'footer_top_layer_text')->first()->data;

        $this->footer_bottom_layer_text_specific = DB::table('site_data')->where('title', 'footer_bottom_layer_text')->first()->data;
        // End New section this page specific

    }


    public function save(){

            if(!$this->temporary_image_hero_avatar || !$this->temporary_image_site_logo_light || !$this->temporary_image_site_logo_dark || !$this->top_layer_text || !$this->up_middle_layer_text || !$this->down_middle_layer_text  || !$this->end_layer_text || !$this->categories_caption || !$this->services_caption || !$this->my_portfolio_caption || !$this->collaborations_caption || !$this->testimonials_caption || !$this->categories_page_caption || !$this->price_estimation_page_caption || !$this->dollar_rate_in_tk || !$this->temporary_image_footer_logo_light || !$this->temporary_image_footer_logo_dark || !$this->footer_top_layer_text || !$this->footer_bottom_layer_text || !$this->skills_caption){

                $this->notify_error = "Please fill all the fields";

                return;
            }

            if($this->temporary_image_hero_avatar_changed){
                $imagePath = str_replace('/storage/', '', $this->temporary_image_hero_avatar_previous);
                if (Storage::disk('public')->exists($imagePath)) {

                    Storage::disk('public')->delete($imagePath);

                    $this->temporary_image_hero_avatar_changed = false;

                    $this->temporary_image_hero_avatar_previous = null;

                }
            }

            if($this->temporary_image_site_logo_light_changed){
                $imagePath = str_replace('/storage/', '', $this->temporary_image_site_logo_light_previous);
                if (Storage::disk('public')->exists($imagePath)) {

                    Storage::disk('public')->delete($imagePath);

                    $this->temporary_image_site_logo_light_changed = false;

                    $this->temporary_image_site_logo_light_previous = null;

                }
            }

            if($this->temporary_image_site_logo_dark_changed){
                $imagePath = str_replace('/storage/', '', $this->temporary_image_site_logo_dark_previous);
                if (Storage::disk('public')->exists($imagePath)) {

                    Storage::disk('public')->delete($imagePath);

                    $this->temporary_image_site_logo_dark_changed = false;

                    $this->temporary_image_site_logo_dark_previous = null;

                }
            }

            if($this->temporary_image_footer_logo_light_changed){
                $imagePath = str_replace('/storage/', '', $this->temporary_image_footer_logo_light_previous);
                if (Storage::disk('public')->exists($imagePath)) {

                    Storage::disk('public')->delete($imagePath);

                    $this->temporary_image_footer_logo_light_changed = false;

                    $this->temporary_image_footer_logo_light_previous = null;

                }
            }

            if($this->temporary_image_footer_logo_dark_changed){
                $imagePath = str_replace('/storage/', '', $this->temporary_image_footer_logo_dark_previous);
                if (Storage::disk('public')->exists($imagePath)) {

                    Storage::disk('public')->delete($imagePath);

                    $this->temporary_image_footer_logo_dark_changed = false;

                    $this->temporary_image_footer_logo_dark_previous = null;

                }
            }


            //Database Check
            DB::table('site_data')->where('title', 'hero_avatar_image')->update(['data' => $this->temporary_image_hero_avatar]);
            DB::table('site_data')->where('title', 'site_logo_light_mode')->update(['data' => $this->temporary_image_site_logo_light]);
            DB::table('site_data')->where('title', 'site_logo_dark_mode')->update(['data' => $this->temporary_image_site_logo_dark]);
            DB::table('site_data')->where('title', 'hero_top_layer_text')->update(['data' => $this->top_layer_text]);
            DB::table('site_data')->where('title', 'hero_up_middle_layer_text')->update(['data' => $this->up_middle_layer_text]);
            DB::table('site_data')->where('title', 'hero_down_middle_layer_text')->update(['data' => $this->down_middle_layer_text]);
            DB::table('site_data')->where('title', 'hero_end_layer_text')->update(['data' => $this->end_layer_text]);
            DB::table('site_data')->where('title', 'categories_caption')->update(['data' => $this->categories_caption]);
            DB::table('site_data')->where('title', 'services_caption')->update(['data' => $this->services_caption]);
            DB::table('site_data')->where('title', 'my_portfolio_caption')->update(['data' => $this->my_portfolio_caption]);
            DB::table('site_data')->where('title', 'collaborations_caption')->update(['data' => $this->collaborations_caption]);
            DB::table('site_data')->where('title', 'testimonials_caption')->update(['data' => $this->testimonials_caption]);
            DB::table('site_data')->where('title', 'categories_page_caption')->update(['data' => $this->categories_page_caption]);
            DB::table('site_data')->where('title', 'price_estimation_page_caption')->update(['data' => $this->price_estimation_page_caption]);
            DB::table('site_data')->where('title', 'dollar_rate_in_tk')->update(['data' => $this->dollar_rate_in_tk]);
            DB::table('site_data')->where('title', 'footer_logo_light_mode')->update(['data' => $this->temporary_image_footer_logo_light]);
            DB::table('site_data')->where('title', 'footer_logo_dark_mode')->update(['data' => $this->temporary_image_footer_logo_dark]);
            DB::table('site_data')->where('title', 'footer_top_layer_text')->update(['data' => $this->footer_top_layer_text]);
            DB::table('site_data')->where('title', 'footer_bottom_layer_text')->update(['data' => $this->footer_bottom_layer_text]);
            DB::table('site_data')->where('title', 'skills_caption')->update(['data' => $this->skills_caption]);
            $this->notify_success = "Headlines and Site data Updated Successfully";


        }
    // public function save(){

    //         if(!$this->banner_headline){

    //             session()->flash('banner_error_message', 'Banner Headline Cann\'t Be Empty');

    //             return;
    //         }

    //         //Database Check
    //         $database_check_banner_headline = banner_headline::where('banner_type', "homepage")->first();

    //         if(!$database_check_banner_headline){
    //         banner_headline::create([
    //             'banner_text' => $this->banner_headline,
    //             'banner_type' => "homepage"
    //         ]);

    //         session()->flash('banner_message', 'Banner Headline Created Successfully');

    //     }else{

    //         $database_check_banner_headline->update([
    //             'banner_text' => $this->banner_headline
    //         ]);

    //         session()->flash('banner_message', 'Banner Headline Updated Successfully');

    //     }

    //     }


    #[On('notify-from-child-component')]
    public function changeThemeMode(){

        if(session('theme_mode') == 'light'){

            session(['theme_mode' => 'dark']);

        }else{


            session(['theme_mode' => 'light']);

        }

        $this->dispatch('alert-manager');

    }


    public function updated($property)
    {
        if ($property === 'hero_avatar_image') {
            // Checking if re-updating the image without going through the save process
            $reupdated = false;
            if($this->temporary_image_hero_avatar_changed){
                $reupdated = true;

                $imagePath = str_replace('/storage/', '', $this->temporary_image_hero_avatar);
                if (Storage::disk('public')->exists($imagePath)) {

                    Storage::disk('public')->delete($imagePath);

                }

            }

            $imagePath = $this->hero_avatar_image->store('temp_hero_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_hero_avatar && $this->temporary_image_hero_avatar_changed = true;

            // Making sure that the original previous image is set as previous, not the concurrent changing ones
            !$reupdated && $this->temporary_image_hero_avatar_previous = $this->temporary_image_hero_avatar;

            $this->temporary_image_hero_avatar = $imagePath;

            $this->resetErrorBag('hero_avatar_image');

            $reupdated = false;

        }

        if ($property === 'site_logo_light') {
             // Checking if re-updating the image without going through the save process
             $reupdated = false;
             if($this->temporary_image_site_logo_light_changed){
                 $reupdated = true;

                 $imagePath = str_replace('/storage/', '', $this->temporary_image_site_logo_light);
                 if (Storage::disk('public')->exists($imagePath)) {

                     Storage::disk('public')->delete($imagePath);

                 }

             }


            $imagePath = $this->site_logo_light->store('temp_site_logo_light_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_site_logo_light && $this->temporary_image_site_logo_light_changed = true;

            // Making sure that the original previous image is set as previous, not the concurrent changing ones
            !$reupdated && $this->temporary_image_site_logo_light_previous = $this->temporary_image_site_logo_light;

            $this->temporary_image_site_logo_light = $imagePath;

            $this->resetErrorBag('site_logo_light');

            $reupdated = false;

        }

        if ($property === 'site_logo_dark') {
            // Checking if re-updating the image without going through the save process
            $reupdated = false;
            if($this->temporary_image_site_logo_dark_changed){
                $reupdated = true;

                $imagePath = str_replace('/storage/', '', $this->temporary_image_site_logo_dark);
                if (Storage::disk('public')->exists($imagePath)) {

                    Storage::disk('public')->delete($imagePath);

                }

            }


            $imagePath = $this->site_logo_dark->store('temp_site_logo_dark_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_site_logo_dark && $this->temporary_image_site_logo_dark_changed = true;

            // Making sure that the original previous image is set as previous, not the concurrent changing ones
            !$reupdated && $this->temporary_image_site_logo_dark_previous = $this->temporary_image_site_logo_dark;

            $this->temporary_image_site_logo_dark = $imagePath;

            $this->resetErrorBag('site_logo_dark');

            $reupdated = false;

        }

        if ($property === 'footer_logo_light') {
             // Checking if re-updating the image without going through the save process
             $reupdated = false;
             if($this->temporary_image_footer_logo_light_changed){
                 $reupdated = true;

                 $imagePath = str_replace('/storage/', '', $this->temporary_image_footer_logo_light);
                 if (Storage::disk('public')->exists($imagePath)) {

                     Storage::disk('public')->delete($imagePath);

                 }

             }


            $imagePath = $this->footer_logo_light->store('temp_footer_logo_light_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_footer_logo_light && $this->temporary_image_footer_logo_light_changed = true;

            // Making sure that the original previous image is set as previous, not the concurrent changing ones
            !$reupdated && $this->temporary_image_footer_logo_light_previous = $this->temporary_image_footer_logo_light;

            $this->temporary_image_footer_logo_light = $imagePath;

            $this->resetErrorBag('footer_logo_light');

            $reupdated = false;

        }

        if ($property === 'footer_logo_dark') {
            // Checking if re-updating the image without going through the save process
            $reupdated = false;
            if($this->temporary_image_footer_logo_dark_changed){
                $reupdated = true;

                $imagePath = str_replace('/storage/', '', $this->temporary_image_footer_logo_dark);
                if (Storage::disk('public')->exists($imagePath)) {

                    Storage::disk('public')->delete($imagePath);

                }

            }


            $imagePath = $this->footer_logo_dark->store('temp_footer_logo_dark_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_footer_logo_dark && $this->temporary_image_footer_logo_dark_changed = true;

            // Making sure that the original previous image is set as previous, not the concurrent changing ones
            !$reupdated && $this->temporary_image_footer_logo_dark_previous = $this->temporary_image_footer_logo_dark;

            $this->temporary_image_footer_logo_dark = $imagePath;

            $this->resetErrorBag('footer_logo_dark');

            $reupdated = false;

        }
    }


    public function clear_banner_message(){

        session()->flash('banner_message', null);

    }


    public function clear_banner_error_message(){

        session()->flash('banner_error_message', null);

    }


    public function clear_notify_success(){

        $this->notify_success = null;

    }


    public function clear_notify_error(){

        $this->notify_error = null;

    }


    public function render()
    {
        return view('livewire.admin-site-configuration');
    }
}
