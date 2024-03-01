<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\PhotoUserType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email'),
            ChoiceField::new('roles')
                ->setChoices([
                    'Admin' => 'ROLE_ADMIN',
                    'User' => 'ROLE_USER',
                ])
                ->allowMultipleChoices(),
            TextField::new('password')->hideOnIndex(),
            TextField::new('nom'),
            TextField::new('prenom'),
            TextEditorField::new('description'),
            CollectionField::new('photoUsers')
                ->setEntryType(PhotoUserType::class)
                ->setFormTypeOptions(['by_reference' => false])
                ->setEntryIsComplex(true)
                ->setLabel('Photos du User')
                // ->formatValue(function ($value) {
                    // Convertissez les objets photoBlog en chaînes de description
                    // return array_map(function ($photoUser) {
                        // return (string) $photoUser; // Ici, la méthode __toString() de PhotoBlog est utilisée
                    // }, $value);
                // }),
        ];
    }
}
