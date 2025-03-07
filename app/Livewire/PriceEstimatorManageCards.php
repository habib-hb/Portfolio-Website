<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class PriceEstimatorManageCards extends Component
{
    use WithFileUploads;

    public $item_image;

    public $option_image;

    public $temporary_image_estimation_card;

    public $temporary_image_option;

    public $option;

    public $item_title;

    public $option_title;

    public $blog_area;

    public $site_link;

    public $github_link;

    public $options_array = [];

    public $items_array = [];

    public $select_options_selected = false;

    public $created_options_selected = false;

    public $created_portfolios_selected = false;

    public $confirmation_action;

    public $technologies_used;

    public $confirmation_alert = [
        'active' => false,
        'type' => 'warning',
        'message' => 'Are You Sure?',
        'action' => '',
        'id' => '',
        'title' => 'Confirmation'
    ];

    public $form_error_message;

    public $form_completion_message;

    public $editable_estimator_card_id;

    public function mount()
    {

        $estimation_cards_db = DB::select("SELECT * FROM price_estimation");

        $this->items_array = array_map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'icon_link' => $item->icon_link
            ];
        }, $estimation_cards_db);
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

        // Checking for update command
        if ($this->editable_estimator_card_id) {
            if ($this->item_title && $this->blog_area && $this->temporary_image_estimation_card) {

                DB::table('price_estimation')->where('id', $this->editable_estimator_card_id)->update([
                    'title' => $this->item_title,
                    'description' => $this->blog_area,
                    'icon_link' => $this->temporary_image_estimation_card
                ]);

                $estimation_cards_db = DB::select("SELECT * FROM price_estimation");

                $this->items_array = array_map(function ($item) {
                    return [
                        'id' => $item->id,
                        'title' => $item->title,
                        'description' => $item->description,
                        'icon_link' => $item->icon_link
                    ];
                }, $estimation_cards_db);

                $this->editable_estimator_card_id = null;

                $this->item_title = "";
                $this->blog_area = "";
                $this->temporary_image_estimation_card = "";

                $this->dispatch('alert-manager');
                $this->form_completion_message = "Estimation Card Updated Successfully.";
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
        // if ($this->option && $this->item_title && $this->blog_area && $this->temporary_image_estimation_card && $this->site_link) {
        if ($this->item_title && $this->blog_area && $this->temporary_image_estimation_card) {
            DB::insert("INSERT INTO price_estimation (title , description , icon_link ) VALUES (?, ?, ?)", [$this->item_title, $this->blog_area, $this->temporary_image_estimation_card]);


            $estimation_cards_db = DB::select("SELECT * FROM price_estimation");

            $this->items_array = array_map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'icon_link' => $item->icon_link
                ];
            }, $estimation_cards_db);


            $this->item_title = "";
            $this->blog_area = "";
            $this->temporary_image_estimation_card = "";

            $this->dispatch('alert-manager');
            $this->form_completion_message = "Estimation Card Added Successfully.";
            $this->dispatch('refresh-blog-area');
            $this->dispatch('refresh-image-area');
        } else {
            $this->form_error_message = "All fields are required.";
            $this->dispatch('alert-manager');
        }
    }



    public function updated($property)
    {
        if ($property === 'item_image') {
            $imagePath = $this->item_image->store('temp_item_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_estimation_card = $imagePath;

            $this->resetErrorBag('item_image');
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



    public function created_portfolios()
    {

        if ($this->created_portfolios_selected) {
            $this->created_portfolios_selected = false;
        } else {
            $this->created_portfolios_selected = true;
        }
    }

    public function deleteEstimation($id)
    {
        $record = DB::table('price_estimation')->where('id', $id)->first();

        if ($record && $record->items_array) {
            $this->clear_confirmation_alert();
            $this->form_error_message = 'Please delete the options first before deleting the option.';
            return;
        }

        DB::table('price_estimation')->where('id', $id)->delete();

        $this->clear_confirmation_alert();

        $estimation_cards_db = DB::select("SELECT * FROM price_estimation");

        $this->items_array = array_map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'icon_link' => $item->icon_link
            ];
        }, $estimation_cards_db);

        $this->form_completion_message = 'Estimation Card deleted successfully.';
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



    public function moveItemUp($id){

        $upItem = DB::select("SELECT * FROM price_estimation WHERE id < ? ORDER BY id DESC LIMIT 1", [$id]);

        $currentItem = DB::select("SELECT * FROM price_estimation WHERE id = ?", [$id]);

        if(!$upItem){
            $this->form_completion_message = "The Item is already at the top of the list.";
            return;
        }

        DB::table('price_estimation')->where('id', $currentItem[0]->id)->update([
            ...(array) $upItem[0],
            'id' => $currentItem[0]->id
        ]);

        DB::table('price_estimation')->where('id', $upItem[0]->id)->update([
            ...(array) $currentItem[0],
            'id' => $upItem[0]->id
        ]);

        $this->form_completion_message = "The Item has been moved up.";

        $estimation_cards_db = DB::select("SELECT * FROM price_estimation");

        $this->items_array = array_map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'icon_link' => $item->icon_link
            ];
        }, $estimation_cards_db);


    }

    public function moveItemDown($id){

        $downItem = DB::select("SELECT * FROM price_estimation WHERE id > ? ORDER BY id ASC LIMIT 1", [$id]);

        $currentItem = DB::select("SELECT * FROM price_estimation WHERE id = ?", [$id]);

        if(!$downItem){
            $this->form_completion_message = "The Item is already at the bottom of the list.";
            return;
        }

        DB::table('price_estimation')->where('id', $currentItem[0]->id)->update([
            ...(array) $downItem[0],
            'id' => $currentItem[0]->id
        ]);

        DB::table('price_estimation')->where('id', $downItem[0]->id)->update([
            ...(array) $currentItem[0],
            'id' => $downItem[0]->id
        ]);

        $this->form_completion_message = "The Item has been moved down.";

        $estimation_cards_db = DB::select("SELECT * FROM price_estimation");

        $this->items_array = array_map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'icon_link' => $item->icon_link
            ];
        }, $estimation_cards_db);

    }



    public function editEstimatorCard($id)
    {

        $editable_estimator_card_db = DB::select("SELECT * FROM price_estimation WHERE id = ?", [$id]);

        if ($editable_estimator_card_db) {

            $this->blog_area = $editable_estimator_card_db[0]->description;
            $this->temporary_image_estimation_card = $editable_estimator_card_db[0]->icon_link;
            $this->item_title = $editable_estimator_card_db[0]->title;

            $this->editable_estimator_card_id = $editable_estimator_card_db[0]->id;

            $this->dispatch('editable-estimator-card-area', estimator_data: $this->blog_area);
        }
    }


    public function cancel_edit(){
        $this->editable_estimator_card_id = null;

        $this->item_title = "";
        $this->blog_area = "";
        $this->temporary_image_estimation_card = "";

        $this->dispatch('alert-manager');
        $this->dispatch('refresh-blog-area');
        $this->dispatch('refresh-image-area');
    }



    public function render()
    {
        return view('livewire.price-estimator-manage-cards');
    }
}
