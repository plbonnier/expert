<?php

namespace App\Controller\Admin;

use App\Entity\PhotoUser;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PhotoUserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PhotoUser::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('photo')
                ->setUploadDir('public/uploads/images/pictures')
                ->setBasePath('uploads/images/pictures')
                ->setLabel('Image')
                ->setRequired(false),
            AssociationField::new('user')
            ->setCrudController(UserCrudController::class),

            TextField::new('description'),
        ];
    }
}
