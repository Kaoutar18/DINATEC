<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PaterieController extends AbstractController
{
    #[Route('/paterie', name: 'app_paterie')]
    public function index(): Response
    {
        return $this->render('paterie/index.html.twig', [
            'controller_name' => 'PaterieController',
        ]);
    }
}
