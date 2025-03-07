<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class AdminTestimonialsSectionManagement extends Component
{
    use WithFileUploads;

    // Collaboration Section
    public $name;

    public $profession;

    public $temporary_image_testimonials;

    public $profile_image;

    public $quote;

    public $created_testimonials_selected = false;

    public $editable_testimonials_id;

    public $confirmation_alert = [
        'active' => false,
        'type' => 'warning',
        'message' => 'Are You Sure?',
        'action' => '',
        'id' => '',
        'title' => 'Confirmation'
    ];

    public $items_array = [];

    public $form_error_message;

    public $form_completion_message;

    public $editable_portfolio_id;

    public $theme_mode;

    public function mount()
    {

        if(!session('theme_mode')) {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);

        }else{

            $this->theme_mode = session('theme_mode');

        }

        $testimonials_db = DB::select("SELECT * FROM testimonials_section");

        $this->items_array = array_map(function ($item) {
            return [
                'name' => $item->name,
                'profession' => $item->profession,
                'profile_image' => $item->profile_image,
                'quote' => $item->quote,
                'id' => $item->id
            ];
        }, $testimonials_db);
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



    public function save_item()
    {

        if ($this->editable_testimonials_id) {
            if ($this->name && $this->profession && $this->temporary_image_testimonials && $this->quote) {
                DB::table('testimonials_section')->where('id', $this->editable_testimonials_id)->update([
                    'name' => $this->name,
                    'profession' => $this->profession,
                    'profile_image' => $this->temporary_image_testimonials,
                    'quote' => $this->quote
                ]);

                $testimonials_db = DB::select("SELECT * FROM testimonials_section");

                $this->items_array = array_map(function ($item) {
                    return [
                        'name' => $item->name,
                        'profession' => $item->profession,
                        'profile_image' => $item->profile_image,
                        'quote' => $item->quote,
                        'id' => $item->id
                    ];
                }, $testimonials_db);

                $this->editable_testimonials_id = null;

                $this->name = null;

                $this->profession = null;

                $this->temporary_image_testimonials = null;

                $this->profile_image = null;

                $this->quote = null;

                $this->form_completion_message = 'Testimonial Card Updated Successfully';

                $this->dispatch('refresh-blog-area');
                $this->dispatch('refresh-image-area');

                return;
            } else {
                $this->form_error_message = 'All Fields Are Required';
            }
        }
        // $this->validate([
        //     'item_image' => 'image|max:1024', // Image validation (1MB max)
        // ]);
        // if ($this->option && $this->item_title && $this->blog_area && $this->temporary_image_portfolio && $this->site_link) {
        if ($this->name && $this->profession && $this->temporary_image_testimonials && $this->quote) {
            DB::table('testimonials_section')->insert([
                'name' => $this->name,
                'profession' => $this->profession,
                'profile_image' => $this->temporary_image_testimonials,
                'quote' => $this->quote
            ]);


            $testimonials_db = DB::select("SELECT * FROM testimonials_section");

            $this->items_array = array_map(function ($item) {
                return [
                    'name' => $item->name,
                    'profession' => $item->profession,
                    'profile_image' => $item->profile_image,
                    'quote' => $item->quote,
                    'id' => $item->id
                ];
            }, $testimonials_db);


            $this->name = "";
            $this->profession = "";
            $this->temporary_image_testimonials = "";
            $this->profile_image = "";
            $this->quote = "";

            $this->dispatch('alert-manager');
            $this->form_completion_message = "Testimonial Card Added Successfully.";
            $this->dispatch('refresh-blog-area');
            $this->dispatch('refresh-image-area');
        } else {
            $this->form_error_message = "All fields are required.";
            $this->dispatch('alert-manager');
        }
    }



    public function updated($property)
    {
        if ($property === 'profile_image') {
            $imagePath = $this->profile_image->store('temp_collaboration_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_testimonials = $imagePath;

            $this->resetErrorBag('profile_image');
        }
    }




    public function created_testimonials()
    {

        if ($this->created_testimonials_selected) {
            $this->created_testimonials_selected = false;
        } else {
            $this->created_testimonials_selected = true;
        }
    }

    public function deleteTestimonial($id)
    {

        DB::table('testimonials_section')->where('id', $id)->delete();

        $this->clear_confirmation_alert();

        $testimonials_db = DB::select("SELECT * FROM testimonials_section");

        $this->items_array = array_map(function ($item) {
            return [
                'name' => $item->name,
                'profession' => $item->profession,
                'profile_image' => $item->profile_image,
                'quote' => $item->quote,
                'id' => $item->id
            ];
        }, $testimonials_db);

        $this->form_completion_message = 'Testimonial Card deleted successfully.';
    }

    public function remove_session_message()
    {

        session()->forget('message');
    }

    public function remove_session_error()
    {

        session()->forget('error');

        $this->dispatch('alert-manager');
    }

    public function confirm_window($action, $id = null, $message = "Are You Sure?", $type = 'warning', $title = "Confirmation")
    {

        $this->confirmation_alert = [
            'active' => true,
            'type' => $type,
            'message' => $message,
            'action' => $action,
            'id' => $id,
            'title' => $title
        ];

        session()->flash('confirmation_alert', [
            'type' => $type,
            'message' => $message,
            'action' => $action,
            'title' => $title
        ]);
    }

    public function clear_confirmation_alert()
    {

        $this->confirmation_alert = [
            'active' => false,
            'type' => 'warning',
            'message' => 'Are You Sure?',
            'action' => '',
            'id' => '',
            'title' => 'Confirmation'
        ];
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


    public function editTestimonial($id)
    {

        $editable_testimonials_db = DB::select("SELECT * FROM testimonials_section WHERE id = ?", [$id]);

        if ($editable_testimonials_db) {

            $this->editable_testimonials_id = $editable_testimonials_db[0]->id;

            $this->name = $editable_testimonials_db[0]->name;
            $this->profession = $editable_testimonials_db[0]->profession;
            $this->temporary_image_testimonials = $editable_testimonials_db[0]->profile_image;
            $this->quote = $editable_testimonials_db[0]->quote;

            $this->dispatch('editable-testimonials-area');
        }
    }



    public function cancel_collaboration_item_update(){
        $this->editable_testimonials_id = null;

        $this->name = "";
        $this->profession = "";
        $this->temporary_image_testimonials = "";
        $this->profile_image = "";
        $this->quote = "";

        $this->dispatch('refresh-blog-area');
        $this->dispatch('refresh-image-area');
    }


    public function moveItemUp($id){

        // $upItem = DB::select("SELECT * FROM portfolio_items WHERE id < ? ORDER BY id DESC LIMIT 1", [$id]);
        $upItem = DB::select("SELECT * FROM testimonials_section WHERE id < ? ORDER BY id DESC LIMIT 1", [$id]);

        // $currentItem = DB::select("SELECT * FROM portfolio_items WHERE id = ?", [$id]);
        $currentItem = DB::select("SELECT * FROM testimonials_section WHERE id = ?", [$id]);

        if(!$upItem){
            $this->form_completion_message = "The Card is already at the top of the list.";
            return;
        }

        DB::table('testimonials_section')->where('id', $currentItem[0]->id)->update([
            ...(array) $upItem[0],
            'id' => $currentItem[0]->id
        ]);

        DB::table('testimonials_section')->where('id', $upItem[0]->id)->update([
            ...(array) $currentItem[0],
            'id' => $upItem[0]->id
        ]);

        $this->form_completion_message = "The Card has been moved up.";

        $testimonials_db = DB::select("SELECT * FROM testimonials_section");

        $this->items_array = array_map(function ($item) {
            return [
                'name' => $item->name,
                'profession' => $item->profession,
                'profile_image' => $item->profile_image,
                'id' => $item->id,
                'quote' => $item->quote
            ];
        }, $testimonials_db);


    }

    public function moveItemDown($id){

        // $downItem = DB::select("SELECT * FROM portfolio_items WHERE id > ? ORDER BY id ASC LIMIT 1", [$id]);
        $downItem = DB::select("SELECT * FROM testimonials_section WHERE id > ? ORDER BY id ASC LIMIT 1", [$id]);

        // $currentItem = DB::select("SELECT * FROM portfolio_items WHERE id = ?", [$id]);
        $currentItem = DB::select("SELECT * FROM testimonials_section WHERE id = ?", [$id]);

        if(!$downItem){
            $this->form_completion_message = "The Card is already at the bottom of the list.";
            return;
        }

        DB::table('testimonials_section')->where('id', $currentItem[0]->id)->update([
            ...(array) $downItem[0],
            'id' => $currentItem[0]->id
        ]);

        DB::table('testimonials_section')->where('id', $downItem[0]->id)->update([
            ...(array) $currentItem[0],
            'id' => $downItem[0]->id
        ]);

        $this->form_completion_message = "The Card has been moved down.";

        $testimonials_db = DB::select("SELECT * FROM testimonials_section");

        $this->items_array = array_map(function ($item) {
            return [
                'name' => $item->name,
                'profession' => $item->profession,
                'profile_image' => $item->profile_image,
                'id' => $item->id,
                'quote' => $item->quote
            ];
        }, $testimonials_db);

    }



    public function render()
    {
        return view('livewire.admin-testimonials-section-management');
    }
}
