<?php

namespace App\Jobs;

use App\Mail\Newsletter;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

/**
 * Class SendNewsletterSubscriptionEmail
 * @package App\Jobs
 */
class SendNewsletterSubscriptionEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    protected string $email;

    /**
     * Create a new job instance.
     *
     * @param $email
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() : void
    {
        $posts = Post::lastMonth()->get();
        $email = $this->email;

        Mail::to($this->email)->send(new Newsletter($posts, $email));
    }
}
