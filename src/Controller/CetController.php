<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CetController extends AbstractController
{
    #[Route('/cet', name: 'app_cet')]
    public function index(): Response
    {
        return $this->render('cet/index.html.twig', [
            'controller_name' => 'CetController',
        ]);
    }
}
