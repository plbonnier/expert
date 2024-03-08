<?php

namespace App\DataFixtures;

use App\Entity\Lot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class LotFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(private SluggerInterface $slugger)
    {
    }
    public const LOTS = [
        [
            'nom' => 'Bague en diamant',
            'lotNumero' => 1,
            'description' => 'Description du lot 1',
            'estimationBasse' => 100,
            'estimationHaute' => 200,
            'vendu' => true,
            'prixVendu' => 300,
            'taille' => 'bague taille 42',
            'poids' => '15 grammes',
            'materiaux' => 'or 18 carats',
            'pierre' => 'diamant - 1 carat',
            'certificat' => true,
            'photo' => 'bague_diamant.jpg',
            'vente' => 'vente_10/07/2023 10:00:00',
        ],
        [
            'nom' => 'Bague rubis',
            'lotNumero' => 2,
            'description' => 'Description du lot 2',
            'estimationBasse' => 200,
            'estimationHaute' => 400,
            'vendu' => true,
            'prixVendu' => 350,
            'taille' => 'Bague taille 50',
            'poids' => '20 grammes',
            'materiaux' => 'or blanc 18 carats',
            'pierre' => 'rubis - 2 carats',
            'certificat' => false,
            'photo' => 'bague_rubis.jpg',
            'vente' => 'vente_10/07/2023 10:00:00',
        ],
        [
            'nom' => 'Bague saphir et or rose',
            'lotNumero' => 3,
            'description' => 'Description du lot 3',
            'estimationBasse' => 50,
            'estimationHaute' => 100,
            'vendu' => true,
            'prixVendu' => 150,
            'taille' => 'bague taille 48',
            'poids' => '20 grammes',
            'materiaux' => 'or rose 18 carats',
            'pierre' => 'saphir - 1 carat',
            'certificat' => false,
            'photo' => 'bague_saphir.jpg',
            'vente' => 'vente_10/07/2023 10:00:00',
        ],
        [
            'nom' => 'Boucles d\'oreille émeraude',
            'lotNumero' => 4,
            'description' => 'Description du lot 4',
            'estimationBasse' => 300,
            'estimationHaute' => 600,
            'vendu' => true,
            'prixVendu' => 500,
            'taille' => 'boucles d\'oreille diametre 5mm',
            'poids' => '10 grammes',
            'materiaux' => 'or jaune 18 carats',
            'pierre' => 'émeraude - 1 carat',
            'certificat' => true,
            'photo' => 'boucle_oreille_emeraude.jpg',
            'vente' => 'vente_10/07/2023 10:00:00',
        ],
        [
            'nom' => 'Boucles d\'oreille saphir',
            'lotNumero' => 5,
            'description' => 'Description du lot 5',
            'estimationBasse' => 500,
            'estimationHaute' => 1000,
            'vendu' => false,
            'prixVendu' => null,
            'taille' => 'boucles d\'oreille pendant 5cm',
            'poids' => '20 grammes',
            'materiaux' => 'or 18 carats',
            'pierre' => 'saphir - 2 carats',
            'certificat' => true,
            'photo' => 'boucle_oreille_saphir.jpg',
            'vente' => 'vente_03/05/2024 10:00:00',
        ],
        [
            'nom' => 'Collier multi-pierre',
            'lotNumero' => 6,
            'description' => 'Description du lot 6',
            'estimationBasse' => 1500,
            'estimationHaute' => 2000,
            'vendu' => false,
            'prixVendu' => null,
            'taille' => 'collier 40cm',
            'poids' => '40 grammes',
            'materiaux' => 'or blanc 24 carats',
            'pierre' => 'rubis - 3 carats, diamant - 2 carats, saphir - 2 carats, émeraude - 2 carats',
            'certificat' => false,
            'photo' => 'collier_1.jpg',
            'vente' => 'vente_03/05/2024 10:00:00',
        ],
        [
            'nom' => 'Collier rubis et diamant',
            'lotNumero' => 7,
            'description' => 'Description du lot 7',
            'estimationBasse' => 1000,
            'estimationHaute' => 1500,
            'vendu' => false,
            'prixVendu' => null,
            'taille' => 'collier 50cm',
            'poids' => '50 grammes',
            'materiaux' => 'or 18 carats',
            'pierre' => 'rubis - 6 carats, diamant - 3 carats',
            'certificat' => true,
            'photo' => 'collier_2.jpg',
            'vente' => 'vente_03/05/2024 10:00:00',
        ],
        [
            'nom' => 'Collier grenat et diamant',
            'lotNumero' => 7,
            'description' => 'Description du lot 8',
            'estimationBasse' => 1400,
            'estimationHaute' => 1900,
            'vendu' => false,
            'prixVendu' => null,
            'taille' => 'collier 50cm',
            'poids' => '50 grammes',
            'materiaux' => 'or 18 carats',
            'pierre' => 'grenat - 6 carats, diamant - 3 carats',
            'certificat' => true,
            'photo' => 'collier_3.jpg',
            'vente' => 'vente_03/05/2024 10:00:00',
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::LOTS as $data) {
            $lot = new Lot();
            $lot->setNom($data['nom']);
            $slug = $this->slugger->slug($data['nom']);
            $lot->setSlug($slug);
            $lot->setLotNumero($data['lotNumero']);
            $lot->setDescription($data['description']);
            $lot->setEstimationBasse($data['estimationBasse']);
            $lot->setEstimationHaute($data['estimationHaute']);
            $lot->setVendu($data['vendu']);
            $lot->setPrixVendu($data['prixVendu']);
            $lot->setTaille($data['taille']);
            $lot->setPoids($data['poids']);
            $lot->setMateriaux($data['materiaux']);
            $lot->setPierre($data['pierre']);
            $lot->setCertificat($data['certificat']);
            $lot->setPhoto($data['photo']);
            $lot->setVente($this->getReference($data['vente']));
            $manager->persist($lot);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            VenteFixtures::class,
        ];
    }
}
