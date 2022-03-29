<?php

namespace App\Controller;

use App\Repository\CitiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(CitiesRepository $citiesRepository): Response
    {
        return $this->render('default/index.html.twig', [
            'current_menu' => 'accueil',
            'cities' => $citiesRepository-> findAll()
        ]);
    }
}
