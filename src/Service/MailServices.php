<?php
namespace App\Service;

class MailServices{


    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }


    public function mailTest(){
        $messages = [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
        ];

        $index = array_rand($messages);


        $message =  $message = (new \Swift_Message('test mail'));
            $message->setFrom('jb@olymp.com');
            $message->setTo('jbagostin@gmail.com');
            $message->addPart(
                'Someone just updated the site. We told them: '
            );

        return $this->mailer->send($message) > 0;
    }
}