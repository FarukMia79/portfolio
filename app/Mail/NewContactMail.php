<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $contact;
    public $replyText;

    /**
     * $replyText = null makes it optional
     */
    public function __construct($contact, $replyText = null)
    {
        $this->contact = $contact;
        $this->replyText = $replyText;
    }

    /**
     * Set email subject
     */
    public function envelope(): Envelope
    {
        // if replyText exists, use one subject, otherwise use another
        $subject = $this->replyText 
            ? 'Reply to your inquiry: ' . $this->contact->subject 
            : 'New Portfolio Message from: ' . $this->contact->name;

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Set blade file path
     */
    public function content(): Content
    {
        return new Content(
            // if replyText exists, use reply_message view, otherwise use contact_notification view
            view: $this->replyText ? 'emails.reply_message' : 'emails.contact_notification', 
        );
    }

    public function attachments(): array
    {
        return [];
    }
}