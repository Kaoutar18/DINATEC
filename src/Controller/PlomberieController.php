<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PlomberieController extends AbstractController
{
    #[Route('/.</p>', name: 'app_plomberie')]
    public function index(): Response
    {
        return $this->render('plomberie/index.html.twig', [
            'controller_name' => 'PlomberieController',
        ]);
    }
}
