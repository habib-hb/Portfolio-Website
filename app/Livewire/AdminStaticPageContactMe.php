<?php

namespace App\Livewire;

use App\Models\blog_posts;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class AdminStaticPageContactMe extends Component
{
    use WithFileUploads;

    // public $author_name;

    // public $blog_headline;

    // public $blog_slug;

    // public $blog_excerpt;

    // public $blog_image;

    // public $blog_area;


    // // Operational

    // public $image_url;

    // public $loading_image;

    // public $slug_already_in_use;

    // public $slug_available;

    // public $temporary_image;

    // public $form_error_message;

    // public $form_completion_message;


    //About Me
    // public $about_title;

    // public $about_excerpt;

    // public $about_icon_image;

    // public $about_profile_image;

    // public $about_me_content;

    // public $temporary_image_icon;

    // public $temporary_image_profile;

    // public $notify_success;

    // public $notify_error;

    //Contact Me
    public $email;

    public $phone;

    public $address;

    public $facebook_link;

    public $instagram_link;

    public $twitter_link;

    public $linkedin_link;

    public $github_link;

    public $email_icon;

    public $phone_icon;

    public $address_icon;

    public $social_icon;

    public $title_icon;

    public $temporary_image_email_icon;

    public $temporary_image_phone_icon;

    public $temporary_image_address_icon;

    public $temporary_image_social_icon;

    public $temporary_image_title_icon;

    public $notify_success;

    public $notify_error;

    public $no_social_media_added;




    public function mount()
    {
        // $about_me = DB::table('about-me-page')->where('id', 1)->first();
        // $this->about_title = $about_me->title;
        // $this->about_excerpt = $about_me->excerpt;
        // $this->temporary_image_icon = $about_me->icon_image;
        // $this->temporary_image_profile = $about_me->profile_image;
        // $this->about_me_content = $about_me->content;

        $contact_me = DB::table('contact_me_page')->where('id', 1)->first();
        $this->email = $contact_me->email;
        $this->phone = $contact_me->phone;
        $this->address = $contact_me->address;
        $this->temporary_image_email_icon = $contact_me->email_icon;
        $this->temporary_image_phone_icon = $contact_me->phone_icon;
        $this->temporary_image_address_icon = $contact_me->address_icon;
        $this->temporary_image_social_icon = $contact_me->social_icon;
        $this->temporary_image_title_icon = $contact_me->title_icon;
        $this->facebook_link = $contact_me->facebook_link;
        $this->instagram_link = $contact_me->instagram_link;
        $this->twitter_link = $contact_me->twitter_link;
        $this->linkedin_link = $contact_me->linkedin_link;
        $this->github_link = $contact_me->github_link;
    }

    public function save()
    {

        if ($this->email && $this->phone && $this->address && $this->temporary_image_email_icon && $this->temporary_image_phone_icon && $this->temporary_image_address_icon && $this->temporary_image_social_icon) {

            DB::table('contact_me_page')->where('id', 1)->update([
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'email_icon' => $this->temporary_image_email_icon,
                'phone_icon' => $this->temporary_image_phone_icon,
                'address_icon' => $this->temporary_image_address_icon,
                'social_icon' => $this->temporary_image_social_icon,
                'title_icon' => $this->temporary_image_title_icon,
                'facebook_link' => $this->facebook_link,
                'instagram_link' => $this->instagram_link,
                'twitter_link' => $this->twitter_link,
                'linkedin_link' => $this->linkedin_link,
                'github_link' => $this->github_link
            ]);

            $this->notify_success = 'Updated Successfully';


        } else {

            $this->notify_error = 'Please fill all the fields correctly';
        }
    }

    public function updated($property)
    {

        if ($property === 'email_icon') {

            $imagePath = $this->email_icon->store('temp_contact_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_email_icon = $imagePath;

            $this->resetErrorBag('email_icon');
        }

        if ($property === 'phone_icon') {

            $imagePath = $this->phone_icon->store('temp_contact_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_phone_icon = $imagePath;

            $this->resetErrorBag('phone_icon');
        }

        if ($property === 'address_icon') {

            $imagePath = $this->address_icon->store('temp_contact_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_address_icon = $imagePath;

            $this->resetErrorBag('address_icon');
        }


        if ($property === 'social_icon') {

            $imagePath = $this->social_icon->store('temp_contact_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_social_icon = $imagePath;

            $this->resetErrorBag('social_icon');
        }


        if ($property === 'title_icon') {

            $imagePath = $this->title_icon->store('temp_contact_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_title_icon = $imagePath;

            $this->resetErrorBag('title_icon');
        }
    }



    #[On('notify-from-child-component')]
    public function changeThemeMode()
    {
        if (session('theme_mode') == 'light') {

            session(['theme_mode' => 'dark']);
        } else {


            session(['theme_mode' => 'light']);
        }

        $this->dispatch('alert-manager');
    }



    public function clear_notify_success()
    {
        $this->notify_success = null;
    }

    public function clear_notify_error()
    {
        $this->notify_error = null;
    }

    public function render()
    {
        return view('livewire.admin-static-page-contact-me');
    }
}
