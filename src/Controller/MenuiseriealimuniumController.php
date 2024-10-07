<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MenuiseriealimuniumController extends AbstractController
{
    #[Route('/menuiseriealimunium', name: 'app_menuiseriealimunium')]
    public function index(): Response
    {
        return $this->render('menuiseriealimunium/index.html.twig', [
            'controller_name' => 'MenuiseriealimuniumController',
        ]);
    }
}
