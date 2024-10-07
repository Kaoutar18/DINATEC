<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ClimatisationController extends AbstractController
{
    #[Route('/climatisation', name: 'app_climatisation')]
    public function index(): Response
    {
        return $this->render('climatisation/index.html.twig', [
            'controller_name' => 'ClimatisationController',
        ]);
    }
}
