<?php

namespace App\Livewire;

use App\Models\blog_posts;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminBlogsEdit extends Component
{
    use WithFileUploads;

    public $identifier_slug;

    public $author_name;

    public $blog_headline;

    public $blog_slug;

    public $blog_excerpt;

    public $blog_image;

    public $blog_area;


    // Operational

    public $image_url;

    public $loading_image;

    public $slug_already_in_use;

    public $slug_available;

    public $temporary_image;

    public $form_error_message;

    public $form_completion_message;

    public $image_changed;

    public $slug_is_compatible = true;



    public function mount($blog_slug){

        $this->identifier_slug = $blog_slug;

       $database_query = blog_posts::where('blog_link', '/blogs/' . $blog_slug)->get();

       $database_query_array = $database_query->toArray();

        if( count($database_query_array) > 0){

            $this->author_name = $database_query[0]->blog_author;

            $this->blog_headline = $database_query[0]->blog_title;

            $this->blog_slug = $blog_slug;

            $this->blog_excerpt = $database_query[0]->blog_excerpt;

            $this->blog_image = $database_query[0]->blog_image;

            $this->temporary_image = $database_query[0]->blog_image; // This will be used to show the picture temporarily on the frontend

            $this->blog_area = $database_query[0]->blog_text;


        }

    }


    public function save(){

        if($this->author_name && $this->blog_headline && $this->blog_slug && $this->blog_excerpt && $this->blog_image  && $this->blog_area && $this->slug_is_compatible){


            if($this->image_changed){

                $this->validate([
                    'blog_image' => 'image|max:1024', // Image validation (1MB max)
                ]);

                // Store the uploaded image and get the file path
                $imagePath = $this->blog_image->store('blog_images', 'public');

                // Generate the full image_URL to the stored image
                $this->image_url = '/storage/' . $imagePath;

                $this->temporary_image = $this->image_url;


            }


            blog_posts::where('blog_link', '/blogs/' . $this->identifier_slug)->update([
                'blog_author' => $this->author_name,
                'blog_title' => $this->blog_headline,
                'blog_link' =>  '/blogs/' . $this->blog_slug,//this is the updated one from the user
                'blog_excerpt' => $this->blog_excerpt,
                'blog_image' => $this->temporary_image,
                'blog_text' => $this->blog_area,
                'blog_type' => 'custom',
            ]);

            $this->form_completion_message = 'Blog Post Created Successfully';

            $this->dispatch('alert-manager');

            $this->resetErrorBag('blog_image');

            $this->dispatch('alert-manager');


        }else if(!$this->author_name || !$this->blog_headline || !$this->blog_slug || !$this->blog_excerpt || !$this->blog_image || !$this->blog_area || !$this->slug_available){

            $this->form_error_message = 'Please fill all the fields correctly';

            $this->dispatch('alert-manager');

        }

    }

    public function updated($property)
    {
        // $property: The name of the current property that was updated

        if ($property === 'blog_slug') {

            $this->blog_slug = str_replace(' ', '-', $this->blog_slug);

            // Database Check for already existing slugs
            $database_check = blog_posts::where('blog_link', '/blogs/' . $this->blog_slug)->get();


            if($database_check->count() > 0 && $database_check[0]->blog_link !== '/blogs/' . $this->identifier_slug){

                $this->slug_already_in_use ='This slug is already in use';

                $this->slug_available = null;

                $this->slug_is_compatible = false;



            }else{

                $this->slug_available =  "The slug is available";

                $this->slug_already_in_use = null;

                $this->slug_is_compatible = true;

            }

        }



        if($property === 'blog_image'){
            $imagePath = $this->blog_image->store('temp_blog_images', 'public');

            //Full Link
            $imagePath = asset('storage/' . $imagePath);

            $this->temporary_image = $imagePath;

            $this->image_changed = true;

            $this->resetErrorBag('blog_image');


        }
    }



    // public function updating($property, $value)
    // {
    //     // $property: The name of the current property being updated
    //     // $value: The value about to be set to the property

    //     if ($property === 'blog_image') {
    //         $this->loading_image = "Loading...";

    //         $this->dispatch('alert-manager');

    //         $this->dispatch('reinitialize_blog_form');
    //     }
    // }


    #[On('updateTextarea')]
    public function updateTextarea($text){

        $this->blog_area = $text;


    }



    #[On('notify-from-child-component')]
    public function changeThemeMode(){

        if(session('theme_mode') == 'light'){

            session(['theme_mode' => 'dark']);

        }else{


            session(['theme_mode' => 'light']);

        }

        $this->dispatch('alert-manager');

    }

     public function clear_form_completion_message()
    {
        $this->form_completion_message = null;
    }


    public function clear_form_error_message()
    {
        $this->form_error_message = null;

        $this->dispatch('alert-manager');
    }

    public function render()
    {
        // $this->dispatch('alert-manager');

        return view('livewire.admin-blogs-edit');
    }
}
