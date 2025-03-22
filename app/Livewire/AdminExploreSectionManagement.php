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
use Illuminate\Support\Facades\Storage;

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

    public $form_error_message;

    public $form_completion_message;

    public $editable_item_id;

    public $editable_option_id;

    public $theme_mode;

    public $item_image_edited = false;

    public $searchtext;

    public $search_output = [];

    public $search_output_length;

    public $no_search_results_found_show = false;

    public function mount()
    {

        if (!session('theme_mode')) {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);
        } else {

            $this->theme_mode = session('theme_mode');
        }

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

        // Cheking if it's an update command
        if ($this->editable_item_id) {

            if ($this->option && $this->item_title && $this->blog_area && $this->temporary_image_item && $this->site_link) {

                // Deleting the old image conditionally
                if ($this->item_image_edited) {
                    $old_image_data = DB::table('explore_items')->where('id', $this->editable_item_id)->first();
                    $old_image_path = str_replace('/storage/', '', $old_image_data->image_link);
                    if (Storage::disk('public')->exists($old_image_path)) {
                        Storage::disk('public')->delete($old_image_path);
                    }
                    $this->item_image_edited = false;
                }

                DB::table('explore_items')->where('id', $this->editable_item_id)->update([
                    'option_id' => $this->option,
                    'item_title' => $this->item_title,
                    'image_link' => $this->temporary_image_item,
                    'item_description' => $this->blog_area,
                    'site_link' => $this->site_link,
                ]);

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


                $this->editable_item_id = null;
                $this->option = "";
                $this->item_title = "";
                $this->blog_area = "";
                $this->temporary_image_item = "";
                $this->item_image = "";
                $this->site_link = "";

                $this->form_completion_message = 'Item Updated Successfully';

                $this->resetErrorBag('blog_image');
                $this->dispatch('refresh-blog-area');
                $this->dispatch('refresh-image-area');

                $this->dispatch('alert-manager');



                if (!empty($this->searchtext)) {


                    $this->searchtext = e($this->searchtext);
        
                    $this->no_search_results_found_show = false;
        
        
                    $search_output_db = DB::select("SELECT
                    explore_items.*,
                    explore_options.*,
                    explore_items.image_link AS item_image,
                    explore_options.image_link AS option_image,
                    explore_items.id AS item_id,
                    explore_options.id AS option_id
                    FROM explore_items
                    LEFT JOIN explore_options ON explore_items.option_id = explore_options.id
                    WHERE explore_items.item_title LIKE ?
                    ORDER BY explore_items.option_id
                    LIMIT 5;", ['%' . $this->searchtext . '%']);
        
                    $this->search_output = array_map(function ($item) {
                        return [
                            'option_title' => $item->option,
                            'item_title' => $item->item_title,
                            'image_link' => $item->item_image,
                            'item_description' => $item->item_description,
                            'site_link' => $item->site_link,
                            'id' => $item->item_id
                        ];
                    }, $search_output_db);
        
                    $this->search_output_length = count($this->search_output);
        
                    if ($this->search_output_length == 0) {
        
                        // $this->dispatch('no_results_found');
                        $this->no_search_results_found_show = true;
                    }
        
        
                    // $this->search_input_field_is_active = true;
        
                    // session(['search_input_field_is_active' => $this->search_input_field_is_active]);
                }

                return;
            } else {

                $this->form_error_message = 'Please fill all the fields correctly';
            }
        }

        // $this->validate([
        //     'item_image' => 'image|max:1024', // Image validation (1MB max)
        // ]);
        if ($this->option && $this->item_title && $this->blog_area && $this->temporary_image_item && $this->site_link) {
            DB::insert("INSERT INTO explore_items (option_id, item_title , image_link , item_description , site_link) VALUES (?, ?, ?, ? , ?)", [$this->option, $this->item_title, $this->temporary_image_item, $this->blog_area, $this->site_link]);

            $this->item_image_edited = false;


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

            $this->form_completion_message = 'Item Created Successfully';

            $this->resetErrorBag('blog_image');
            $this->dispatch('refresh-blog-area');
            $this->dispatch('refresh-image-area-item');
            $this->dispatch('refresh-image-area-option');

            $this->dispatch('alert-manager');
            // session()->flash('message', 'Item added successfully.');
            // $this->dispatch('refresh-trigger');


            if (!empty($this->searchtext)) {


                $this->searchtext = e($this->searchtext);
    
                $this->no_search_results_found_show = false;
    
    
                $search_output_db = DB::select("SELECT
                explore_items.*,
                explore_options.*,
                explore_items.image_link AS item_image,
                explore_options.image_link AS option_image,
                explore_items.id AS item_id,
                explore_options.id AS option_id
                FROM explore_items
                LEFT JOIN explore_options ON explore_items.option_id = explore_options.id
                WHERE explore_items.item_title LIKE ?
                ORDER BY explore_items.option_id
                LIMIT 5;", ['%' . $this->searchtext . '%']);
    
                $this->search_output = array_map(function ($item) {
                    return [
                        'option_title' => $item->option,
                        'item_title' => $item->item_title,
                        'image_link' => $item->item_image,
                        'item_description' => $item->item_description,
                        'site_link' => $item->site_link,
                        'id' => $item->item_id
                    ];
                }, $search_output_db);
    
                $this->search_output_length = count($this->search_output);
    
                if ($this->search_output_length == 0) {
    
                    // $this->dispatch('no_results_found');
                    $this->no_search_results_found_show = true;
                }
    
    
                // $this->search_input_field_is_active = true;
    
                // session(['search_input_field_is_active' => $this->search_input_field_is_active]);
            }

        } else {
            $this->form_error_message = 'Please fill all the fields correctly';

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
        // Checking if it's an update command
        if ($this->editable_option_id) {
            if ($this->option_title && $this->temporary_image_option) {
                DB::table('explore_options')->where('id', $this->editable_option_id)->update([
                    'option' => $this->option_title,
                    'image_link' => $this->temporary_image_option
                ]);

                $options_db = DB::select("SELECT * FROM explore_options");

                $this->options_array = array_map(function ($option) {
                    return ['id' => $option->id, 'option' => $option->option, 'image_link' => $option->image_link];
                }, $options_db);

                $this->editable_option_id = null;
                $this->option_title = "";
                $this->temporary_image_option = "";
                $this->option_image = "";

                $this->select_options_selected = null;

                $this->form_completion_message = 'Option Updated Successfully';


                if (!empty($this->searchtext)) {


                    $this->searchtext = e($this->searchtext);
        
                    $this->no_search_results_found_show = false;
        
        
                    $search_output_db = DB::select("SELECT
                    explore_items.*,
                    explore_options.*,
                    explore_items.image_link AS item_image,
                    explore_options.image_link AS option_image,
                    explore_items.id AS item_id,
                    explore_options.id AS option_id
                    FROM explore_items
                    LEFT JOIN explore_options ON explore_items.option_id = explore_options.id
                    WHERE explore_items.item_title LIKE ?
                    ORDER BY explore_items.option_id
                    LIMIT 5;", ['%' . $this->searchtext . '%']);
        
                    $this->search_output = array_map(function ($item) {
                        return [
                            'option_title' => $item->option,
                            'item_title' => $item->item_title,
                            'image_link' => $item->item_image,
                            'item_description' => $item->item_description,
                            'site_link' => $item->site_link,
                            'id' => $item->item_id
                        ];
                    }, $search_output_db);
        
                    $this->search_output_length = count($this->search_output);
        
                    if ($this->search_output_length == 0) {
        
                        // $this->dispatch('no_results_found');
                        $this->no_search_results_found_show = true;
                    }
        
        
                    // $this->search_input_field_is_active = true;
        
                    // session(['search_input_field_is_active' => $this->search_input_field_is_active]);
                }

                return;
            } else {

                $this->form_error_message = 'Please fill all the fields correctly';
            }
        }

        if ($this->option_title && $this->temporary_image_option) {
            DB::insert("INSERT INTO explore_options (option, image_link) VALUES (?, ?)", [$this->option_title, $this->temporary_image_option]);

            $options_db = DB::select("SELECT * FROM explore_options");

            $this->options_array = array_map(function ($option) {
                return ['id' => $option->id, 'option' => $option->option, 'image_link' => $option->image_link];
            }, $options_db);

            $this->option_title = "";

            $this->temporary_image_option = "";

            $this->option_image = "";

            $this->form_completion_message = 'Option Created Successfully';
        } else {
            $this->form_error_message = 'Please fill all the fields correctly';
            $this->dispatch('alert-manager');
        }
    }

    public function updated($property)
    {
        if ($property === 'item_image') {
            $imagePath = $this->item_image->store('temp_item_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_item = $imagePath;

            $this->item_image_edited = true;

            $this->resetErrorBag('item_image');
        }

        if ($property === 'option_image') {
            $imagePath = $this->option_image->store('temp_option_images', 'public');

            //Full Link
            $imagePath = '/storage/' . $imagePath;

            $this->temporary_image_option = $imagePath;

            $this->resetErrorBag('option_image');
        }






        if ($property === 'searchtext' && !empty($this->searchtext)) {


            $this->searchtext = e($this->searchtext);

            $this->no_search_results_found_show = false;


            $search_output_db = DB::select("SELECT
            explore_items.*,
            explore_options.*,
            explore_items.image_link AS item_image,
            explore_options.image_link AS option_image,
            explore_items.id AS item_id,
            explore_options.id AS option_id
            FROM explore_items
            LEFT JOIN explore_options ON explore_items.option_id = explore_options.id
            WHERE explore_items.item_title LIKE ?
            ORDER BY explore_items.option_id
            LIMIT 5;", ['%' . $this->searchtext . '%']);

            $this->search_output = array_map(function ($item) {
                return [
                    'option_title' => $item->option,
                    'item_title' => $item->item_title,
                    'image_link' => $item->item_image,
                    'item_description' => $item->item_description,
                    'site_link' => $item->site_link,
                    'id' => $item->item_id
                ];
            }, $search_output_db);

            $this->search_output_length = count($this->search_output);

            if ($this->search_output_length == 0) {

                // $this->dispatch('no_results_found');
                $this->no_search_results_found_show = true;
            }


            // $this->search_input_field_is_active = true;

            // session(['search_input_field_is_active' => $this->search_input_field_is_active]);
        } else {

            $this->search_output = [];
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

            $this->form_error_message = 'Please delete the items first before deleting the option.';

            return;
        }

        DB::table('explore_options')->where('id', $id)->delete();

        $this->clear_confirmation_alert();

        $options_db = DB::select("SELECT * FROM explore_options");

        $this->options_array = array_map(function ($item) {
            return ['id' => $item->id, 'option' => $item->option, 'image_link' => $item->image_link];
        }, $options_db);

        $this->form_completion_message = 'Option deleted successfully.';
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
        // Deleting the old image
        $old_image_data = DB::table('explore_items')->where('id', $id)->first();
        $old_image_path = str_replace('/storage/', '', $old_image_data->image_link);
        if (Storage::disk('public')->exists($old_image_path)) {
            Storage::disk('public')->delete($old_image_path);
        }

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

        $this->form_completion_message = 'Item deleted successfully.';




        if (!empty($this->searchtext)) {


            $this->searchtext = e($this->searchtext);

            $this->no_search_results_found_show = false;


            $search_output_db = DB::select("SELECT
            explore_items.*,
            explore_options.*,
            explore_items.image_link AS item_image,
            explore_options.image_link AS option_image,
            explore_items.id AS item_id,
            explore_options.id AS option_id
            FROM explore_items
            LEFT JOIN explore_options ON explore_items.option_id = explore_options.id
            WHERE explore_items.item_title LIKE ?
            ORDER BY explore_items.option_id
            LIMIT 5;", ['%' . $this->searchtext . '%']);

            $this->search_output = array_map(function ($item) {
                return [
                    'option_title' => $item->option,
                    'item_title' => $item->item_title,
                    'image_link' => $item->item_image,
                    'item_description' => $item->item_description,
                    'site_link' => $item->site_link,
                    'id' => $item->item_id
                ];
            }, $search_output_db);

            $this->search_output_length = count($this->search_output);

            if ($this->search_output_length == 0) {

                // $this->dispatch('no_results_found');
                $this->no_search_results_found_show = true;
            }


            // $this->search_input_field_is_active = true;

            // session(['search_input_field_is_active' => $this->search_input_field_is_active]);
        }
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

        // Resetting it to default
        $this->confirmation_alert = [
            'active' => false,
            'type' => 'warning',
            'message' => 'Are You Sure?',
            'action' => '',
            'id' => '',
            'title' => 'Confirmation'
        ];
    }

    public function editItem($id)
    {

        $editable_item_db = DB::select("SELECT
        explore_items.*,
        explore_options.*,
        explore_items.image_link AS item_image,
        explore_options.image_link AS option_image,
        explore_items.id AS item_id,
        explore_options.id AS option_id
        FROM explore_items
        LEFT JOIN explore_options ON explore_items.option_id = explore_options.id
        WHERE explore_items.id = ?", [$id]);

        if ($editable_item_db) {
            $this->option = $editable_item_db[0]->option_id;
            $this->item_title = $editable_item_db[0]->item_title;
            $this->temporary_image_item = $editable_item_db[0]->item_image;
            $this->site_link = $editable_item_db[0]->site_link;
            $this->blog_area = $editable_item_db[0]->item_description;

            $this->editable_item_id = $editable_item_db[0]->item_id;

            $this->dispatch('editable-item-area', item_data: $this->blog_area);
        }



        // dd($this->option, $this->item_title, $this->temporary_image_item, $this->site_link, $this->blog_area);

    }

    public function editOption($id)
    {

        $editable_option_db = DB::select("SELECT * FROM explore_options WHERE id = ?", [$id]);

        if ($editable_option_db) {
            $this->option_title = $editable_option_db[0]->option;
            $this->temporary_image_option = $editable_option_db[0]->image_link;
            $this->select_options_selected = true;

            $this->editable_option_id = $editable_option_db[0]->id;

            $this->dispatch('editable-option-area');
        }
    }


    public function cancel_update_item()
    {

        $this->editable_item_id = null;
        $this->option = "";
        $this->item_title = "";
        $this->blog_area = "";
        $this->temporary_image_item = "";
        $this->item_image = "";
        $this->site_link = "";


        $this->resetErrorBag('blog_image');
        $this->dispatch('refresh-blog-area');
        $this->dispatch('refresh-image-area');

        $this->dispatch('alert-manager');

        $this->item_image_edited = false;
    }


    public function cancel_update_option()
    {

        $this->editable_option_id = null;
        $this->option_title = "";
        $this->temporary_image_option = "";
        $this->option_image = "";

        $this->select_options_selected = null;

        $this->resetErrorBag('option_image');
    }



    public function moveOptionUp($id)
    {

        try {
            DB::beginTransaction();
            
            $upItem = DB::select("SELECT * FROM explore_options WHERE id < ? ORDER BY id DESC LIMIT 1", [$id]);
            $currentItem = DB::select("SELECT * FROM explore_options WHERE id = ?", [$id]);
            
            if (!$upItem) {
                DB::rollback();
                $this->form_completion_message = "The Option is already at the top of the list.";
                return;
            }
            
            // Swap the content between the two items, preserving their IDs
            DB::table('explore_options')->where('id', $currentItem[0]->id)->update([
                ...(array) $upItem[0],
                'id' => $currentItem[0]->id
            ]);
            
            DB::table('explore_options')->where('id', $upItem[0]->id)->update([
                ...(array) $currentItem[0],
                'id' => $upItem[0]->id
            ]);
            
            // Syncing the explore items with the new option id
            $explore_items_db_with_current_option_id = DB::table('explore_items')->where('option_id', $currentItem[0]->id)->get();
            $explore_items_db_with_up_option_id = DB::table('explore_items')->where('option_id', $upItem[0]->id)->get();
            
            foreach ($explore_items_db_with_current_option_id as $item) {
                DB::table('explore_items')->where('id', $item->id)->update([
                    'option_id' => $upItem[0]->id
                ]);
            }
            
            foreach ($explore_items_db_with_up_option_id as $item) {
                DB::table('explore_items')->where('id', $item->id)->update([
                    'option_id' => $currentItem[0]->id
                ]);
            }
            
            DB::commit();
            
            $this->form_completion_message = "The Option has been moved up.";
            
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



        } catch (\Exception $e) {
            DB::rollback();
            $this->form_error_message = "Failed to move the option: " . $e->getMessage();
        }
    }

    public function moveOptionDown($id)
    {

        try {
            DB::beginTransaction();
            
            $downItem = DB::select("SELECT * FROM explore_options WHERE id > ? ORDER BY id ASC LIMIT 1", [$id]);
            $currentItem = DB::select("SELECT * FROM explore_options WHERE id = ?", [$id]);
            
            if (!$downItem) {
                DB::rollback();
                $this->form_completion_message = "The Option is already at the bottom of the list.";
                return;
            }
            
            DB::table('explore_options')->where('id', $currentItem[0]->id)->update([
                ...(array) $downItem[0],
                'id' => $currentItem[0]->id
            ]);
            
            DB::table('explore_options')->where('id', $downItem[0]->id)->update([
                ...(array) $currentItem[0],
                'id' => $downItem[0]->id
            ]);
            
            // Syncing the explore items with the new option id
            $explore_items_db_with_current_option_id = DB::table('explore_items')->where('option_id', $currentItem[0]->id)->get();
            $explore_items_db_with_down_option_id = DB::table('explore_items')->where('option_id', $downItem[0]->id)->get();
            
            foreach ($explore_items_db_with_current_option_id as $item) {
                DB::table('explore_items')->where('id', $item->id)->update([
                    'option_id' => $downItem[0]->id
                ]);
            }
            
            foreach ($explore_items_db_with_down_option_id as $item) {
                DB::table('explore_items')->where('id', $item->id)->update([
                    'option_id' => $currentItem[0]->id
                ]);
            }
            
            DB::commit();
            
            $this->form_completion_message = "The Option has been moved down.";
            
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
    
            
        } catch (\Exception $e) {
            DB::rollback();
            $this->form_error_message = "Failed to move the option: " . $e->getMessage();
        }
    }



    public function moveItemUp($id)
    {

        $currentItem = DB::select("SELECT * FROM explore_items WHERE id = ?", [$id]);

        $upItem = DB::select("SELECT * FROM explore_items WHERE id < ? AND option_id = ? ORDER BY id DESC LIMIT 1", [$id, $currentItem[0]->option_id]);



        if (!$upItem) {
            $this->form_completion_message = "The Item is already at the top of the list according to its option.";
            return;
        }

        if ($upItem[0]->option_id !== $currentItem[0]->option_id) {
            $this->form_completion_message = "The Item is already at the top of the list according to its option.";
            return;
        }


        DB::table('explore_items')->where('id', $currentItem[0]->id)->update([
            ...(array) $upItem[0],
            'id' => $currentItem[0]->id
        ]);


        DB::table('explore_items')->where('id', $upItem[0]->id)->update([
            ...(array) $currentItem[0],
            'id' => $upItem[0]->id
        ]);

        $this->form_completion_message = "The Item has been moved up.";


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

        if (!empty($this->searchtext)) {


            $this->searchtext = e($this->searchtext);

            $this->no_search_results_found_show = false;


            $search_output_db = DB::select("SELECT
            explore_items.*,
            explore_options.*,
            explore_items.image_link AS item_image,
            explore_options.image_link AS option_image,
            explore_items.id AS item_id,
            explore_options.id AS option_id
            FROM explore_items
            LEFT JOIN explore_options ON explore_items.option_id = explore_options.id
            WHERE explore_items.item_title LIKE ?
            ORDER BY explore_items.option_id
            LIMIT 5;", ['%' . $this->searchtext . '%']);

            $this->search_output = array_map(function ($item) {
                return [
                    'option_title' => $item->option,
                    'item_title' => $item->item_title,
                    'image_link' => $item->item_image,
                    'item_description' => $item->item_description,
                    'site_link' => $item->site_link,
                    'id' => $item->item_id
                ];
            }, $search_output_db);

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

            $this->search_output_length = count($this->search_output);

            if ($this->search_output_length == 0) {

                // $this->dispatch('no_results_found');
                $this->no_search_results_found_show = true;
            }


            // $this->search_input_field_is_active = true;

            // session(['search_input_field_is_active' => $this->search_input_field_is_active]);
        }
    }

    public function moveItemDown($id)
    {

        $currentItem = DB::select("SELECT * FROM explore_items WHERE id = ?", [$id]);

        $downItem = DB::select("SELECT * FROM explore_items WHERE id > ? AND option_id = ?  ORDER BY id ASC LIMIT 1", [$id, $currentItem[0]->option_id]);



        if (!$downItem) {
            $this->form_completion_message = "The Item is already at the bottom of the list according to its option.";
            return;
        }

        if ($downItem[0]->option_id !== $currentItem[0]->option_id) {
            $this->form_completion_message = "The Item is already at the bottom of the list according to its option.";
            return;
        }


        DB::table('explore_items')->where('id', $currentItem[0]->id)->update([
            ...(array) $downItem[0],
            'id' => $currentItem[0]->id
        ]);


        DB::table('explore_items')->where('id', $downItem[0]->id)->update([
            ...(array) $currentItem[0],
            'id' => $downItem[0]->id
        ]);


        $this->form_completion_message = "The Item has been moved down.";



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

        if (!empty($this->searchtext)) {


            $this->searchtext = e($this->searchtext);

            $this->no_search_results_found_show = false;


            $search_output_db = DB::select("SELECT
            explore_items.*,
            explore_options.*,
            explore_items.image_link AS item_image,
            explore_options.image_link AS option_image,
            explore_items.id AS item_id,
            explore_options.id AS option_id
            FROM explore_items
            LEFT JOIN explore_options ON explore_items.option_id = explore_options.id
            WHERE explore_items.item_title LIKE ?
            ORDER BY explore_items.option_id
            LIMIT 5;", ['%' . $this->searchtext . '%']);

            $this->search_output = array_map(function ($item) {
                return [
                    'option_title' => $item->option,
                    'item_title' => $item->item_title,
                    'image_link' => $item->item_image,
                    'item_description' => $item->item_description,
                    'site_link' => $item->site_link,
                    'id' => $item->item_id
                ];
            }, $search_output_db);

            $this->search_output_length = count($this->search_output);

            if ($this->search_output_length == 0) {

                // $this->dispatch('no_results_found');
                $this->no_search_results_found_show = true;
            }


            // $this->search_input_field_is_active = true;

            // session(['search_input_field_is_active' => $this->search_input_field_is_active]);
        }
    }





    public function render()
    {
        return view('livewire.admin-explore-section-management');
    }
}
