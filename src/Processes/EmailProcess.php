<?php

namespace App\Processes;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailProcess
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }
    public function SendConfirmEmail(string $targetEmail){
        $email = (new Email())
        ->from('test@test.com', 'Test Email')
        ->to($targetEmail)
        ->subject('Confirm your email')
        ->text('Please confirm your email by clicking this link: http://localhost:8000/confirm-email')
        ->html('<p>Please confirm your email by clicking this link: http://localhost:8000/confirm-email</p>');

        $this->sendEmail($targetEmail, $email);
    }

    public function sendEmail(string $targetEmail, Email $email)
    {
        $this->mailer->send($email);
    }
}
