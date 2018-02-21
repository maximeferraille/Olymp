<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ScanController extends Controller
{
    /**
     * @Route("/scan", name="scan")
     */
    public function index()
    {

        header("Access-Control-Allow-Origin: *");

        $id_ticket = $_GET['id_ticket'];
        $scan = $connection->fetchAll('SELECT * FROM tickets where id_ticket=?", $id_ticket');


        if (!$scan) {
            throw $this->createNotFoundException(
                'Ticket Invalide'
            );
        }

        else {

        //return new JsonResponse($scan, 200);
        return new Response($twig->render('scan/index.html.twig'));
        }

    }
}