<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Contact extends Component
{

    public $user_name;

    public $user_email;

    public $user_phone;

    public $user_message;

    public $notify_success;

    public $notify_error;

    public function changeThemeMode(){

        if(session('theme_mode') == 'light'){

            session(['theme_mode' => 'dark']);

        }else{


            session(['theme_mode' => 'light']);

        }

        $this->dispatch('alert-manager');

    }


    public function send_message(){
        if(!$this->user_name || !$this->user_email || !$this->user_phone || !$this->user_message){

            $this->notify_error = 'Please fill out all the fields';

            return;

        }

        DB::table('contact-messages')->insert([
            'name' => $this->user_name,
            'email' => $this->user_email,
            'phone' => $this->user_phone,
            'message' => $this->user_message,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->notify_success = 'Message Sent Successfully';

        $this->user_name = null;

        $this->user_email = null;

        $this->user_phone = null;

        $this->user_message = null;

    }

    public function clear_notify_success(){
        $this->notify_success = null;
    }


    public function clear_notify_error(){
        $this->notify_error = null;
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
