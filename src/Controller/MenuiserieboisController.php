<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MenuiserieboisController extends AbstractController
{
    #[Route('/menuiseriebois', name: 'app_menuiseriebois')]
    public function index(): Response
    {
        return $this->render('menuiseriebois/index.html.twig', [
            'controller_name' => 'MenuiserieboisController',
        ]);
    }
}
