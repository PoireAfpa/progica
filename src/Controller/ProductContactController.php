<?php

namespace App\Controller;

use App\Entity\ProductContact;
use App\Form\ProductContactType;
use App\Repository\ProductContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/product/contact')]
class ProductContactController extends AbstractController
{
    #[Route('/', name: 'app_product_contact_index', methods: ['GET'])]
    public function index(ProductContactRepository $productContactRepository): Response
    {
        return $this->render('product_contact/index.html.twig', [
            'product_contacts' => $productContactRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_product_contact_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProductContactRepository $productContactRepository): Response
    {
        $productContact = new ProductContact();
        $form = $this->createForm(ProductContactType::class, $productContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $productContactRepository->add($productContact);
            return $this->redirectToRoute('app_product_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('product_contact/new.html.twig', [
            'product_contact' => $productContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_product_contact_show', methods: ['GET'])]
    public function show(ProductContact $productContact): Response
    {
        return $this->render('product_contact/show.html.twig', [
            'product_contact' => $productContact,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_product_contact_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ProductContact $productContact, ProductContactRepository $productContactRepository): Response
    {
        $form = $this->createForm(ProductContactType::class, $productContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $productContactRepository->add($productContact);
            return $this->redirectToRoute('app_product_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('product_contact/edit.html.twig', [
            'product_contact' => $productContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_product_contact_delete', methods: ['POST'])]
    public function delete(Request $request, ProductContact $productContact, ProductContactRepository $productContactRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$productContact->getId(), $request->request->get('_token'))) {
            $productContactRepository->remove($productContact);
        }

        return $this->redirectToRoute('app_product_contact_index', [], Response::HTTP_SEE_OTHER);
    }
}
