<?php

namespace App\DataFixtures;

use App\Entity\Vente;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;

class VenteFixtures extends Fixture
{
    public const VENTES = [
        [
            'passe' => true,
            'futur' => false,
            'dateVente' => '05/05/2021 10:00:00',
            'commissairePriseur' => 'Millon',
            'adresse' => 'Drouot',
            'codePostal' => '75009',
            'ville' => 'Paris',
            'nomVente' => 'Vente de printemps 2021',
            'dateExposition' => '03/05/2021',
            'heureExposition' => '10h-18h',
        ],
        [
            'passe' => true,
            'futur' => false,
            'dateVente' => '05/06/2022 10:00:00',
            'commissairePriseur' => 'Sotheby\'s',
            'adresse' => 'Rue de Rivoli',
            'codePostal' => '75001',
            'ville' => 'Paris',
            'nomVente' => 'Vente d\'été 2022',
            'dateExposition' => '03/06/2022',
            'heureExposition' => '10h-18h',
        ],
        [
            'passe' => true,
            'futur' => false,
            'dateVente' => '10/07/2023 10:00:00',
            'commissairePriseur' => 'Christie\'s',
            'adresse' => 'Rue de Rivoli',
            'codePostal' => '75001',
            'ville' => 'Paris',
            'nomVente' => 'Vente d\'été 2023',
            'dateExposition' => '08/07/2023',
            'heureExposition' => '10h-18h',
        ],
        [
            'passe' => false,
            'futur' => true,
            'dateVente' => '03/05/2024 10:00:00',
            'commissairePriseur' => 'Sotheby\'s',
            'adresse' => 'Rue de Rivoli',
            'codePostal' => '75001',
            'ville' => 'Paris',
            'nomVente' => 'Vente d\'été 2024',
            'dateExposition' => '03/05/2024',
            'heureExposition' => '10h-18h',
        ],
        [
            'passe' => false,
            'futur' => true,
            'dateVente' => '03/06/2024 10:00:00',
            'commissairePriseur' => 'Christie\'s',
            'adresse' => 'Rue de Rivoli',
            'codePostal' => '75001',
            'ville' => 'Paris',
            'nomVente' => 'Vente d\'été 2024 chez Christie\'s',
            'dateExposition' => '03/05/2024',
            'heureExposition' => '10h-18h',
        ],
        [
            'passe' => false,
            'futur' => true,
            'dateVente' => '10/07/2024 10:00:00',
            'commissairePriseur' => 'Sotheby\'s',
            'adresse' => 'Rue de Rivoli',
            'codePostal' => '75001',
            'ville' => 'Paris',
            'nomVente' => 'Vente d\'été 2024 chez Sotheby\'s',
            'dateExposition' => '08/07/2024',
            'heureExposition' => '10h-18h',
        ]

    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::VENTES as $venteFixture) {
            $vente = new Vente();
            $vente->setPasse($venteFixture['passe']);
            $vente->setFutur($venteFixture['futur']);
            $vente->setDateVente(new DateTime($venteFixture['dateVente']));
            $vente->setCommissairePriseur($venteFixture['commissairePriseur']);
            $vente->setAdresse($venteFixture['adresse']);
            $vente->setCodePostal($venteFixture['codePostal']);
            $vente->setVille($venteFixture['ville']);
            $vente->setNomVente($venteFixture['nomVente']);
            $vente->setDateExposition(new DateTime($venteFixture['dateExposition']));
            $vente->setHeureExposition($venteFixture['heureExposition']);
            $manager->persist($vente);
            $this->addReference('vente_' . $venteFixture['dateVente'], $vente);
        }
        $manager->flush();
    }
}
