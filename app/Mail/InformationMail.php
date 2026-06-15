<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;

class InformationMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $title;
    public string $email_message;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->title = $data['title'] ?? 'No Title';
        $this->email_message = $data['email_message'] ?? 'No Message';
    }

    /**
     * Email subject.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->title,
        );
    }

    /**
     * Email content.
     */
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

    /**
     * Attach files.
     */
    public function attachments(): array
    {
        return [];
    }
}