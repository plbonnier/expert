<?php

namespace App\Form;

use App\Entity\PhotoBlog;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PhotoBlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true, // Affiche un checkbox pour supprimer l'image (non obligatoire)
                'delete_label' => 'Supprimer l\'image', // Texte du checkbox
                'download_uri' => false, // Désactive le lien de téléchargement
                'image_uri' => true, // Affiche l'aperçu de l'image
                'label' => 'Image (JPEG/PNG)',
            ])
            ->add('description');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PhotoBlog::class,
        ]);
    }
}
