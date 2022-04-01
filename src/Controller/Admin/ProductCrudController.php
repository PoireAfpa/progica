<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ProductCrudController extends AbstractCrudController
{
    
    public const PRODUCTS_BASE_PATH = 'upload/images/products';
    public const PRODUCTS_UPLOAD_DIR = 'public/upload/images/products';
    
    public static function getEntityFqcn(): string
    {
        return Product::class;
        
    }
 


    public function configureFields(string $pageName): iterable
    {
        //$owners=$this->entityManager->getRepository(User::class)->findBy([
          //  'roles' => 'ROLE_OWNER']);
        //$contacts=$this->entityManager->getRepository(User::class)->findAll();
      
                yield IdField::new('id')->hideOnForm();
                yield TextField::new('title');
                yield ImageField::new('image')
                    ->setBasePath(self::PRODUCTS_BASE_PATH)
                    ->setUploadDir(self::PRODUCTS_UPLOAD_DIR)
                    ->setSortable(false);
                yield TextEditorField::new('description');
                yield  MoneyField::new('peakSeasonPrice')->setCurrency('EUR');
                yield MoneyField::new('offSeasonPrice')->setCurrency('EUR');
                yield IntegerField::new('surface');
                yield IntegerField::new('room');
                yield IntegerField::new('people');
                yield BooleanField::new('animal')->renderAsSwitch( true, yield MoneyField::new('animalCost')->setCurrency('EUR'));
                yield AssociationField::new('contact');
                yield AssociationField::new('productOwner');
                yield BooleanField::new('smoker');
                yield SlugField::new('slug')->setTargetFieldName('title');
            
     
        
        
    }
  
    
}
