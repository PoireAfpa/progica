<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController{

    #[Route('/product/search', name: 'app_product_search', methods: ['GET'])]
    public function searchProduct(Request $request){
        return $this->render('search/product.html.twig');
    }


}


