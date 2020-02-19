<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeadlineCreated extends Mailable
{
    use Queueable, SerializesModels;
    
    public $deadline;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($deadline)
    {
        $this->deadline = $deadline;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.deadline-created');
    }
}
