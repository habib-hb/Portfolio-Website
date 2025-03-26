<?php

namespace App\Livewire;

use App\Mail\contact_message;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{

    public $user_name;

    public $user_email;

    public $user_phone;

    public $user_message;

    public $notify_success;

    public $notify_error;

    // Details
    public $email;

    public $phone;

    public $address;

    public $facebook_link;

    public $instagram_link;

    public $twitter_link;

    public $linkedin_link;

    public $github_link;

    public $email_icon;

    public $phone_icon;

    public $address_icon;

    public $social_icon;

    public $title_icon;

    //New Additions
    public $site_logo_light;

    public $site_logo_dark;

    public $footer_logo_light;

    public $footer_logo_dark;

    public $footer_top_layer_text;

    public $footer_bottom_layer_text;
    //End New Additions


    public function mount()
    {
        $contact_me = DB::table('contact_me_page')->where('id', 1)->first();
        $this->email = $contact_me->email;
        $this->phone = $contact_me->phone;
        $this->address = $contact_me->address;
        $this->email_icon = $contact_me->email_icon;
        $this->phone_icon = $contact_me->phone_icon;
        $this->address_icon = $contact_me->address_icon;
        $this->social_icon = $contact_me->social_icon;
        $this->title_icon = $contact_me->title_icon;
        $this->facebook_link = $contact_me->facebook_link;
        $this->instagram_link = $contact_me->instagram_link;
        $this->twitter_link = $contact_me->twitter_link;
        $this->linkedin_link = $contact_me->linkedin_link;
        $this->github_link = $contact_me->github_link;

        //New Additions
        $this->site_logo_light = DB::table('site_data')->where('title', 'site_logo_light_mode')->first()->data;

        $this->site_logo_dark = DB::table('site_data')->where('title', 'site_logo_dark_mode')->first()->data;

        $this->footer_logo_light = DB::table('site_data')->where('title', 'footer_logo_light_mode')->first()->data;

        $this->footer_logo_dark = DB::table('site_data')->where('title', 'footer_logo_dark_mode')->first()->data;

        $this->footer_top_layer_text = DB::table('site_data')->where('title', 'footer_top_layer_text')->first()->data;

        $this->footer_bottom_layer_text = DB::table('site_data')->where('title', 'footer_bottom_layer_text')->first()->data;
        //End New Additions
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


    public function send_message()
    {
        if (!$this->user_name || !$this->user_email || !$this->user_phone || !$this->user_message) {

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

        Mail::to(env('ADMIN_PERSONAL_EMAIL'))->send(new contact_message([
            'name' => $this->user_name,
            'email' => $this->user_email,
            'phone' => $this->user_phone,
            'message' => $this->user_message,
            'sent_at' => Carbon::now()->setTimezone('Asia/Dhaka')->format('jS F Y \a\t g:i A')
        ]));

        $this->notify_success = 'Message Sent Successfully';

        $this->user_name = null;

        $this->user_email = null;

        $this->user_phone = null;

        $this->user_message = null;
    }

    public function clear_notify_success()
    {
        $this->notify_success = null;
    }


    public function clear_notify_error()
    {
        $this->notify_error = null;
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
