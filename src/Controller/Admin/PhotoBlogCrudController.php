<?php

namespace App\Controller\Admin;

use App\Entity\PhotoBlog;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class PhotoBlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PhotoBlog::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
        TextField::new('description'),
        ImageField::new('photo')
            ->setUploadDir('public/uploads/images/pictures')
            ->setBasePath('uploads/images/pictures')
            ->setLabel('Image')
                ->setRequired(false),
        AssociationField::new('blog')
        ->setCrudController(BlogCrudController::class)
        ];
    }
}
