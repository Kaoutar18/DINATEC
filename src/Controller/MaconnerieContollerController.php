<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MaconnerieContollerController extends AbstractController
{
    #[Route('/Maçonnerie ', name: 'app_maconnerie_contoller')]
    public function index(): Response
    {
        return $this->render('tce/maconnerie/index.html.twig', [
            'controller_name' => 'MaconnerieContollerController',
        ]);
    }
}
