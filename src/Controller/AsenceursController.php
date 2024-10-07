<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AsenceursController extends AbstractController
{
    #[Route('/asenceurs', name: 'app_asenceurs')]
    public function index(): Response
    {
        return $this->render('asenceurs/index.html.twig', [
            'controller_name' => 'AsenceursController',
        ]);
    }
}
