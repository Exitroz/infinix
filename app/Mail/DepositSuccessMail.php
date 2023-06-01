<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Company;

class DepositSuccessMail extends Mailable
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
        $company = Company::first();

        $address = 'support@infinixfinance.com';
        $subject = 'Deposit Successful';
        $name = $company->name;
        return $this->from($address, $name)
            ->view('emails.deposit_success')->with('data', $this->mail)
            ->subject($subject);
    }
}
