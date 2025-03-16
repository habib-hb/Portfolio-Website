<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


// Define a scheduled task
// Schedule::call(function () {
//     try {
//         // Replace with your route URL
//         $url = url(env('BASE_LINK') . '/test-email');

//         // Make a GET request to the route
//         $response = Http::get($url);

//         // Log the response
//         Log::info('Route triggered at: ' . now() . ' | Response: ' . $response->status());
//     } catch (\Exception $e) {
//         // Log any errors
//         Log::error('Scheduled task failed: ' . $e->getMessage());
//     }
// })->everyMinute();
