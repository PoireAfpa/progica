<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\OptionCost;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class OptionCostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OptionCost::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
     
            yield IdField::new('id')->hideOnForm();
            yield NumberField::new('price');
            yield AssociationField::new('option');
            yield AssociationField::new('product');
           
      
    }
    
}
