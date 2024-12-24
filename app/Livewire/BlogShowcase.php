<?php

namespace App\Livewire;

use App\Models\blog_posts;
use Livewire\Component;

class BlogShowcase extends Component
{


    public $blogs=[];

    public $database_offset = 0;

    public $database_limit = 10;

    //system variables
    public $notification;


    public function mount(){

        $database_query = blog_posts::where('blog_type', 'custom')
        ->orderBy('updated_at', 'desc')
        ->skip($this->database_offset)
        ->take($this->database_limit)
        ->get();

        $this->blogs = $database_query->toArray();

        // dd($this->blogs);

        // Increase the offset for the next load
        $this->database_offset += $this->database_limit;

    }

    public function loadMore(){

        $database_query = blog_posts::where('blog_type', 'custom')
        ->orderBy('updated_at', 'desc')
        ->skip($this->database_offset)
        ->take($this->database_limit)
        ->get();




        if($database_query->isEmpty()){

            $this->notification = 'No More Blog Posts Found';

        }

        //Merging Both collections
        $this->blogs = array_merge($this->blogs, $database_query->toArray());


         // Increase the offset for the next load
         $this->database_offset += $this->database_limit;


    }




    public function changeThemeMode(){

        if(session('theme_mode') == 'light'){

            session(['theme_mode' => 'dark']);

        }else{


            session(['theme_mode' => 'light']);

        }

        $this->dispatch('alert-manager');

    }


    public function clear_notification(){

        $this->notification = null;

    }



    public function render()
    {
        return view('livewire.blog-showcase');
    }
}
