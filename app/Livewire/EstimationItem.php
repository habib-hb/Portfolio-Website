<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Carbon;
class EstimationItem extends Component
{

    public $item_id;

    public $card_title;

    public $theme_mode;

    public $item_data=[];

    public $selection_mode=true;

    public $checkbox_mode=false;

    public $items_array_php_version=[];

    public $items_array_js_version="";

    public $selection_title;

    public $selection_item_name;

    public $selection_item_value;

    public $editable_option_key_selection;

    public $addable_selection_items=[];

    public $addable_full_selection=[];

    public $notify_success;

    public $notify_error;

    public $editable_selection_item_key;

    public $confirm_deletable_option_key;

    public $checkbox_title;

    public $checkbox_value;

    public $addable_full_checkbox=[];

    public $editable_option_key_checkbox;

    public $option_details_link;

    public function mount($item_id)
    {

        if(!session('theme_mode')) {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);

        }else{

            $this->theme_mode = session('theme_mode');

        }


        $this->item_id = $item_id;

        $estimation_cards_db = DB::select("SELECT * FROM price_estimation WHERE id = ?", [$this->item_id]);

        $item_data_arrayed_version = array_map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'icon_link' => $item->icon_link,
                'items_array' => $item->items_array ?? []
            ];
        }, $estimation_cards_db);

        $this->item_data = $item_data_arrayed_version[0];

        $this->card_title = $this->item_data['title'];

        $this->items_array_js_version = $this->item_data['items_array'];

        $this->items_array_php_version = json_decode($this->item_data['items_array'], true) ?? [];

       // Defining sorting priority (lower number = higher priority)
        $priority = ['select' => 1, 'checkbox' => 3]; // "select" first, "checkbox" last

        usort($this->items_array_php_version, function ($a, $b) use ($priority) {
            return ($priority[$a['type']] ?? 2) <=> ($priority[$b['type']] ?? 2);
        });

        $this->option_details_link = env('BASE_LINK') . DB::table('price_estimation')->where('id', $this->item_id)->value('blog_link');

    }


    #[On('notify-from-child-component')]
    public function changeThemeMode(){

        if($this->theme_mode == 'light'){

            $this->theme_mode = 'dark';

            session(['theme_mode' => $this->theme_mode]);

        }else{

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);

        }

        $this->dispatch('alert-manager');

    }


    public function toggle_selection_mode(){
        if($this->selection_mode) {
            $this->selection_mode = false;
            $this->checkbox_mode = true;
        }else{
            $this->selection_mode = true;
            $this->checkbox_mode = false;
        }
    }


    public function toggle_checkbox_mode(){
        if($this->checkbox_mode) {
            $this->checkbox_mode = false;
            $this->selection_mode = true;
        }else{
            $this->checkbox_mode = true;
            $this->selection_mode = false;
        }
    }


    public function save_selection_option(){

        if($this->addable_selection_items == [] || !$this->selection_title || !$this->addable_selection_items || !$this->selection_mode){
            $this->notify_error = "Please fill all the fields";
            return;
        }


        if($this->editable_option_key_selection !== null){

            $this->items_array_php_version[$this->editable_option_key_selection]['title'] = $this->selection_title;

            $this->items_array_php_version[$this->editable_option_key_selection]['options'] = array_map(function ($item) {
                return [
                    'option_name' => $item['name'],
                    'option_value' => $item['value']
                ];
            }, $this->addable_selection_items);

            $this->editable_option_key_selection = null;

            $this->selection_title = "";
            $this->addable_selection_items = [];

             // Defining sorting priority (lower number = higher priority)
             $priority = ['select' => 1, 'checkbox' => 3]; // "select" first, "checkbox" last

             usort($this->items_array_php_version, function ($a, $b) use ($priority) {
                 return ($priority[$a['type']] ?? 2) <=> ($priority[$b['type']] ?? 2);
             });

            DB::table('price_estimation')->where('id', $this->item_id)->update(['items_array' => json_encode($this->items_array_php_version)]);

            $this->notify_success = "Option updated successfully";

            return;

        }


        $this->addable_full_selection = [
            'title' => $this->selection_title,
            'id_name' => "selection_" . str_replace(" ", "_", strtolower($this->selection_title)),
            'type' => 'select',
            'options' => array_map(function ($item) {
                return [
                    'option_name' => $item['name'],
                    'option_value' => $item['value']
                ];
            }, $this->addable_selection_items),
        ];

        $this->items_array_php_version[] = $this->addable_full_selection;

        $this->addable_selection_items = [];

        $this->selection_title = "";

         // Defining sorting priority (lower number = higher priority)
         $priority = ['select' => 1, 'checkbox' => 3]; // "select" first, "checkbox" last

         usort($this->items_array_php_version, function ($a, $b) use ($priority) {
             return ($priority[$a['type']] ?? 2) <=> ($priority[$b['type']] ?? 2);
         });

        DB::table('price_estimation')->where('id', $this->item_id)->update(['items_array' => json_encode($this->items_array_php_version)]);

        $this->notify_success = "Option added successfully";




    }


    public function editOption($key){
        if($this->items_array_php_version[$key]['type'] == 'select'){
            $this->selection_mode=true;

            $this->checkbox_mode=false;

            $this->selection_title = $this->items_array_php_version[$key]['title'];

            $this->addable_selection_items = array_map(function ($item) {
                return [
                    'name' => $item['option_name'],
                    'value' => $item['option_value']
                ];
            },  $this->items_array_php_version[$key]['options']);

            $this->editable_option_key_selection = $key;

            $this->dispatch('edit_option_triggered');
        }



        if($this->items_array_php_version[$key]['type'] == 'checkbox'){
            $this->selection_mode=false;

            $this->checkbox_mode=true;

            $this->checkbox_title = $this->items_array_php_version[$key]['option']['checkbox_name'];
            $this->checkbox_value = $this->items_array_php_version[$key]['option']['checkbox_value'];

            $this->editable_option_key_checkbox = $key;
            $this->dispatch('edit_option_triggered');
        }

    }


    public function deleteOption($key){

        $this->confirm_deletable_option_key = $key;

        // unset($this->items_array_php_version[$key]);

    }

    public function confirmDeleteOption(){

        unset($this->items_array_php_version[$this->confirm_deletable_option_key]);

        $this->items_array_php_version = array_values($this->items_array_php_version);

        $this->confirm_deletable_option_key = null;

        // Defining sorting priority (lower number = higher priority)
        $priority = ['select' => 1, 'checkbox' => 3]; // "select" first, "checkbox" last

        usort($this->items_array_php_version, function ($a, $b) use ($priority) {
            return ($priority[$a['type']] ?? 2) <=> ($priority[$b['type']] ?? 2);
        });

        DB::table('price_estimation')->where('id', $this->item_id)->update(['items_array' => json_encode($this->items_array_php_version)]);

    }

    public function clear_confirmDeleteOption(){

        $this->confirm_deletable_option_key = null;

    }

    public function calcel_selection_option_edit(){

        $this->editable_option_key_selection = null;
        $this->selection_title = "";
        $this->addable_selection_items = [];

    }


    public function add_new_selection_item(){

        if(!$this->selection_item_name || !$this->selection_item_value){
            $this->notify_error = "Please fill all the fields";
            return;
        }

        if($this->editable_selection_item_key !== null){

            $this->addable_selection_items[$this->editable_selection_item_key]['name'] = $this->selection_item_name;
            $this->addable_selection_items[$this->editable_selection_item_key]['value'] = $this->selection_item_value;

            $this->editable_selection_item_key = null;
            $this->selection_item_name = "";
            $this->selection_item_value = "";
            return;
        }


        $this->addable_selection_items[] = [
            'name' => $this->selection_item_name,
            'value' => $this->selection_item_value
        ];

        $this->selection_item_name = "";
        $this->selection_item_value = "";

    }


    public function deleteSelectionItem($key){

        unset($this->addable_selection_items[$key]);

        $this->addable_selection_items = array_values($this->addable_selection_items);

    }

    public function editSelectionItem($key){

        $this->selection_item_name = $this->addable_selection_items[$key]['name'];
        $this->selection_item_value = $this->addable_selection_items[$key]['value'];

        $this->editable_selection_item_key = $key;

        $this->dispatch('edit_option_triggered');

    }



    public function clear_success(){

        $this->notify_success = null;

    }

    public function clear_error(){

        $this->notify_error = null;

    }


    public function moveOptionUp($key){
        if($key == 0){
            $this->notify_success = "Option already at the top";
            return;
        }

        if($this->items_array_php_version[$key]['type'] == 'checkbox' && $this->items_array_php_version[$key-1]['type'] == 'select'){
            $this->notify_success = "'Checkbox' type options are programmed to be below 'Select' type options";
            return;
        }

          $current_option = $this->items_array_php_version[$key];

          $this->items_array_php_version[$key] = $this->items_array_php_version[$key-1];
          $this->items_array_php_version[$key-1] = $current_option;

          $this->items_array_php_version = array_values($this->items_array_php_version);

            // Defining sorting priority (lower number = higher priority)
            $priority = ['select' => 1, 'checkbox' => 3]; // "select" first, "checkbox" last

            usort($this->items_array_php_version, function ($a, $b) use ($priority) {
                return ($priority[$a['type']] ?? 2) <=> ($priority[$b['type']] ?? 2);
            });

          DB::table('price_estimation')->where('id', $this->item_id)->update(['items_array' => json_encode($this->items_array_php_version)]);


    }

    public function moveOptionDown($key){

        if($key == count($this->items_array_php_version)-1){
            $this->notify_success = "Option already at the bottom";
            return;
        }

        if($this->items_array_php_version[$key]['type'] == 'select' && $this->items_array_php_version[$key+1]['type'] == 'checkbox'){
            $this->notify_success = "'Select' type options are programmed to be above 'Checkbox' type options";
            return;
        }

        $current_option = $this->items_array_php_version[$key];

        $this->items_array_php_version[$key] = $this->items_array_php_version[$key+1];
        $this->items_array_php_version[$key+1] = $current_option;

        $this->items_array_php_version = array_values($this->items_array_php_version);

        // Defining sorting priority (lower number = higher priority)
        $priority = ['select' => 1, 'checkbox' => 3]; // "select" first, "checkbox" last

        usort($this->items_array_php_version, function ($a, $b) use ($priority) {
            return ($priority[$a['type']] ?? 2) <=> ($priority[$b['type']] ?? 2);
        });

        DB::table('price_estimation')->where('id', $this->item_id)->update(['items_array' => json_encode($this->items_array_php_version)]);

    }

    public function cancle_edit_selection_item(){

        $this->editable_selection_item_key = null;
        $this->selection_item_name = "";
        $this->selection_item_value = "";


    }


    public function save_checkbox_option(){

        if(!$this->checkbox_title || !$this->checkbox_value){
            $this->notify_error = "Please fill all the fields";
            return;
        }

        if($this->editable_option_key_checkbox !== null){

            $this->items_array_php_version[$this->editable_option_key_checkbox]['title'] = $this->checkbox_title;
            $this->items_array_php_version[$this->editable_option_key_checkbox]['option']['checkbox_name'] = $this->checkbox_title;
            $this->items_array_php_version[$this->editable_option_key_checkbox]['option']['checkbox_value'] = $this->checkbox_value;

            $this->editable_option_key_checkbox = null;
            $this->checkbox_title = "";
            $this->checkbox_value = "";

             // Defining sorting priority (lower number = higher priority)
            $priority = ['select' => 1, 'checkbox' => 3]; // "select" first, "checkbox" last

            usort($this->items_array_php_version, function ($a, $b) use ($priority) {
                return ($priority[$a['type']] ?? 2) <=> ($priority[$b['type']] ?? 2);
            });

            DB::table('price_estimation')->where('id', $this->item_id)->update(['items_array' => json_encode($this->items_array_php_version)]);

            $this->notify_success = "Option updated successfully";
            return;
        }

        $this->addable_full_checkbox = [
            'title' => $this->checkbox_title,
            'id_name' => "checkbox_" . str_replace(" ", "_", strtolower($this->checkbox_title)),
            'type' => 'checkbox',
            'option' => [
                'checkbox_name' => $this->checkbox_title,
                'checkbox_value' => $this->checkbox_value
            ]
        ];

        $this->items_array_php_version[] = $this->addable_full_checkbox;

        $this->checkbox_title = "";
        $this->checkbox_value = "";

         // Defining sorting priority (lower number = higher priority)
         $priority = ['select' => 1, 'checkbox' => 3]; // "select" first, "checkbox" last

         usort($this->items_array_php_version, function ($a, $b) use ($priority) {
             return ($priority[$a['type']] ?? 2) <=> ($priority[$b['type']] ?? 2);
         });

        DB::table('price_estimation')->where('id', $this->item_id)->update(['items_array' => json_encode($this->items_array_php_version)]);

        $this->notify_success = "Option added successfully";

    }

    public function cancel_checkbox_option_edit(){

        $this->editable_option_key_checkbox = null;
        $this->checkbox_title = "";
        $this->checkbox_value = "";

    }


    public function save_option_details_link(){

        if(!$this->option_details_link){
            $this->notify_error = "Please fill the Link field";
            return;
        }

        $trimed_url_link = parse_url($this->option_details_link, PHP_URL_PATH);
        DB::table('price_estimation')->where('id', $this->item_id)->update(['blog_link' => $trimed_url_link]);

        $this->notify_success = "Link added successfully";
    }



    public function moveSelectionItemUp($key){

        if($key == 0){
            $this->notify_success = "Item already at the top";
            return;
        }

        $current_option = $this->addable_selection_items[$key];

        $this->addable_selection_items[$key] = $this->addable_selection_items[$key-1];
        $this->addable_selection_items[$key-1] = $current_option;

        $this->addable_selection_items = array_values($this->addable_selection_items);

    }


    public function moveSelectionItemDown($key){

        if($key == count($this->addable_selection_items)-1){
            $this->notify_success = "Item already at the bottom";
            return;
        }

        $current_option = $this->addable_selection_items[$key];

        $this->addable_selection_items[$key] = $this->addable_selection_items[$key+1];
        $this->addable_selection_items[$key+1] = $current_option;

        $this->addable_selection_items = array_values($this->addable_selection_items);

    }


    public function render()
    {
        return view('livewire.estimation-item');
    }
}
