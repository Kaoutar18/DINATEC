<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactFormType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
$builder
->add('nom', TextType::class, [
'attr' => ['placeholder' => 'Nom'],
'label' => false
])
->add('numero', TextType::class, [
'attr' => ['placeholder' => 'Numéro de téléphone'],
'label' => false
])
->add('mail', EmailType::class, [
'attr' => ['placeholder' => 'Email'],
'label' => false
])
->add('message', TextareaType::class, [
'attr' => ['placeholder' => 'Message'],
'label' => false
]);}



public function configureOptions(OptionsResolver $resolver): void
{
$resolver->setDefaults([
'data_class' => Contact::class,
]);
}
}
