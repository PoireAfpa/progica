<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SearchType;
use App\Entity\Product;
use App\Entity\Search;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(ProductRepository $productRepository, Request $request): Response
    {
        $data=new Search();
        $form=$this->createForm(SearchType::class, $data);
        $form->handleRequest($request);
       

        if($form->isSubmitted() && $form->isValid()){
        $search=$form->getData();
        $products = $productRepository->findAllSearch($search);
       
        return $this->render('product/index.html.twig', [
            'products' => $products,
            
            'form'=>$form->createView()
        ]);
    }
    else{
        return $this->render('default/index.html.twig', [
            'current_menu' => 'accueil'
        ]);
    }
    }

    #[Route('/product/search', name: 'app_product_search', methods: ['GET'])]
    public function search(Request $request, ProductRepository $productRepository): Response
    {
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);
        $form->handleRequest($request);

        $search = $productRepository->findAllSearch($search);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $search=[
                $form->get('keyword')->getData(),
                $form->get('maxPrice')->getData(),
                $form->get('minSurface')->getData(),
                $form->get('minRoom')->getData(),
                $form->get('minPeople')->getData(),
                $form->get('pet')->getData(),
                $form->get('smoker')->getData()
            ];

            return $this->render('search/product.html.twig', [
                'search' => $search,
            ]);

            return $this->redirectToRoute('app_product_index');
        }

        return $this->renderForm('layouts/partials/_property_search_section.html.twig', [
            'search' => $search,
            'form' => $form
        ]);
    }

}