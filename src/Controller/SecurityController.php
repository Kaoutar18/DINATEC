<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Psr\Log\LoggerInterface;

class SecurityController extends AbstractController
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            // Si l'utilisateur est connecté, redirection selon son rôle
            if (in_array('ROLE_ADMIN', $this->getUser()->getRoles())) {
                return $this->redirectToRoute('admin');
            }
        }
        // Récupérer l'erreur d'authentification, le cas échéant
        $error = $authenticationUtils->getLastAuthenticationError();
        if ($error) {
            // Journaliser l'erreur en cas d'échec de l'authentification
            $this->logger->error('Login failed: ' . $error->getMessage(), ['exception' => $error]);
        }

        // Récupérer le dernier nom d'utilisateur entré
        $lastUsername = $authenticationUtils->getLastUsername();

        // Rendre le template de login avec les données nécessaires
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('...')
            ->setDateFormat('...')// ...
            ;
    }
}