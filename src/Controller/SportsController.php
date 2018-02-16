<?php

namespace App\Controller;


use App\Entity\Sports;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class SportsController extends Controller
{
    /**
     * @Route("/sports", name="sports")
     */
    public function getSports()
    {

        $sports = $this->getDoctrine()
            ->getRepository(Sports::class)
            ->findAll();

        if (!$sports) {
            throw $this->createNotFoundException(
                'Aucun sports'
            );
        }




        $data = json_encode($sports);

        dump($data);








        return new JsonResponse($data, 200);

    }



    /**
     * @Route("/sports/new", name="sports_new")
     */
    public function newSports()
    {


    }
}
