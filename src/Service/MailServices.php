<?php
namespace App\Service;

class MailServices{


    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }


    public function mailTest(){




        $message =  $message = (new \Swift_Message('test mail'));
            $message->setFrom('jb@valentinchevreau.fr');
            $message->setTo('jbagostin@gmail.com');
            $message->addPart(
                'Someone just updated the site. We told them: '
            );

        return $this->mailer->send($message) > 0;
    }
}