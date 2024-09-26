<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CesController extends AbstractController
{
    #[Route('/ces', name: 'app_ces')]
    public function index(): Response
    {
        return $this->render('ces/index.html.twig', [
            'controller_name' => 'CesController',
        ]);
    }
}
