<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class Respond extends Mailable
{
    use Queueable, SerializesModels;
    public $response;

    /**
     * Create a new message instance.
     *
     * @param $response
     */
    public function __construct($response)
    {
        $this->$response = $response;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('account@meru.go.ke')->view('mail');
    }
}
