<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Service\Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]

    public function index(Request $request, Mailer $mailer): Response
    {
        $form=$this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            $data=$form->getData();
            $email=$data['email'];
            $mailer->sendEmail();

            return $this->render('mailer/success.html.twig', [
                'email' => $email
            ]);
        }else{
            return $this->renderForm('mailer/index.html.twig', [
                'controller_name' => 'MailerController',
                'formulaire' => $form
            ]);
        }
        
    }
}