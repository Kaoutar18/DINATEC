<?php
namespace App\Controller\Admin;

use App\Repository\UserRepository;
use App\Repository\ContactRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    private $userRepository;
    private $contactRepository;

    public function __construct(UserRepository $userRepository, ContactRepository $contactRepository)
    {
        $this->userRepository = $userRepository;
        $this->contactRepository = $contactRepository;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Récupération des données
        $users = $this->userRepository->findAll();
        $contacts = $this->contactRepository->findAll();

        // Compte des utilisateurs et contacts
        $usersCount = $this->userRepository->count([]);
        $contactsCount = $this->contactRepository->count([]);

        // Passer les données à la vue Twig
        return $this->render('dashboard/base.html.twig', [
            'users' => $users,
            'contacts' => $contacts,
            'usersCount' => $usersCount,
            'contactsCount' => $contactsCount,
        ]);
    }

public function configureDashboard(): Dashboard
{
return Dashboard::new()
->setTitle('DINATEC');
}

public function configureMenuItems(): iterable
{
yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
}
}
