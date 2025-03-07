<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TriggerRouteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:trigger';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trigger a specific route every 1 minute';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Replace with your route URL
        $url = url('/test-cron');

        // Make a GET request to the route
        $response = Http::get($url);

        // Log the response
        Log::info('Route triggered at: ' . now() . ' | Response: ' . $response->status());

        $this->info('Route triggered successfully!');
    }
}
