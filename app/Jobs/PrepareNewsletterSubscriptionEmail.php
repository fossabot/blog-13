<?php

namespace App\Jobs;

use App\Models\NewsletterSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class PrepareNewsletterSubscriptionEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $newsletterSubscriptions = NewsletterSubscription::all();

        $newsletterSubscriptions->each(fn ($newsletterSubscription) => SendNewsletterSubscriptionEmail::dispatch($newsletterSubscription->email));

        PrepareNewsletterSubscriptionEmail::dispatch()->delay(Carbon::tomorrow());
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
