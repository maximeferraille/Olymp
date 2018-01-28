<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class LinksController extends Controller {

    /**
     * @Route("/user/create/",name="create_user_first")
     */
    public function createAction(Environment $twig, Request $request)
    {

        $mail = $request->query->get('mail');


        function RandomToken($length = 32){
            if(!isset($length) || intval($length) <= 8 ){
                $length = 32;
            }
            if (function_exists('random_bytes')) {
                return bin2hex(random_bytes($length));
            }
            if (function_exists('mcrypt_create_iv')) {
                return bin2hex(mcrypt_create_iv($length, MCRYPT_DEV_URANDOM));
            }
            if (function_exists('openssl_random_pseudo_bytes')) {
                return bin2hex(openssl_random_pseudo_bytes($length));
            }
        }





        $em = $this->getDoctrine()->getManager();
        $user = new User();

        $user->setMail($mail);
        $user->setTokenAuth(RandomToken(10));
        $user->setIpAdress($_SERVER['REMOTE_ADDR']);




        $em->persist($user);

        $em->flush();


        return new Response($twig->render('base.html.twig'));

    }

}