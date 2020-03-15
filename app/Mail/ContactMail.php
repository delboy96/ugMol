<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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
    private $message;

    /**
     * Create a new message instance.
     *
     * @param string $name
     * @param string $surname
     * @param string $email
     * @param string $message
     */
    public function __construct(string $name, string $surname, string $email, string $message)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->message = $message;
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
            'message' => $this->message,
        ]);
    }
}
