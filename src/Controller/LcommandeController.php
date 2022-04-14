<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LcommandeController extends AbstractController
{
    /**
     * @Route("/lcommande", name="app_lcommande")
     */
    public function index(): Response
    {
        return $this->render('lcommande/index.html.twig', [
            'controller_name' => 'LcommandeController',
        ]);
    }
}
