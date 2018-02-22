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

        header("Access-Control-Allow-Origin: *");


        $events = $connection->fetchAll("SELECT * FROM events");


        if (!$events) {
            throw $this->createNotFoundException(
                'Aucun evenements'
            );
        }
        
        return new JsonResponse($events, 200);


    }


    /**
     * @Route("/tickets/events/{id}", name="ticket_events")
     */
    public function ticketsByevents(Connection $connection, $id)
    {

        header("Access-Control-Allow-Origin: *");


        $sql = "SELECT *
                FROM events
                LEFT OUTER JOIN tickets ON events.id = tickets.event_id
                WHERE event_id = ".$id."
                AND tickets.status = 'M'";



        $events = $connection->fetchAll($sql);


        if (!$events) {
            throw $this->createNotFoundException(
                'Aucun evenements'
            );
        }

        return new JsonResponse($events, 200);
    }


}
