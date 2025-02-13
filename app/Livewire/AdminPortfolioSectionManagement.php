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

    public function mount()
    {

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
        // $this->validate([
        //     'item_image' => 'image|max:1024', // Image validation (1MB max)
        // ]);
        // if ($this->option && $this->item_title && $this->blog_area && $this->temporary_image_portfolio && $this->site_link) {
        if ($this->item_title && $this->blog_area && $this->temporary_image_portfolio && $this->site_link && $this->github_link && $this->technologies_used) {
            DB::insert("INSERT INTO portfolio_items (portfolio_title , portfolio_description , portfolio_image_link , technologies_used , portfolio_site_link , portfolio_github_link) VALUES (?, ?, ?, ?, ? , ?)", [$this->item_title, $this->blog_area, $this->temporary_image_portfolio, $this->technologies_used, $this->site_link, $this->github_link]);


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
            session()->flash('message', 'Item added successfully.');
            $this->dispatch('refresh-trigger');
        } else {
            session()->flash('error', 'Please fill all the fields. ->> portfolio' . $this->blog_area);
            $this->dispatch('alert-manager');
        }

    }



    public function updated($property)
    {
        if ($property === 'item_image') {
            $imagePath = $this->item_image->store('temp_item_images', 'public');

            //Full Link
            $imagePath = asset('storage/' . $imagePath);

            $this->temporary_image_portfolio = $imagePath;
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

        session()->flash('message', 'Portfolio deleted successfully.');
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
        return view('livewire.admin-portfolio-section-management');
    }
}
