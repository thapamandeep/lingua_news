<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InformationMail extends Mailable
{
    use Queueable, SerializesModels;

      public $title;
    public $email_message;

    public function __construct($data)
    {
        $this->title = $data['title'] ?? 'No Title';
        $this->email_message = $data['email_message'] ?? 'No Message';
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->title ?? 'Information Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.information-email',
            with: [
                'title' => $this->title,
                'email_message' => $this->email_message,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}