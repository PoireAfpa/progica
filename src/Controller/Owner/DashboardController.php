<?php

namespace App\Controller\Owner;


use App\Entity\Contact;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Owner\ProductCrudController;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }
    #[Route('/owner', name: 'owner')]
    public function index(): Response
    {
        $url=$this->adminUrlGenerator->setController(ProductCrudController::class)->generateUrl();
     
        return $this->redirect($url);
       
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Progica');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Acceuil', 'fa fa-home');

        yield MenuItem::section('Gîte');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer une annonce', 'fas fa-plus', Product::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les annonces', 'fas fa-eye', Product::class)
        ]);

        yield MenuItem::section('Contact Gîte');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer un contact', 'fas fa-plus', Contact::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les contacts', 'fas fa-eye', Contact::class)
        ]);

       

     
    }
}
