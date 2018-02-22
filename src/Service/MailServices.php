<?php
namespace App\Service;

use Twig\Environment;

class MailServices{


    private $mailer;

    private $twig;

    public function __construct(\Swift_Mailer $mailer, Environment $twig)
    {
        $this->mailer = $mailer;

        $this->twig = $twig;
    }


    public function mailTest( $mailTo){
            $message = (new \Swift_Message());
            $message->setFrom('contact@valentinchevreau.fr');
            $message->setTo('jbagostin@gmail.com');
            $message->setPriority(3);
            $message->setCharset("utf-8");
            $message->setSubject("Message super important");
            $message->setReplyTo("contact@valentinchevreau.fr");
            $message->setContentType('text/html');
            $message->setBody(
                $this->twig->render(
                // templates/emails/registration.html.twig
                    'emails/registration.html.twig'),
                'text/html');

        return $this->mailer->send($message);
    }


    public function mailConfirmUser($to)
    {
        $message = (new \Swift_Message());
        $message->setFrom('contact@valentinchevreau.fr');
        $message->setTo('jbagostin@gmail.com');
        $message->setPriority(1);
        $message->setCharset("utf-8");
        $message->setSubject("Message super important");
        $message->setReplyTo("contact@valentinchevreau.fr");
        $message->setContentType('text/html');
        $message->setBody(
            $this->twig->render(
            // templates/emails/registration.html.twig
                'emails/registration.html.twig'),
            'text/html');

        return $this->mailer->send($message);
    }
}