<?php

namespace App\Controller\Admin;

use App\Entity\ArticlePresse;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticlePresseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ArticlePresse::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('description'),
            TextField::new('lien'),
            TextField::new('nom'),
            DateField::new('date'),
            TextField::new('journal'),
        ];
    }
    
}
