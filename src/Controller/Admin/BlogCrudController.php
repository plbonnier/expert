<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use App\Form\PhotoBlogType; // Assurez-vous d'importer PhotoBlogType
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField; // Importez CollectionField
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

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
            UrlField::new('lienVideo'),
            DateField::new('date'),
            CollectionField::new('photoBlogs')
                ->setEntryType(PhotoBlogType::class)
                ->setFormTypeOptions(['by_reference' => false])
                ->setEntryIsComplex(true)
                ->setLabel('Photos du blog')
                // ->formatValue(function ($value) {
                // Convertissez les objets photoBlog en chaînes de description
                // return array_map(function ($photoBlog) {
                    // return (string) $photoBlog; // Ici, la méthode __toString() de PhotoBlog est utilisée
                // }, $value);
                // }),
        ];
    }
}
