<?php

namespace App\Controller;

use App\Entity\Events;
use App\Entity\Tickets;
use Doctrine\DBAL\Connection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class TicketsController extends Controller
{

    /**
     * @Route("/tickets", name="tickets_admin")
     */
    public function selectEvent(Connection $connection, Environment $twig)
    {
        header("Access-Control-Allow-Origin: *");


        $event = $this->getDoctrine()
            ->getRepository(Events::class)
            ->findAll();

        $tickets = $connection->fetchAll("SELECT *  FROM tickets INNER JOIN events ON tickets.event_id = events.id");


        return new Response($twig->render('tickets/new.html.twig',  [
            "event" => $event,
            "tickets" => $tickets
        ]));
    }

    /**
     * @Route("/tickets/all", name="tickets_all")
     */
    public function getTickets(Connection $connection)
    {

        header("Access-Control-Allow-Origin: *");


        $tickets = $connection->fetchAll("SELECT *  FROM tickets INNER JOIN events ON tickets.event_id = events.id WHERE status = 'B'");



        return new JsonResponse($tickets, 200);

    }

    /**
     * @Route("/tickets/new", name="tickets_new_id")
     * @Method("POST")
     */
    public function newTickets(Request $request, Connection $connection)
    {

        header("Access-Control-Allow-Origin: *");


        $eventId = $request->request->get('select_event');
        $prix_depart = $request->request->get('prix_depart');
        $nombre_ticket = $request->request->get('nombre_ticket');

        for ($i = $nombre_ticket; $i >= 0; $i--)
        {
            $sql = "INSERT INTO tickets
( start_price, status, seat_number, event_id) VALUES ( :start_price, :status, :seat_number, :event)";

            $stmt = $connection->prepare($sql);

            $stmt->bindValue(':start_price', $prix_depart);
            $stmt->bindValue(':status', "M");
            $stmt->bindValue(':event', $eventId);
            $stmt->bindValue(':seat_number', rand(1, 200));
            $result = $stmt->execute();

        }




        return $this->redirectToRoute('tickets');
    }

    /**
     * @Route("/ticket/{id}", name="ticket")
     */
    public function getTicket(Connection $connection, $id)
    {

        header("Access-Control-Allow-Origin: *");


        $sql = "SELECT * FROM tickets
                INNER JOIN events ON tickets.event_id = events.id
                WHERE tickets.id = :id";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return new JsonResponse($result[0], 200);
        
    }

    /**
     * @Route("/ticket/buyable/{id}", name="tickets_buyable")
     */
    public function buyableTickets(Connection $connection, $id)
    {

        header("Access-Control-Allow-Origin: *");

        $sql = "UPDATE tickets
                SET status = 'B'
                WHERE id = :id";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->execute();


        return new JsonResponse(true, 200);


    }

}
