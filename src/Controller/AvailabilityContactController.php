<?php

namespace App\Controller;

use App\Entity\AvailabilityContact;
use App\Form\AvailabilityContactType;
use App\Repository\AvailabilityContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/availability/contact')]
class AvailabilityContactController extends AbstractController
{
    #[Route('/', name: 'app_availability_contact_index', methods: ['GET'])]
    public function index(AvailabilityContactRepository $availabilityContactRepository): Response
    {
        return $this->render('availability_contact/index.html.twig', [
            'availability_contacts' => $availabilityContactRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_availability_contact_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AvailabilityContactRepository $availabilityContactRepository): Response
    {
        $availabilityContact = new AvailabilityContact();
        $form = $this->createForm(AvailabilityContactType::class, $availabilityContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $availabilityContactRepository->add($availabilityContact);
            return $this->redirectToRoute('app_availability_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('availability_contact/new.html.twig', [
            'availability_contact' => $availabilityContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_availability_contact_show', methods: ['GET'])]
    public function show(AvailabilityContact $availabilityContact): Response
    {
        return $this->render('availability_contact/show.html.twig', [
            'availability_contact' => $availabilityContact,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_availability_contact_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AvailabilityContact $availabilityContact, AvailabilityContactRepository $availabilityContactRepository): Response
    {
        $form = $this->createForm(AvailabilityContactType::class, $availabilityContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $availabilityContactRepository->add($availabilityContact);
            return $this->redirectToRoute('app_availability_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('availability_contact/edit.html.twig', [
            'availability_contact' => $availabilityContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_availability_contact_delete', methods: ['POST'])]
    public function delete(Request $request, AvailabilityContact $availabilityContact, AvailabilityContactRepository $availabilityContactRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$availabilityContact->getId(), $request->request->get('_token'))) {
            $availabilityContactRepository->remove($availabilityContact);
        }

        return $this->redirectToRoute('app_availability_contact_index', [], Response::HTTP_SEE_OTHER);
    }
}
