<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Blog::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            TextEditorField::new('article'),
            TextField::new('lienVideo'),
            DateField::new('date'),
        ];
    }
    
}
