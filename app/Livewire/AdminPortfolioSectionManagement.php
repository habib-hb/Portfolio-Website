<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class AdminPortfolioSectionManagement extends Component
{
    use WithFileUploads;

    public $item_image;

    public $option_image;

    public $temporary_image_portfolio;

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

    public $editable_portfolio_id;

    public $theme_mode;

    public function mount()
    {

        if (!session('theme_mode')) {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);
        } else {

            $this->theme_mode = session('theme_mode');
        }

        $portfolios_db = DB::select("SELECT * FROM portfolio_items");

        $this->items_array = array_map(function ($item) {
            return [
                'portfolio_title' => $item->portfolio_title,
                'portfolio_description' => $item->portfolio_description,
                'portfolio_image_link' => $item->portfolio_image_link,
                'technologies_used' => $item->technologies_used,
                'portfolio_site_link' => $item->portfolio_site_link,
                'portfolio_github_link' => $item->portfolio_github_link,
                'id' => $item->id
            ];
        }, $portfolios_db);
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

        if ($this->editable_portfolio_id) {
            if ($this->item_title && $this->blog_area && $this->temporary_image_portfolio && $this->technologies_used) {
                DB::table('portfolio_items')->where('id', $this->editable_portfolio_id)->update([
                    'portfolio_title' => $this->item_title,
                    'portfolio_description' => $this->blog_area,
                    'portfolio_image_link' => $this->temporary_image_portfolio,
                    'technologies_used' => $this->technologies_used,
                    'portfolio_site_link' => $this->site_link ?? null,
                    'portfolio_github_link' => $this->github_link ?? null
                ]);

                $portfolios_db = DB::select("SELECT * FROM portfolio_items");

                $this->items_array = array_map(function ($item) {
                    return [
                        'portfolio_title' => $item->portfolio_title,
                        'portfolio_description' => $item->portfolio_description,
                        'portfolio_image_link' => $item->portfolio_image_link,
                        'technologies_used' => $item->technologies_used,
                        'portfolio_site_link' => $item->portfolio_site_link,
                        'portfolio_github_link' => $item->portfolio_github_link,
                        'id' => $item->id
                    ];
                }, $portfolios_db);

                $this->editable_portfolio_id = null;

                $this->option = "";
                $this->item_title = "";
                $this->blog_area = "";
                $this->temporary_image_portfolio = "";
                $this->item_image = "";
                $this->site_link = "";
                $this->github_link = "";
                $this->technologies_used = "";

                $this->form_completion_message = 'Portfolio Updated Successfully';

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
        if ($this->item_title && $this->blog_area && $this->temporary_image_portfolio  && $this->technologies_used) {
            DB::insert("INSERT INTO portfolio_items (portfolio_title , portfolio_description , portfolio_image_link , technologies_used , portfolio_site_link , portfolio_github_link) VALUES (?, ?, ?, ?, ? , ?)", [$this->item_title, $this->blog_area, $this->temporary_image_portfolio, $this->technologies_used, $this->site_link ?? null, $this->github_link ?? null]);


            $portfolios_db = DB::select("SELECT * FROM portfolio_items");

            $this->items_array = array_map(function ($item) {
                return [
                    'portfolio_title' => $item->portfolio_title,
                    'portfolio_description' => $item->portfolio_description,
                    'portfolio_image_link' => $item->portfolio_image_link,
                    'technologies_used' => $item->technologies_used,
                    'portfolio_site_link' => $item->portfolio_site_link,
                    'portfolio_github_link' => $item->portfolio_github_link,
                    'id' => $item->id
                ];
            }, $portfolios_db);


            $this->option = "";
            $this->item_title = "";
            $this->blog_area = "";
            $this->temporary_image_portfolio = "";
            $this->item_image = "";
            $this->site_link = "";
            $this->github_link = "";
            $this->technologies_used = "";

            $this->dispatch('alert-manager');
            $this->form_completion_message = "Portfolio Item Added Successfully.";
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

            $this->temporary_image_portfolio = $imagePath;

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

    public function deletePortfolio($id)
    {

        DB::table('portfolio_items')->where('id', $id)->delete();

        $this->clear_confirmation_alert();

        $portfolios_db = DB::select("SELECT * FROM portfolio_items");

        $this->items_array = array_map(function ($item) {
            return [
                'portfolio_title' => $item->portfolio_title,
                'portfolio_description' => $item->portfolio_description,
                'portfolio_image_link' => $item->portfolio_image_link,
                'technologies_used' => $item->technologies_used,
                'portfolio_site_link' => $item->portfolio_site_link,
                'portfolio_github_link' => $item->portfolio_github_link,
                'id' => $item->id
            ];
        }, $portfolios_db);

        $this->form_completion_message = 'Portfolio deleted successfully.';
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


    public function editPortfolio($id)
    {

        $editable_portfolio_db = DB::select("SELECT * FROM portfolio_items WHERE id = ?", [$id]);

        if ($editable_portfolio_db) {

            $this->item_title = $editable_portfolio_db[0]->portfolio_title;
            $this->blog_area = $editable_portfolio_db[0]->portfolio_description;
            $this->temporary_image_portfolio = $editable_portfolio_db[0]->portfolio_image_link;
            $this->site_link = $editable_portfolio_db[0]->portfolio_site_link;
            $this->github_link = $editable_portfolio_db[0]->portfolio_github_link;
            $this->technologies_used = $editable_portfolio_db[0]->technologies_used;
            $this->select_options_selected = true;

            $this->editable_portfolio_id = $editable_portfolio_db[0]->id;

            $this->dispatch('editable-portfolio-area', portfolio_data: $this->blog_area);
        }
    }



    public function cancel_portfolio_item_update()
    {
        $this->editable_portfolio_id = null;

        $this->option = "";
        $this->item_title = "";
        $this->blog_area = "";
        $this->temporary_image_portfolio = "";
        $this->item_image = "";
        $this->site_link = "";
        $this->github_link = "";
        $this->technologies_used = "";

        $this->dispatch('refresh-blog-area');
        $this->dispatch('refresh-image-area');
    }


    public function moveItemUp($id)
    {

        $upItem = DB::select("SELECT * FROM portfolio_items WHERE id < ? ORDER BY id DESC LIMIT 1", [$id]);

        $currentItem = DB::select("SELECT * FROM portfolio_items WHERE id = ?", [$id]);

        if (!$upItem) {
            $this->form_completion_message = "The Item is already at the top of the list.";
            return;
        }

        DB::table('portfolio_items')->where('id', $currentItem[0]->id)->update([
            ...(array) $upItem[0],
            'id' => $currentItem[0]->id
        ]);

        DB::table('portfolio_items')->where('id', $upItem[0]->id)->update([
            ...(array) $currentItem[0],
            'id' => $upItem[0]->id
        ]);

        $this->form_completion_message = "The Item has been moved up.";

        $portfolios_db = DB::select("SELECT * FROM portfolio_items");

        $this->items_array = array_map(function ($item) {
            return [
                'portfolio_title' => $item->portfolio_title,
                'portfolio_description' => $item->portfolio_description,
                'portfolio_image_link' => $item->portfolio_image_link,
                'technologies_used' => $item->technologies_used,
                'portfolio_site_link' => $item->portfolio_site_link,
                'portfolio_github_link' => $item->portfolio_github_link,
                'id' => $item->id
            ];
        }, $portfolios_db);
    }

    public function moveItemDown($id)
    {

        $downItem = DB::select("SELECT * FROM portfolio_items WHERE id > ? ORDER BY id ASC LIMIT 1", [$id]);

        $currentItem = DB::select("SELECT * FROM portfolio_items WHERE id = ?", [$id]);

        if (!$downItem) {
            $this->form_completion_message = "The Item is already at the bottom of the list.";
            return;
        }

        DB::table('portfolio_items')->where('id', $currentItem[0]->id)->update([
            ...(array) $downItem[0],
            'id' => $currentItem[0]->id
        ]);

        DB::table('portfolio_items')->where('id', $downItem[0]->id)->update([
            ...(array) $currentItem[0],
            'id' => $downItem[0]->id
        ]);

        $this->form_completion_message = "The Item has been moved down.";

        $portfolios_db = DB::select("SELECT * FROM portfolio_items");

        $this->items_array = array_map(function ($item) {
            return [
                'portfolio_title' => $item->portfolio_title,
                'portfolio_description' => $item->portfolio_description,
                'portfolio_image_link' => $item->portfolio_image_link,
                'technologies_used' => $item->technologies_used,
                'portfolio_site_link' => $item->portfolio_site_link,
                'portfolio_github_link' => $item->portfolio_github_link,
                'id' => $item->id
            ];
        }, $portfolios_db);
    }



    public function render()
    {
        return view('livewire.admin-portfolio-section-management');
    }
}
