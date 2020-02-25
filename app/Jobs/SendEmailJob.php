<?php

namespace App\Jobs;

use App\Mail\NewjobsMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $details,$dataMail;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details,$dataMail)
    {
        //
        $this->details = $details;
        $this->dataMail = $dataMail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $email = new NewjobsMail($this->dataMail);
        Mail::to($this->details['email'])->send($email);
    }
}
