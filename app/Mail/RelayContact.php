<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RelayContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     protected $message;
     protected $replay;

    public function __construct($message , $replay)
    {
        $this->message = $message;
        $this->replay  = $replay;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contactMessage = $this->message;
        $replay = $this->replay;
        // dd($message);
        return $this->to($contactMessage->email)
        ->view('back-end.mails.replay-message' , compact('contactMessage' , 'replay'));
    }
}
