<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MailServices;
use Twig\Environment;

class IndexController extends Controller {

    /**
     * @Route("/")
     */
    public function index (Environment $twig,MailServices $mailerService){


        $mail = $mailerService;
        if ($mail->mailTest()) {
            dump('ok');
        }

        return new Response($twig->render('base.html.twig'));
    }


    /**
     * @Route("/mail")
     */
    public function sendEmail( \Swift_Mailer $mailer, Environment $twig){



        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('test@olymp.com')
            ->setTo('jbagostin@gmail.com')
            ->setBody(
                $this->renderView(
                // templates/emails/registration.html.twig
                    'base.html.twig'
                ),
                'text/html'
            )

        ;

        $mailer->send($message);

        return new Response($twig->render('base.html.twig'));
    }


}