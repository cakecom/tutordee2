<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewjobsMail extends Mailable
{
    use Queueable, SerializesModels;
    public $dataMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataMail)
    {
        //
        $this->dataMail=$dataMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newjobs');
    }
}
