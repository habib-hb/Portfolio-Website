<?php

namespace App\Livewire;

use App\Models\blog_posts;
use Livewire\Component;

class AdminBlogsManage extends Component
{


    public $blogs=[];

    public $database_offset = 0;

    public $database_limit = 10;


    //system variables
    public $notification;

    public $deletable_blog_id;


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



    public function delete_blog($id){

       $this->deletable_blog_id = $id;

       $this->notification = 'Are You Sure You Want To Delete This Blog?';

    }


    public function delete_confirmed(){

        blog_posts::where('blog_id', $this->deletable_blog_id)->delete();

        //Rearrenging the data
        $database_query = blog_posts::where('blog_type', 'custom')
        ->orderBy('updated_at', 'desc')
        ->take($this->database_offset)
        ->get();

        $this->blogs = $database_query->toArray();





        $this->notification = 'The Blog Has Been Deleted Successfully';

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
        return view('livewire.admin-blogs-manage');
    }
}
