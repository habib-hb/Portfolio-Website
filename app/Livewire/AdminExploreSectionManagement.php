<?php

namespace App\Livewire;

use App\Models\available_schedules;
use App\Models\booked_appointments;
use App\Models\booked_patient_details;
use App\Models\holidays;
use DateTime;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class AdminExploreSectionManagement extends Component
{
    use WithFileUploads;

    public $item_image;

    public $option_image;

    public $temporary_image_item;

    public $temporary_image_option;

    public $option;

    public $item_title;

    public $option_title;

    public $blog_area;

    public $site_link;

    public $options_array = [];

    public $items_array = [];

    public $select_options_selected = false;

    public $created_options_selected = false;

    public $created_items_selected = false;

    public $confirmation_action;

    public $confirmation_alert = [
        'active' => false,
        'type' => 'warning',
        'message' => 'Are You Sure?',
        'action' => '',
        'id' => '',
        'title' => 'Confirmation'
    ];

    public function mount()
    {

        $options_db = DB::select("SELECT * FROM explore_options");

        $this->options_array = array_map(function ($item) {
            return ['id' => $item->id, 'option' => $item->option, 'image_link' => $item->image_link];
        }, $options_db);

        $items_db = DB::select("SELECT
                    explore_items.*,
                    explore_options.*,
                    explore_items.image_link AS item_image,
                    explore_options.image_link AS option_image,
                    explore_items.id AS item_id,
                    explore_options.id AS option_id
                    FROM explore_items
                    LEFT JOIN explore_options ON explore_items.option_id = explore_options.id
                    ORDER BY explore_items.option_id;");

        $this->items_array = array_map(function ($item) {
            return [
                'option_title' => $item->option,
                'item_title' => $item->item_title,
                'image_link' => $item->item_image,
                'item_description' => $item->item_description,
                'site_link' => $item->site_link,
                'id' => $item->item_id
            ];
        }, $items_db);
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
        // $this->validate([
        //     'item_image' => 'image|max:1024', // Image validation (1MB max)
        // ]);
        if ($this->option && $this->item_title && $this->blog_area && $this->temporary_image_item && $this->site_link) {
            DB::insert("INSERT INTO explore_items (option_id, item_title , image_link , item_description , site_link) VALUES (?, ?, ?, ? , ?)", [$this->option, $this->item_title, $this->temporary_image_item, $this->blog_area , $this->site_link]);


            $items_db = DB::select("SELECT
            explore_items.*,
            explore_options.*,
            explore_items.image_link AS item_image,
            explore_options.image_link AS option_image,
            explore_items.id AS item_id,
            explore_options.id AS option_id
            FROM explore_items
            LEFT JOIN explore_options ON explore_items.option_id = explore_options.id
            ORDER BY explore_items.option_id;");

            $this->items_array = array_map(function ($item) {
                return [
                    'option_title' => $item->option,
                    'item_title' => $item->item_title,
                    'image_link' => $item->item_image,
                    'item_description' => $item->item_description,
                    'site_link' => $item->site_link,
                    'id' => $item->item_id
                ];
            }, $items_db);


            $this->option = "";
            $this->item_title = "";
            $this->blog_area = "";
            $this->temporary_image_item = "";
            $this->item_image = "";
            $this->site_link = "";

            $this->dispatch('alert-manager');
            session()->flash('message', 'Item added successfully.');
        } else {
            session()->flash('error', 'Please fill all the fields.');
            $this->dispatch('alert-manager');
        }

        // dd([
        //     'option' => $this->option,
        //     'title' => $this->title,
        //     'blog_area' => $this->blog_area,
        //     'temporary_image' => $this->temporary_image,
        //     'options_array' => $this->options_array
        // ]);
    }

    public function save_option()
    {

        if ($this->option_title && $this->temporary_image_option) {
            DB::insert("INSERT INTO explore_options (option, image_link) VALUES (?, ?)", [$this->option_title, $this->temporary_image_option]);

            $options_db = DB::select("SELECT * FROM explore_options");

            $this->options_array = array_map(function ($option) {
                return ['id' => $option->id, 'option' => $option->option , 'image_link' => $option->image_link];
            }, $options_db);

            $this->option_title = "";

            $this->temporary_image_option = "";

            $this->option_image = "";

            session()->flash('message', 'Option added successfully.');
        } else {
            session()->flash('error', 'Please fill all the fields.');
            $this->dispatch('alert-manager');
        }
    }

    public function updated($property)
    {
        if ($property === 'item_image') {
            $imagePath = $this->item_image->store('temp_item_images', 'public');

            //Full Link
            $imagePath = asset('storage/' . $imagePath);

            $this->temporary_image_item = $imagePath;
        }

        if ($property === 'option_image') {
            $imagePath = $this->option_image->store('temp_option_images', 'public');

            //Full Link
            $imagePath = asset('storage/' . $imagePath);

            $this->temporary_image_option = $imagePath;
        }
    }

    #[On('updateTextarea')]
    public function updateTextarea($text)
    {
        $this->blog_area = $text;
    }

    public function selectAddOptions()
    {
        if ($this->select_options_selected) {
            $this->select_options_selected = false;
        } else {
            $this->select_options_selected = true;
        }
    }

    public function created_options()
    {

        if ($this->created_options_selected) {
            $this->created_options_selected = false;
        } else {
            $this->created_options_selected = true;
        }
    }


    public function deleteOption($id)
    {

        $exists_record = DB::table('explore_items')->where('option_id', $id)->exists();

        if ($exists_record) {

            $this->clear_confirmation_alert();

            session()->flash('error', 'Please delete the items first before deleting the option.');

            return;
        }

        DB::table('explore_options')->where('id', $id)->delete();

        $this->clear_confirmation_alert();

        $options_db = DB::select("SELECT * FROM explore_options");

        $this->options_array = array_map(function ($item) {
            return ['id' => $item->id, 'option' => $item->option, 'image_link' => $item->image_link];
        }, $options_db);

        session()->flash('message', 'Option deleted successfully.');
    }

    public function created_items()
    {

        if ($this->created_items_selected) {
            $this->created_items_selected = false;
        } else {
            $this->created_items_selected = true;
        }
    }

    public function deleteItem($id)
    {

        DB::table('explore_items')->where('id', $id)->delete();

        $this->clear_confirmation_alert();

        $items_db = DB::select("SELECT
                    explore_items.*,
                    explore_options.*,
                    explore_items.image_link AS item_image,
                    explore_options.image_link AS option_image,
                    explore_items.id AS item_id,
                    explore_options.id AS option_id
                    FROM explore_items
                    LEFT JOIN explore_options ON explore_items.option_id = explore_options.id
                    ORDER BY explore_items.option_id;");

        $this->items_array = array_map(function ($item) {
            return [
                'option_title' => $item->option,
                'item_title' => $item->item_title,
                'image_link' => $item->item_image,
                'item_description' => $item->item_description,
                'site_link' => $item->site_link,
                'id' => $item->item_id
            ];
        }, $items_db);

        session()->flash('message', 'Item deleted successfully.');
    }

    public function remove_session_message(){

        session()->forget('message');

    }

    public function remove_session_error(){

        session()->forget('error');

        $this->dispatch('alert-manager');

    }

    public function confirm_window($action , $id=null , $message="Are You Sure?" , $type = 'warning', $title="Confirmation"){

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
            'action' => $this->confirmation_action,
            'title' => $title
        ]);
    }

    public function clear_confirmation_alert(){

        $this->confirmation_alert = [
            'active' => false,
            'type' => 'warning',
            'message' => 'Are You Sure?',
            'action' => '',
            'id' => '',
            'title' => 'Confirmation'
        ];

    }




    public function render()
    {
        return view('livewire.admin-explore-section-management');
    }
}
