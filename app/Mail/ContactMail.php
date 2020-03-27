<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $body;

    /**
     * Create a new message instance.
     *
     * @param string $name
     * @param string $surname
     * @param string $email
     * @param string $body
     */
    public function __construct(string $name, string $surname, string $email, string $body)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact', [
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'body' => $this->body
        ]);
    }
}
