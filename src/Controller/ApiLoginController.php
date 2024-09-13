<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class ApiLoginController extends AbstractController
{
    #[Route('/api/login', name: 'app_api_login', methods: ['POST'])]
    public function index(#[CurrentUser] ?UserInterface $user): JsonResponse
    {
        if (null === $user) {
            return $this->json([
                'message' => 'Missing credentials',
            ], Response::HTTP_UNAUTHORIZED);
        }

        // Génère ton token ici (par exemple avec JWT)
        $token = 'generated_api_token'; // Remplace par la vraie logique de création de token

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'user' => $user->getUserIdentifier(),
            'token' => $token,
        ]);
    }
}
