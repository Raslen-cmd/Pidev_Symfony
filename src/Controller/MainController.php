<?php

namespace App\Controller;

use App\Entity\Utilisateur;
//use App\Repository\ClassroomRepository;
use App\Form\UtilisateurType;
use App\Controller\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{


    /**
     * @Route("/front", name="front")
     */
    public function front(): Response
    {
        return $this->render(
            'base-front.html.twig'
        );
    }

    /**
     * @Route("/back", name="back")
     */
    public function back(): Response
    {
        return $this->render(
            'base-back.html.twig'
        );
    }
}
