<?php

namespace App\Livewire;

use App\Models\blog_posts;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class AdminStaticPagePrivacyPolicy extends Component
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



    // Privacy Policy
    public $privacy_policy_content;

    public $privacy_title_icon;

    public $temporary_image_privacy;

    public $notify_success;

    public $notify_error;



    public function mount()
    {
        // $about_me = DB::table('about-me-page')->where('id', 1)->first();
        // $this->about_title = $about_me->title;
        // $this->about_excerpt = $about_me->excerpt;
        // $this->temporary_image_icon = $about_me->icon_image;
        // $this->temporary_image_profile = $about_me->profile_image;
        // $this->about_me_content = $about_me->content;
        $privacy_policy = DB::table('privacy-policy-page')->where('id', 1)->first();
        $this->privacy_policy_content = $privacy_policy->content;
        $this->temporary_image_privacy = $privacy_policy->title_icon;
    }

    public function save()
    {

        if ($this->privacy_policy_content) {

            // blog_posts::create([
            //     'blog_author' => $this->author_name,
            //     'blog_title' => $this->blog_headline,
            //     'blog_link' =>  '/blogs/' . $this->blog_slug,
            //     'blog_excerpt' => $this->blog_excerpt,
            //     'blog_image' => $this->image_url,
            //     'blog_text' => $this->blog_area,
            //     'blog_type' => 'custom',
            // ]);

            // DB::table('about-me-page')->where('id', 1)->update([
            //     'title' => $this->about_title,
            //     'excerpt' => $this->about_excerpt,
            //     'icon_image' => $this->temporary_image_icon,
            //     'profile_image' => $this->temporary_image_profile,
            //     'content' => $this->about_me_content
            // ]);
            DB::table('privacy-policy-page')->where('id', 1)->update([
                'title_icon' => $this->temporary_image_privacy,
                'content' => $this->privacy_policy_content
            ]);

            $this->notify_success = 'Updated Successfully';

            // $this->about_title = null;

            // $this->temporary_image_icon = null;

            // $this->temporary_image_profile = null;

            // $this->about_me_content = null;

            // $this->resetErrorBag('about_icon_image');

            // $this->resetErrorBag('about_profile_image');

            // $this->dispatch('refresh-blog-area');
            // $this->dispatch('refresh-image-area');


        } else {

            $this->notify_error = 'Please fill all the fields correctly';

        }
    }

    public function updated($property)
    {

        if ($property === 'privacy_title_icon') {

            $imagePath = $this->privacy_title_icon->store('temp_privacy_policy_images', 'public');

            //Full Link
            $imagePath = asset('storage/' . $imagePath);

            $this->temporary_image_privacy = $imagePath;

            $this->resetErrorBag('privacy_title_icon');

        }


    }



    #[On('updateTextarea')]
    public function updateTextarea($text)
    {
        $this->privacy_policy_content = $text;
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
        return view('livewire.admin-static-page-privacy-policy');
    }
}
