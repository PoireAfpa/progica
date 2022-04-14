<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Option;
use App\Entity\Contact;
use App\Entity\Product;
use App\Entity\OptionCost;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\ContactCrudController;
use App\Controller\Admin\ProductCrudController;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }
    #[Route('/admin', name: 'admin')]
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
        yield MenuItem::linkToRoute('Home', 'fa fa-home', 'app_default');

   

        yield MenuItem::subMenu('Products', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Product', 'fas fa-plus', Product::class)->setAction(Crud::PAGE_NEW)->setController(ProductCrudController::class),
            MenuItem::linkToCrud('Show Products', 'fas fa-eye', Product::class)->setController(ProductCrudController::class)
        ]);

     

        yield MenuItem::subMenu('Options', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Show Options', 'fas fa-eye', OptionCost::class)
        ]);

     

        yield MenuItem::subMenu('Contact Gite', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Contact', 'fas fa-plus', Contact::class)->setAction(Crud::PAGE_NEW)->setController(ContactCrudController::class),
            MenuItem::linkToCrud('Show Contacts', 'fas fa-eye', Contact::class)->setController(ContactCrudController::class)
        ]);

     

        yield MenuItem::subMenu('User', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create User', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Users', 'fas fa-eye', User::class)
        ]);
       

     
    }
}
