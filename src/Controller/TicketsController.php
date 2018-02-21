<?php

namespace App\Controller;

use App\Entity\Events;
use App\Entity\Tickets;
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
     * @Route("/tickets", name="tickets_new")
     */
    public function selectEvent(Environment $twig)
    {


        $event = $this->getDoctrine()
            ->getRepository(Events::class)
            ->findAll();

        $tickets = $this->getDoctrine()
            ->getRepository(Tickets::class)
            ->findAll();

        dump($tickets);

        return new Response($twig->render('tickets/new.html.twig',  [
            "event" => $event,
        ]));
    }


    /**
     * @Route("/tickets/new", name="tickets_new_id")
     * @Method("POST")
     */
    public function newTickets(Request $request)
    {


        $eventId = $request->request->get('select_event');
        $prix_depart = $request->request->get('prix_depart');
        $nombre_ticket = $request->request->get('nombre_ticket');

        $event = $this->getDoctrine()
            ->getRepository(Events::class)
            ->find($eventId);
        $em = $this->getDoctrine()->getManager();

        for ($i = $nombre_ticket; $i >= 0; $i--){

            $tickets = new Tickets();
            $tickets->setSeatNumber(rand(0, 300));
            $tickets->setStartPrice($prix_depart);
            $tickets->setStatus("N");

            // relates this product to the category
            $tickets->setEvents($event);

            $em->persist($tickets);
        }

        $em->flush();

        return new Response(
            'Saved new product with id: '.$tickets->getId()
            .' and new category with id: '.$event->getId()
        );
    }

}
