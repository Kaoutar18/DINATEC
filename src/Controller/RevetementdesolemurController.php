<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RevetementdesolemurController extends AbstractController
{
    #[Route('/revetementdesolemur', name: 'app_revetementdesolemur')]
    public function index(): Response
    {
        return $this->render('revetementdesolemur/index.html.twig', [
            'controller_name' => 'RevetementdesolemurController',
        ]);
    }
}
