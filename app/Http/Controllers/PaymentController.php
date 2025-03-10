<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
public function success(Request $request)
{
// Handle successful payment logic here
// You can access the session ID with $request->query('session_id')

$session_id = $request->query('session_id');

$consultation_stripe_booking = DB::table('consultation_stripe_bookings')->where('client_session_id', $session_id)->first();

if($consultation_stripe_booking){
    DB::table('consultation_stripe_bookings')
    ->where('client_session_id', $session_id)
    ->update([
        'payment_status' => 'paid',
        'updated_at' => now(),
    ]);
}

return view('payment.success');

}
public function cancel()
{
// Handle payment cancellation logic here
return view('payment.cancel');
}
}
