<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller {

    /**
     * @Route("/")
     */
    public function indexAction(){



        $number = mt_rand(0, 100);

        return $this->render('base.html.twig', array(
            'number' => $number,
        ));
    }

}