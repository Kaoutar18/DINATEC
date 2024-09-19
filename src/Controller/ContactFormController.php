<?php
namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ContactFormController extends AbstractController
{
#[Route('/contact_form', name: 'app_contact_form')]
public function index(Request $request): Response
{
$contact = new Contact();
$form = $this->createForm(ContactFormType::class, $contact);

$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->persist($contact);
$entityManager->flush();

if ($request->isXmlHttpRequest()) {
// Réponse JSON pour les requêtes AJAX
return new JsonResponse(['status' => 'success', 'message' => 'Votre message a été envoyé avec succès.']);
}

// Réponse HTML pour les requêtes normales
return $this->render('contact_form/index.html.twig', [
'form' => $form->createView(),
'message' => 'Votre message a été envoyé avec succès.'
]);
}

return $this->render('contact_form/index.html.twig', [
'form' => $form->createView(),
]);
}
}
