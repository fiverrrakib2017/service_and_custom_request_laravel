<?php

namespace App\Jobs;

use App\Mail\SendEmailQueueDemo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailQueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $send_mail=NULL;
    /**
     * Create a new job instance.
     */
    public function __construct($object)
    {
        $this->send_mail=$object;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //Mail::to($this->request->email)->send(new WelcomeMail);
        $email = new SendEmailQueueDemo();
        Mail::to($this->send_mail)->send($email);
    }
}
