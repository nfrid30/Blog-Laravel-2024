<?php

namespace App\Jobs\Email;

use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class SendToAllReadersJob implements ShouldQueue
{
    use Queueable;

    protected Collection $readers;
    /**
     * Create a new job instance.
     */
    public function __construct(protected Post $post)
    {
        $this->readers = $post->user->readers()->get();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->readers as $reader) {
            SendToReaderJob::dispatch($reader, $this->post);

        }
    }
}
