<?php
namespace App\Service;

class MailServices{


    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }


    public function mailTest(){




            $message = (new \Swift_Message());
            $message->setFrom('jb@valentinchevreau.fr');
            $message->setTo('jbagostin@gmail.com');
            $message->setPriority(3);
            $message->setCharset("utf-8");
            $message->setSubject("Message super important");
            $message->setReplyTo("contact@valentinchevreau.fr");
            $message->setContentType('text/plain');
            $message->addPart(
                'Someone just updated the site. We told them: '
            );


        return $this->mailer->send($message) > 0;
    }
}