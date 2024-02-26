<?php

namespace App\DataFixtures;

use App\Entity\ArticlePresse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticlePresseFixtures extends Fixture
{
    public const ARTICLESPRESSE = [
        [
            'photo' => 'collier_1.jpg',
            'description' => 'Article sur le collier et sur Perle DO',
            'lien' => 'https://www.yahoo.fr',
            'nom' => 'Perle Do expertise un collier',
            'journal' => 'Yahoo',
        ],
        [
            'photo' => 'bague_diamant.jpg',
        'description' => 'Article sur la bague diamant avec de l\or et sur Perle DO',
        'lien' => 'https://www.lequipe.fr',
        'nom' => 'Perle Do expertise une bague en or sertie d\'un diamant',
        'journal' => 'Lequipe',
        ],
        [
            'photo' => 'boucle_oreille.jpg',
            'description' => 'Article sur les boucles d\'oreille en émeraude et or et sur Perle DO',
            'lien' => 'https://www.lemonde.fr',
            'nom' => 'Perle Do expertise des boucles d\'oreille en émeraude et or',
            'journal' => 'Le Monde',
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::ARTICLESPRESSE as $articlePresse) {
            $article = new ArticlePresse();
            $article->setPhoto($articlePresse['photo']);
            $article->setDescription($articlePresse['description']);
            $article->setLien($articlePresse['lien']);
            $article->setNom($articlePresse['nom']);
            $article->setJournal($articlePresse['journal']);
            $manager->persist($article);
        }

        $manager->flush();
    }
}
