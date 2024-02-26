<?php

namespace App\Controller\Admin;

use App\Entity\Lot;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LotCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Lot::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('vente'),
            TextField::new('nom'),
            NumberField::new('lotNumero'),
            TextEditorField::new('description'),
            MoneyField::new('estimationBasse')->setCurrency('EUR'),
            MoneyField::new('estimationHaute')->setCurrency('EUR'),
            BooleanField::new('vendu'),
            TextField::new('taille'),
            TextField::new('poids'),
            TextField::new('materiaux'),
            TextField::new('pierre'),
            BooleanField::new('certificat'),
            ImageField::new('photo'),
            DateField::new('date'),
            MoneyField::new('prixVendu')->setCurrency('EUR'),
        ];
    }
}
