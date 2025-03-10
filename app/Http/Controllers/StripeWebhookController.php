<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->all();
        $eventType = $payload['type'];

        if ($eventType === 'checkout.session.completed') {
        $session = $payload['data']['object'];

        // Verify the webhook signature (optional, but recommended)
        // You can use Stripe's SDK to verify the signature if needed

        try {
            $consultation_stripe_booking = DB::table('consultation_stripe_bookings')->where('client_session_id', $session['id'])->first();

            if($consultation_stripe_booking){
                DB::table('consultation_stripe_bookings')
                ->where('client_session_id', $session['id'])
                ->update([
                    'payment_status' => 'paid',
                    'from_event' => 'stripe',
                    'updated_at' => now(),
                ]);
            }
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            Log::error('Invalid payload', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Invalid payload'], 400);
        }

        return response()->json(['status' => 'success']);
    }
      // If the event type is not 'checkout.session.completed', you can log it or handle it accordingly
      Log::info('Received unhandled webhook event', ['type' => $eventType]);
      return response()->json(['status' => 'unhandled_event']);
    }
}
