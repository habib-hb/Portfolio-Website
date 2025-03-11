<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class AdminSkillsSectionManagement extends Component
{
    use WithFileUploads;

    // Skills Section
    public $name;

    public $profession;

    public $temporary_image_skill;

    public $skill_title;

    public $skill_icon;

    public $created_skills_selected = false;

    public $editable_skill_id;

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

        $skills_db = DB::select("SELECT * FROM skills_section");

        $this->items_array = array_map(function ($item) {
            return [
                'skill_title' => $item->skill_title,
                'skill_icon' => $item->skill_icon,
                'id' => $item->id
            ];
        }, $skills_db);
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

        if ($this->editable_skill_id) {
            if ($this->skill_title && $this->temporary_image_skill) {
                DB::table('skills_section')->where('id', $this->editable_skill_id)->update([
                    'skill_title' => $this->skill_title,
                    'skill_icon' => $this->temporary_image_skill
                ]);

                $skills_db = DB::select("SELECT * FROM skills_section");

                $this->items_array = array_map(function ($item) {
                    return [
                        'skill_title' => $item->skill_title,
                        'skill_icon' => $item->skill_icon,
                        'id' => $item->id
                    ];
                }, $skills_db);

                $this->editable_skill_id = null;

                $this->skill_title = null;

                $this->skill_icon = null;

                $this->temporary_image_skill = null;

                $this->form_completion_message = 'Skill Updated Successfully';

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
        if ($this->skill_title && $this->temporary_image_skill) {
            DB::table('skills_section')->insert([
                'skill_title' => $this->skill_title,
                'skill_icon' => $this->temporary_image_skill,
            ]);


            $skills_db = DB::select("SELECT * FROM skills_section");

            $this->items_array = array_map(function ($item) {
                return [
                    'skill_title' => $item->skill_title,
                    'skill_icon' => $item->skill_icon,
                    'id' => $item->id
                ];
            }, $skills_db);


            $this->skill_title = null;
            $this->skill_icon = null;
            $this->temporary_image_skill = null;

            $this->dispatch('alert-manager');
            $this->form_completion_message = "Skill Added Successfully.";
            $this->dispatch('refresh-blog-area');
            $this->dispatch('refresh-image-area');
        } else {
            $this->form_error_message = "All fields are required.";
            $this->dispatch('alert-manager');
        }
    }



    public function updated($property)
    {
        if ($property === 'skill_icon') {
            $imagePath = $this->skill_icon->store('temp_skill_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_skill = $imagePath;

            $this->resetErrorBag('skill_icon');
        }
    }




    public function created_skills()
    {

        if ($this->created_skills_selected) {
            $this->created_skills_selected = false;
        } else {
            $this->created_skills_selected = true;
        }
    }

    public function deleteSkill($id)
    {

        DB::table('skills_section')->where('id', $id)->delete();

        $this->clear_confirmation_alert();

        $skills_db = DB::select("SELECT * FROM skills_section");

        $this->items_array = array_map(function ($item) {
            return [
                'skill_title' => $item->skill_title,
                'skill_icon' => $item->skill_icon,
                'id' => $item->id
            ];
        }, $skills_db);

        $this->form_completion_message = 'Skill deleted successfully.';
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


    public function editSkill($id)
    {

        $editable_skill_db = DB::select("SELECT * FROM skills_section WHERE id = ?", [$id]);

        if ($editable_skill_db) {

            $this->editable_skill_id = $editable_skill_db[0]->id;

            $this->skill_title = $editable_skill_db[0]->skill_title;
            $this->temporary_image_skill = $editable_skill_db[0]->skill_icon;

            $this->dispatch('editable-skill-area');
        }
    }



    public function cancel_skill_item_update(){
        $this->editable_skill_id = null;

        $this->skill_title = "";
        $this->temporary_image_skill = "";

        $this->dispatch('refresh-blog-area');
        $this->dispatch('refresh-image-area');
    }


    public function moveItemUp($id){

        // $upItem = DB::select("SELECT * FROM portfolio_items WHERE id < ? ORDER BY id DESC LIMIT 1", [$id]);
        $upItem = DB::select("SELECT * FROM skills_section WHERE id < ? ORDER BY id DESC LIMIT 1", [$id]);

        // $currentItem = DB::select("SELECT * FROM portfolio_items WHERE id = ?", [$id]);
        $currentItem = DB::select("SELECT * FROM skills_section WHERE id = ?", [$id]);

        if(!$upItem){
            $this->form_completion_message = "The Skill is already at the top of the list.";
            return;
        }

        DB::table('skills_section')->where('id', $currentItem[0]->id)->update([
            ...(array) $upItem[0],
            'id' => $currentItem[0]->id
        ]);

        DB::table('skills_section')->where('id', $upItem[0]->id)->update([
            ...(array) $currentItem[0],
            'id' => $upItem[0]->id
        ]);

        $this->form_completion_message = "The Skill has been moved up.";

        $skills_db = DB::select("SELECT * FROM skills_section");

        $this->items_array = array_map(function ($item) {
            return [
                'skill_title' => $item->skill_title,
                'skill_icon' => $item->skill_icon,
                'id' => $item->id
            ];
        }, $skills_db);


    }

    public function moveItemDown($id){

        // $downItem = DB::select("SELECT * FROM portfolio_items WHERE id > ? ORDER BY id ASC LIMIT 1", [$id]);
        $downItem = DB::select("SELECT * FROM skills_section WHERE id > ? ORDER BY id ASC LIMIT 1", [$id]);

        // $currentItem = DB::select("SELECT * FROM portfolio_items WHERE id = ?", [$id]);
        $currentItem = DB::select("SELECT * FROM skills_section WHERE id = ?", [$id]);

        if(!$downItem){
            $this->form_completion_message = "The Skill is already at the bottom of the list.";
            return;
        }

        DB::table('skills_section')->where('id', $currentItem[0]->id)->update([
            ...(array) $downItem[0],
            'id' => $currentItem[0]->id
        ]);

        DB::table('skills_section')->where('id', $downItem[0]->id)->update([
            ...(array) $currentItem[0],
            'id' => $downItem[0]->id
        ]);

        $this->form_completion_message = "The Skill has been moved down.";

        $skills_db = DB::select("SELECT * FROM skills_section");

        $this->items_array = array_map(function ($item) {
            return [
                'skill_title' => $item->skill_title,
                'skill_icon' => $item->skill_icon,
                'id' => $item->id
            ];
        }, $skills_db);

    }



    public function render()
    {
        return view('livewire.admin-skills-section-management');
    }
}
