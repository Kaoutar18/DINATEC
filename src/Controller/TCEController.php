<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TCEController extends AbstractController
{
    #[Route('/tce', name: 'app_t_c_e')]
    public function index(): Response
    {
        return $this->render('tce/index.html.twig', [
            'controller_name' => 'TCEController',
        ]);
    }
}
