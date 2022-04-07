<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SearchType;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'current_menu' => 'accueil'
        ]);
    }

    public function search(Request $request) : Response
    {
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $result=[
                $form->get('keyword')->getData(),
                $form->get('price')->getData(),
                $form->get('surface')->getData(),
                $form->get('room')->getData(),
                $form->get('people')->getData(),
                $form->get('animal')->getData(),
                $form->get('smoker')->getData()
            ];
            return $this->render('search/product.html.twig', [
                'result' => $result,
            ]);
        }

        return $this->renderForm('layouts/partials/_property_search_section.html.twig', [
            'form' => $form,
            ]);
    }
}