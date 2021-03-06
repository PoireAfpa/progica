<?php

namespace App\Controller\Owner;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

/**
 * @IsGranted("ROLE_OWNER")
 */
class ProductCrudController extends AbstractCrudController
{
    
    public const PRODUCTS_BASE_PATH = 'upload/images/products';
    public const PRODUCTS_UPLOAD_DIR = 'public/upload/images/products';
    public const OPTION_NUM_DECIMALS = 'numDecimals';
    
    public static function getEntityFqcn(): string 
    {
        return Product::class;
        
    }
 


    public function configureFields(string $pageName): iterable
    {
        //$owners=$this->entityManager->getRepository(User::class)->findBy(['roles' => 'ROLE_OWNER']);
        //$contacts=$this->entityManager->getRepository(User::class)->findAll();
       


                yield IdField::new('id')->hideOnForm()->hideOnIndex();
                yield TextField::new('title', 'Nom du gîte');
                yield ImageField::new('image')
                    ->setBasePath(self::PRODUCTS_BASE_PATH)
                    ->setUploadDir(self::PRODUCTS_UPLOAD_DIR)
                    ->setSortable(false);
                yield TextEditorField::new('description', 'Description');
                yield MoneyField::new('peakSeasonPrice', 'Prix haute saison')->setCurrency('EUR')->setNumDecimals(0);
                yield MoneyField::new('offSeasonPrice', 'Prix basse saison')->setCurrency('EUR');
                yield IntegerField::new('surface', 'Superficie');
                yield TextField::new('cities','Ville');
                yield IntegerField::new('room', 'Chambres');
                yield IntegerField::new('people', 'Personnes');
                yield BooleanField::new('animal', 'Animaux')->renderAsSwitch( true, yield MoneyField::new('animalCost', 'Supplément animaux')->setCurrency('EUR'));
                yield AssociationField::new('contact', 'Contact');
                yield AssociationField::new('productOwner', 'Propriétaire');
                yield BooleanField::new('smoker', 'Fumeur');
                yield SlugField::new('slug')->setTargetFieldName('title');
            
     
        
        
                
    }
  
    
}
