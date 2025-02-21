<?php

namespace App\Livewire;

use App\Models\booked_client_details;
use App\Models\booked_patient_details;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

use Livewire\WithPagination;

class AdminContactMessages extends Component
{

    use WithPagination;

    public $database_offset = 0;

    public $database_limit = 10;


    public $all_contact_messages;

    public $notify_success;

    public $notify_error;







    public function mount(){

        $all_contact_messages = DB::table('contact-messages')
        ->orderBy('created_at', 'desc')
        ->take($this->database_limit)
        ->get()
        ->toArray();

        $this->all_contact_messages = array_map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'phone' => $item->phone,
                'message' => $item->message,
                'created_at' => $item->created_at,
                'time' => \Carbon\Carbon::parse($item->created_at)->format('h:i A'),
                'date' => \Carbon\Carbon::parse($item->created_at)->format('Y-m-d'),
            ];
        }, $all_contact_messages);

        $this->database_offset += $this->database_limit;

    }

    public function loadMore(){

        $loaded_contact_messages = DB::table('contact-messages')
        ->orderBy('created_at', 'desc')
        ->skip($this->database_offset)
        ->take($this->database_limit)
        ->get()
        ->toArray();


        $loaded_contact_messages = array_map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'phone' => $item->phone,
                'message' => $item->message,
                'created_at' => $item->created_at,
                'time' => \Carbon\Carbon::parse($item->created_at)->format('h:i A'),
                'date' => \Carbon\Carbon::parse($item->created_at)->format('Y-m-d'),
            ];
        }, $loaded_contact_messages);

        if(count($loaded_contact_messages) == 0){
            $this->notify_success = 'No More Messages';
            return;
        }


        // Filtered Array
        // $appointments = $appointments->toArray();

        if(count($loaded_contact_messages) == 0){
            $this->notify_success = 'No More Messages';
        }

        //Merging Both Arrays
        $this->all_contact_messages = array_merge($this->all_contact_messages, $loaded_contact_messages);


         // Increase the offset for the next load
         $this->database_offset += $this->database_limit;


    }

    public function changeThemeMode(){

        if(session('theme_mode') == 'light'){

            session(['theme_mode' => 'dark']);

        }else{


            session(['theme_mode' => 'light']);

        }

        $this->dispatch('alert-manager');

    }



    public function clear_notify_success(){
        $this->notify_success = null;
    }


    public function clear_notify_error(){
        $this->notify_error = null;
    }





    public function render()
    {
        return view('livewire.admin-contact-messages');
    }
}
