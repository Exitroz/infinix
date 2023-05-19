<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->mail = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $address = 'support@exchangedigitalmining.com';
        $subject = 'Withdrawal Successful';
        $name = 'support@exchangedigitalmining.com';
        return $this->from($address, $name)
            ->view('emails.test')->with('data', $this->mail)
            ->subject($subject);
    }
}