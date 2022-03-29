<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]

    
    public function index(): Response
    {
        $form=$this->createForm(ContactType::class);
    
        return $this->renderForm('mailer/index.html.twig', [
            'controller_name' => 'MailerController',
            'formulaire' => $form
        ]);
    }



}

