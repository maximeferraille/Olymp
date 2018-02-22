<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MailServices;
use Twig\Environment;

class IndexController extends Controller {

    /**
     * @Route("/{mail}")
     */
    public function index (Environment $twig,MailServices $mailerService, $mail){


        $mail = $mailerService;


        if ($mail->mailTest($mail)) {
            dump('ok');
        }

        return new Response($twig->render('base.html.twig'));
    }


    /**
     * @Route("/mail")
     */
    public function sendEmail( \Swift_Mailer $mailer, Environment $twig){




        $to      = 'Jbagostin@gmail.com';
        $subject = 'le sujet';
        $message = 'Bonjour !';
        $headers = 'From: jb@achatcentrale.fr' . "\r\n" .
            'Reply-To: jb@achatcentrale.fr' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);



        return new Response($twig->render('base.html.twig'));
    }


}