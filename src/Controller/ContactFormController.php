<?php
namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Email;


class ContactFormController extends AbstractController
{
    #[Route('/contact_form', name: 'app_contact_form')]
    public function index(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrer le contact dans la base de données
            $entityManager->persist($contact);
            $entityManager->flush();


            // Envoyer l'email de confirmation
            $this->sendContactEmail($mailer, $contact);

            // Message de confirmation
            $this->addFlash('success', 'Votre message a été envoyé avec succès.');

            // Rediriger pour éviter la double soumission du formulaire
            return $this->redirectToRoute('app_contact_form');
        }

        return $this->render('contact_form/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    public function sendContactEmail(MailerInterface $mailer,Contact $contact)
    {
        {
            // Création de l'email
            $email = (new Email())
                ->from('kawtar.assad18@gmail.com') // Remplacez par l'adresse de l'expéditeur
                ->to('kawtar.assad18@gmail.com') // Adresse de destination
                ->subject('Nouveau message depuis le formulaire de contact')
                ->text('Vous avez reçu un nouveau message.')
                ->html('<p>Nom : ' . $contact->getNom() . '</p>
                    <p>Numero de Telephone : ' . $contact->getNumero() . '</p>
                      <p>Email : ' . $contact->getMail() . '</p>
                    <p>Message : ' . $contact->getMessage() . '</p>');

            // Envoi de l'email
            $mailer->send($email);
        }
    }
}
