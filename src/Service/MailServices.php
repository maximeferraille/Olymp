<?php
namespace App\Service;

class MailServices{


    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }


    public function mailTest(){




        $message = (new \Swift_Message('test mail'));
            $message->setFrom('jb@valentinchevreau.fr');
            $message->setTo('jbagostin@gmail.com');
            $message->addPart(
                'Someone just updated the site. We told them: '
            );

        $headers = $message->getHeaders();
        $headers->addIdHeader('Message-ID', "b3eb7202-d2f1-11e4-b9d6-1681e6b88ec1@domain.com");
        $headers->addTextHeader('MIME-Version', '1.0');
        $headers->addTextHeader('X-Mailer', 'PHP v' . phpversion());
        $headers->addParameterizedHeader('Content-type', 'text/html', ['charset' => 'utf-8']);

        return $this->mailer->send($message) > 0;
    }
}