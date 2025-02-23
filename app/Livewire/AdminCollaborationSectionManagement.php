<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class AdminCollaborationSectionManagement extends Component
{
    use WithFileUploads;

    // Collaboration Section
    public $name;

    public $profession;

    public $temporary_image_collaboration;

    public $profile_image;

    public $created_collaborations_selected = false;

    public $editable_collaboration_id;

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

        $collaborations_db = DB::select("SELECT * FROM collaboration_section");

        $this->items_array = array_map(function ($item) {
            return [
                'name' => $item->name,
                'profession' => $item->profession,
                'profile_image' => $item->profile_image,
                'id' => $item->id
            ];
        }, $collaborations_db);
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



    public function save_item()
    {

        if ($this->editable_collaboration_id) {
            if ($this->name && $this->profession && $this->temporary_image_collaboration) {
                DB::table('collaboration_section')->where('id', $this->editable_collaboration_id)->update([
                    'name' => $this->name,
                    'profession' => $this->profession,
                    'profile_image' => $this->temporary_image_collaboration
                ]);

                $collaborations_db = DB::select("SELECT * FROM collaboration_section");

                $this->items_array = array_map(function ($item) {
                    return [
                        'name' => $item->name,
                        'profession' => $item->profession,
                        'profile_image' => $item->profile_image,
                        'id' => $item->id
                    ];
                }, $collaborations_db);

                $this->editable_collaboration_id = null;

                $this->name = null;

                $this->profession = null;

                $this->temporary_image_collaboration = null;

                $this->profile_image = null;

                $this->form_completion_message = 'Collaboration Card Updated Successfully';

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
        if ($this->name && $this->profession && $this->temporary_image_collaboration) {
            DB::table('collaboration_section')->insert([
                'name' => $this->name,
                'profession' => $this->profession,
                'profile_image' => $this->temporary_image_collaboration
            ]);


            $collaborations_db = DB::select("SELECT * FROM collaboration_section");

            $this->items_array = array_map(function ($item) {
                return [
                    'name' => $item->name,
                    'profession' => $item->profession,
                    'profile_image' => $item->profile_image,
                    'id' => $item->id
                ];
            }, $collaborations_db);


            $this->name = "";
            $this->profession = "";
            $this->temporary_image_collaboration = "";
            $this->profile_image = "";

            $this->dispatch('alert-manager');
            $this->form_completion_message = "Collaboration Card Added Successfully.";
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

            $this->temporary_image_collaboration = $imagePath;

            $this->resetErrorBag('profile_image');
        }
    }




    public function created_collaborations()
    {

        if ($this->created_collaborations_selected) {
            $this->created_collaborations_selected = false;
        } else {
            $this->created_collaborations_selected = true;
        }
    }

    public function deleteCollaboration($id)
    {

        DB::table('collaboration_section')->where('id', $id)->delete();

        $this->clear_confirmation_alert();

        $collaborations_db = DB::select("SELECT * FROM collaboration_section");

        $this->items_array = array_map(function ($item) {
            return [
                'name' => $item->name,
                'profession' => $item->profession,
                'profile_image' => $item->profile_image,
                'id' => $item->id
            ];
        }, $collaborations_db);

        $this->form_completion_message = 'Collaboration Card deleted successfully.';
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


    public function editCollaboration($id)
    {

        $editable_collaboration_db = DB::select("SELECT * FROM collaboration_section WHERE id = ?", [$id]);

        if ($editable_collaboration_db) {

            $this->editable_collaboration_id = $editable_collaboration_db[0]->id;

            $this->name = $editable_collaboration_db[0]->name;
            $this->profession = $editable_collaboration_db[0]->profession;
            $this->temporary_image_collaboration = $editable_collaboration_db[0]->profile_image;

            $this->dispatch('editable-collaboration-area');
        }
    }



    public function cancel_collaboration_item_update(){
        $this->editable_collaboration_id = null;

        $this->name = "";
        $this->profession = "";
        $this->temporary_image_collaboration = "";
        $this->profile_image = "";

        $this->dispatch('refresh-blog-area');
        $this->dispatch('refresh-image-area');
    }


    public function moveItemUp($id){

        // $upItem = DB::select("SELECT * FROM portfolio_items WHERE id < ? ORDER BY id DESC LIMIT 1", [$id]);
        $upItem = DB::select("SELECT * FROM collaboration_section WHERE id < ? ORDER BY id DESC LIMIT 1", [$id]);

        // $currentItem = DB::select("SELECT * FROM portfolio_items WHERE id = ?", [$id]);
        $currentItem = DB::select("SELECT * FROM collaboration_section WHERE id = ?", [$id]);

        if(!$upItem){
            $this->form_completion_message = "The Card is already at the top of the list.";
            return;
        }

        DB::table('collaboration_section')->where('id', $currentItem[0]->id)->update([
            ...(array) $upItem[0],
            'id' => $currentItem[0]->id
        ]);

        DB::table('collaboration_section')->where('id', $upItem[0]->id)->update([
            ...(array) $currentItem[0],
            'id' => $upItem[0]->id
        ]);

        $this->form_completion_message = "The Card has been moved up.";

        $collaborations_db = DB::select("SELECT * FROM collaboration_section");

        $this->items_array = array_map(function ($item) {
            return [
                'name' => $item->name,
                'profession' => $item->profession,
                'profile_image' => $item->profile_image,
                'id' => $item->id
            ];
        }, $collaborations_db);


    }

    public function moveItemDown($id){

        // $downItem = DB::select("SELECT * FROM portfolio_items WHERE id > ? ORDER BY id ASC LIMIT 1", [$id]);
        $downItem = DB::select("SELECT * FROM collaboration_section WHERE id > ? ORDER BY id ASC LIMIT 1", [$id]);

        // $currentItem = DB::select("SELECT * FROM portfolio_items WHERE id = ?", [$id]);
        $currentItem = DB::select("SELECT * FROM collaboration_section WHERE id = ?", [$id]);

        if(!$downItem){
            $this->form_completion_message = "The Card is already at the bottom of the list.";
            return;
        }

        DB::table('collaboration_section')->where('id', $currentItem[0]->id)->update([
            ...(array) $downItem[0],
            'id' => $currentItem[0]->id
        ]);

        DB::table('collaboration_section')->where('id', $downItem[0]->id)->update([
            ...(array) $currentItem[0],
            'id' => $downItem[0]->id
        ]);

        $this->form_completion_message = "The Card has been moved down.";

        $collaborations_db = DB::select("SELECT * FROM collaboration_section");

        $this->items_array = array_map(function ($item) {
            return [
                'name' => $item->name,
                'profession' => $item->profession,
                'profile_image' => $item->profile_image,
                'id' => $item->id
            ];
        }, $collaborations_db);

    }



    public function render()
    {
        return view('livewire.admin-collaboration-section-management');
    }
}
