<?php

namespace App\Controller;


use App\Entity\Sports;
use Doctrine\DBAL\Connection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class SportsController extends Controller
{
    /**
     * @Route("/sports", name="sports")
     */
    public function getSports(Connection $connection)
    {

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
