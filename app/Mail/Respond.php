<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Respond extends Mailable
{
    use Queueable, SerializesModels;
//    public $response;

    /**
     * Create a new message instance.
     *
     * @param $response
     */
    public function __construct()
    {
//        $this->$response = $response;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail')->from('masterfork5@gmail.com');
    }
}
