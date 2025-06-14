<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TwoFactorCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🔐 Votre code de vérification',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.two_factor_code', // ou 'view: ...' si c'est un .blade.php simple
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
