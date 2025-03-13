<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class email_unsubscribe_confirmed extends Controller
{
    public function index(Request $request)
    {
        $email = $request->query('email');

        $already_unsubscribed_check = DB::table("unsubscribed_email_list")->where('email', $email)->get();

        if(count($already_unsubscribed_check) == 0){
        DB::table("unsubscribed_email_list")->insert([
            "email" => $email,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }

        return view('emails.unsubscribe.confirmed', ['email' => $email]);
    }
}
