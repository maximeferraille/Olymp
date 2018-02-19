<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class EventsController extends Controller
{
    /**
     * @Route("/events", name="events")
     */
    public function allEvents(Connection $connection)
    {

        $events = $connection->fetchAll("SELECT * FROM events");


        if (!$events) {
            throw $this->createNotFoundException(
                'Aucun evenements'
            );
        }


        return new JsonResponse($events, 200);


    }





}
