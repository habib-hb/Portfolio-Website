<?php

namespace App\Livewire;

use App\Models\blog_posts;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminBlogsManage extends Component
{


    public $blogs=[];

    public $database_offset = 0;

    public $database_limit = 10;


    //system variables
    public $notification;

    public $deletable_blog_id;

    public $notify_success;

    public $notify_error;


    public function mount(){

        $database_query = blog_posts::where('blog_type', 'custom')
        ->orderBy('blog_id', 'desc')
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
        ->orderBy('blog_id', 'desc')
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



    public function moveItemDown($id){

        $upItem = DB::select("SELECT * FROM blog_posts WHERE blog_id < ? ORDER BY blog_id DESC LIMIT 1", [$id]);

        $currentItem = DB::select("SELECT * FROM blog_posts WHERE blog_id = ?", [$id]);

        if(!$upItem){
            $this->notify_success = "The Blog is already at the bottom of the list.";
            return;
        }

        DB::table('blog_posts')->where('blog_id', $currentItem[0]->blog_id)->update([
            ...(array) $upItem[0],
            'blog_id' => $currentItem[0]->blog_id
        ]);

        DB::table('blog_posts')->where('blog_id', $upItem[0]->blog_id)->update([
            ...(array) $currentItem[0],
            'blog_id' => $upItem[0]->blog_id
        ]);

        $this->notify_success = "The Blog has been moved down.";

        $database_query = blog_posts::where('blog_type', 'custom')
        ->orderBy('blog_id', 'desc')
        ->take($this->database_offset)
        ->get();

        $this->blogs = $database_query->toArray();


    }

    public function moveItemUp($id){

        $downItem = DB::select("SELECT * FROM blog_posts WHERE blog_id > ? ORDER BY blog_id ASC LIMIT 1", [$id]);

        $currentItem = DB::select("SELECT * FROM blog_posts WHERE blog_id = ?", [$id]);

        if(!$downItem){
            $this->notify_success = "The Blog is already at the top of the list.";
            return;
        }

        DB::table('blog_posts')->where('blog_id', $currentItem[0]->blog_id)->update([
            ...(array) $downItem[0],
            'blog_id' => $currentItem[0]->blog_id
        ]);

        DB::table('blog_posts')->where('blog_id', $downItem[0]->blog_id)->update([
            ...(array) $currentItem[0],
            'blog_id' => $downItem[0]->blog_id
        ]);

        $this->notify_success = "The Blog has been moved up.";

        $database_query = blog_posts::where('blog_type', 'custom')
        ->orderBy('blog_id', 'desc')
        ->take($this->database_offset)
        ->get();

        $this->blogs = $database_query->toArray();

        // $portfolios_db = DB::select("SELECT * FROM portfolio_items");

        // $this->items_array = array_map(function ($item) {
        //     return [
        //         'portfolio_title' => $item->portfolio_title,
        //         'portfolio_description' => $item->portfolio_description,
        //         'portfolio_image_link' => $item->portfolio_image_link,
        //         'technologies_used' => $item->technologies_used,
        //         'portfolio_site_link' => $item->portfolio_site_link,
        //         'portfolio_github_link' => $item->portfolio_github_link,
        //         'id' => $item->id
        //     ];
        // }, $portfolios_db);

    }


    public function clear_notify_success(){

        $this->notify_success = null;

    }

    public function clear_notify_error(){

        $this->notify_error = null;

    }



    public function clear_notification(){

        $this->notification = null;

    }



    public function render()
    {
        return view('livewire.admin-blogs-manage');
    }
}
