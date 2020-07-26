<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $subject,$msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$msg) {
        $this->subject = $subject;
        $this->msg     = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}
