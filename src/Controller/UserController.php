<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\MailServices;
use Doctrine\DBAL\Connection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\DBAL\Types\IntegerType;
use Twig\Environment;


class UserController extends Controller
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        // replace this line with your own code!
        return $this->render('@Maker/demoPage.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }

    /**
     * @Route("/user/new", name="user_new")
     */
    public function newUser(Request $request, MailServices $mailServices)
    {
        header("Access-Control-Allow-Origin: *");

        $mail = $request->query->get('mail');
        $ip = $_SERVER['REMOTE_ADDR'];


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

        $token = RandomToken(10);

        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy([
                "mail" => $mail
            ]);



        if (!$user) {

            $em = $this->getDoctrine()->getManager();

            $NewUser = new User();

            $NewUser->setMail($mail);
            $NewUser->setTokenAuth($token);
            $NewUser->setIpAdress($ip);
            $em->persist($NewUser);
            $em->flush();


            $mailer = $mailServices;


            if ($mailer->mailConfirmUser($mail, $token)) {
                dump('ok');
            }


            $result = false;
            return new JsonResponse($NewUser->getId(), 200);

        }else{
            $result = true;
            return new JsonResponse($result, 200);

        }




    }


    /**
     * @Route("/user/pincode", name="set_pincode")
     * @Method("POST")
     */
    public function setPassword(Connection $connection,Request $request)
    {


        header("Access-Control-Allow-Origin: *");

        $pincode = $request->request->get('pincode');
        $id = $request->request->get('id');


        $sql = "UPDATE user
                SET pincode = :pincode
                WHERE id = :id";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(':pincode', $pincode);
        $stmt->bindValue(':id', $id);
        $result = $stmt->execute();


        return new JsonResponse($result, 200);



    }


    /**
     * @Route("/user/getuserid/{token}", name="get_user_id")
     */
    public function getUserId(Connection $connection, Request $request, $token)
    {


        header("Access-Control-Allow-Origin: *");





        $result = $connection->fetchAll("SELECT id  FROM user WHERE token_auth = '".$token."'");




        return new JsonResponse($result[0], 200);
    }



    /**
     * @Route("/user/confirm/{token}", name="confirm_token")
     */
    public function confirmUser(Environment $twig, $token)
    {




        return new Response($twig->render('emails/registration.html.twig',[
                'token' => $token
            ]), 200);


    }
}
