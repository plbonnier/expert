<?php

namespace App\Controller\Admin;

use App\Entity\Vente;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class VenteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vente::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            BooleanField::new('passe'),
            BooleanField::new('futur'),
            DateTimeField::new('dateVente'),
            TextField::new('commissairePriseur'),
            TextField::new('adresse'),
            NumberField::new('codePostal'),
            TextField::new('ville'),
            TextField::new('nomVente'),
            DateTimeField::new('dateExposition'),
            TimeField::new('heureExposition'),
        ];
    }
}
