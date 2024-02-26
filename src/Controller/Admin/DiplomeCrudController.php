<?php

namespace App\Controller\Admin;

use App\Entity\Diplome;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DiplomeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Diplome::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomDiplome'),
            DateField::new('date'),
        ];
    }
    
}
