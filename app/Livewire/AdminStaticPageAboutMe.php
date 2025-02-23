<?php

namespace App\Livewire;

use App\Models\blog_posts;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class AdminStaticPageAboutMe extends Component
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
    public $about_title;

    public $about_excerpt;

    public $about_icon_image;

    public $about_profile_image;

    public $about_me_content;

    public $temporary_image_icon;

    public $temporary_image_profile;

    public $notify_success;

    public $notify_error;



    public function mount()
    {
        $about_me = DB::table('about-me-page')->where('id', 1)->first();
        $this->about_title = $about_me->title;
        $this->about_excerpt = $about_me->excerpt;
        $this->temporary_image_icon = $about_me->icon_image;
        $this->temporary_image_profile = $about_me->profile_image;
        $this->about_me_content = $about_me->content;
    }

    public function save()
    {

        if ($this->about_title && $this->about_excerpt && $this->temporary_image_icon && $this->temporary_image_profile && $this->about_me_content) {

            // blog_posts::create([
            //     'blog_author' => $this->author_name,
            //     'blog_title' => $this->blog_headline,
            //     'blog_link' =>  '/blogs/' . $this->blog_slug,
            //     'blog_excerpt' => $this->blog_excerpt,
            //     'blog_image' => $this->image_url,
            //     'blog_text' => $this->blog_area,
            //     'blog_type' => 'custom',
            // ]);

            DB::table('about-me-page')->where('id', 1)->update([
                'title' => $this->about_title,
                'excerpt' => $this->about_excerpt,
                'icon_image' => $this->temporary_image_icon,
                'profile_image' => $this->temporary_image_profile,
                'content' => $this->about_me_content
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

        if ($property === 'about_icon_image') {

            $imagePath = $this->about_icon_image->store('temp_about_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_icon = $imagePath;

            $this->resetErrorBag('about_icon_image');

        }


        if ($property === 'about_profile_image') {

            $imagePath = $this->about_profile_image->store('temp_about_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_profile = $imagePath;

            $this->resetErrorBag('about_profile_image');

        }
    }



    #[On('updateTextarea')]
    public function updateTextarea($text)
    {
        $this->about_me_content = $text;
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
        return view('livewire.admin-static-page-about-me');
    }
}
