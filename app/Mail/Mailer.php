<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(string $subject, string $message, ?string $contactAddress=null, ?string $attachmentPath=null)
    {
        //
        $this->appName = config('app.name');
        $this->subject = $subject;
        $this->message = $message;
        $this->contactAddress = $contactAddress;
        $this->attachmentPath = $attachmentPath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // Filling up address information with app name 
        return new Envelope(
            subject: $this->subject,
            from: new Address("no-reply@". $this->appName. ".com", $this->appName . " Team"),
            replyTo: [
                new Address("support@". $this->appName. ".com", "Support Team"),
            ]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'recieve.page',
            with: [
                'appName' => $this->appName,
                'subject' => $this->subject, // Passing data to the Blade view
                'body' => $this->message,
                'contactAddress' => $this->contactAddress,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if ($this->attachmentPath) {
            return [ $this->attachmentPath ];
        }
        
        return [];
    }
}
