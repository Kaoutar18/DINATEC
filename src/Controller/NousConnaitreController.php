<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NousConnaitreController extends AbstractController
{
    #[Route('/nous_connaitre', name: 'app_nous_connaitre')]
    public function index(): Response
    {
        return $this->render('nous_connaitre/index.html.twig', [
            'controller_name' => 'NousConnaitreController',
        ]);
    }
}
