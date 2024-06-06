<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendBroadcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $message;
    protected string $number;

    /**
     * Create a new job instance.
     */
    public function __construct($message, $number)
    {
        $this->message = $message;
        $this->number = $number;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $broadcastToken = env('BROADCAST_TOKEN');
            $response = Http::withHeader('Authorization', "Bearer $broadcastToken")
                ->asForm()
                ->post("http://host.docker.internal:8080/api/v1/broadcast", [
                    'message' => $this->message,
                    'number' => $this->number,
                ]);

            Log::info('Job SendBroadcast handled', ['response' => $response->json()]);
        } catch (\Exception $e) {
            Log::error('Job SendBroadcast failed', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
