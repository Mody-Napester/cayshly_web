<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AskUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ask_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ask_message)
    {
        $this->ask_message = $ask_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.ask-us.ask-us');
    }
}
