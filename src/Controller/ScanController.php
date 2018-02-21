<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Twig\Environment;

class ScanController extends Controller
{
    /**
     * @Route("/scan", name="scan")
     */
    public function index(Environment $twig, Connection $connection)
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