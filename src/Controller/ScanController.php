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


        $scan = $connection->fetchAll('SELECT * FROM tickets');


        if (!$scan) {
            throw $this->createNotFoundException(
                'Aucun sports'
            );
        }

        else {

        return new JsonResponse($scan, 200);
        return new Response($twig->render('scan/index.html.twig'));
        }

    }
}