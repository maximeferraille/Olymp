<?php

namespace App\Controller;

use App\Entity\Sports;
use Doctrine\DBAL\Connection;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Flex\Response;
use Twig\Environment;

class SportsController extends Controller
{
    /**
     * @Route("/sports", name="sports")
     */
    public function getSports(Connection $connection)
    {


        header("Access-Control-Allow-Origin: *");


        $sports = $connection->fetchAll('SELECT * FROM sports');


        if (!$sports) {
            throw $this->createNotFoundException(
                'Aucun sports'
            );
        }

        return new JsonResponse($sports, 200);

    }



    /**
     * @Route("/sports/new", name="sports_new")
     */
    public function newSports()
    {


    }
}

/**
 * @Route("/sports/list", name="sports_list")

public function listSports(Environment $twig)
{
    return new Response($twig->render('sports/list_sports.twig'));

}*/