<?php

namespace App\Controller;

use App\Entity\Lot;
use App\Entity\Vente;
use App\Repository\LotRepository;
use App\Repository\VenteRepository;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/ventes')]
class VenteController extends AbstractController
{
    #[Route('/anciennes', name: 'app_vente_passe_index', methods: ['GET'])]
    public function indexPasse(VenteRepository $venteRepository, LotRepository $lotRepository): Response
    {
        $ventes = $venteRepository->findBy(['passe' => true], ['dateVente' => 'DESC']);
        $lots = [];
        $selectedLots = [];

        foreach ($ventes as $vente) {
            // Récupérer tous les lots pour la vente courante
            $lots = $lotRepository->findByVente($vente->getId());

            // Mélanger les lots aléatoirement
            shuffle($lots);

            // Sélectionner un nombre limité de lots, ici 3
            $selectedLots[$vente->getId()] = array_slice($lots, 0, 3);
        }

        return $this->render('vente/indexPasse.html.twig', [
            'ventes' => $ventes,
            'selectedLots' => $selectedLots
        ]);
    }

    #[Route('/prochaines', name: 'app_vente_futur_index', methods: ['GET'])]
    public function indexFutur(VenteRepository $venteRepository, LotRepository $lotRepository): Response
    {
        $ventes = $venteRepository->findBy(['futur' => true], ['dateVente' => 'ASC']);
        $lots = [];
        $selectedLots = [];

        foreach ($ventes as $vente) {
            // Récupérer tous les lots pour la vente courante
            $lots = $lotRepository->findByVente($vente->getId());

            // Mélanger les lots aléatoirement
            shuffle($lots);

            // Sélectionner un nombre limité de lots, ici 3
            $selectedLots[$vente->getId()] = array_slice($lots, 0, 3);
        }
        return $this->render('vente/indexFutur.html.twig', [
            'ventes' => $ventes,
            'selectedLots' => $selectedLots
        ]);
    }

    #[Route('/{slug}', name: 'app_vente_show', methods: ['GET'])]
    public function show(
        Vente $vente,
        LotRepository $lotRepository,
    ): Response {
        $slug = $vente->getSlug();
        $lots = $lotRepository->findByVente($vente->getId());
        return $this->render('vente/show.html.twig', [
            'vente' => $vente,
            'slug' => $slug,
            'lots' => $lots
        ]);
    }

    #[Route('/{slug}/lot/{slug2}', name: 'app_vente_show_lot', methods: ['GET'])]
    public function showLot(
        string $slug,
        string $slug2,
        VenteRepository $venteRepository,
        LotRepository $lotRepository
    ): Response {
        $vente = $venteRepository->findOneBySlug($slug);
        if (!$vente) {
            throw $this->createNotFoundException('Aucune vente trouvée pour le slug fourni.');
        }

        $lot = $lotRepository->findOneBySlug($slug2);
        if (!$lot) {
            throw $this->createNotFoundException('Aucun lot trouvé pour
    le slug fourni.');
        }

        return $this->render('vente/lot_show.html.twig', [
            'vente' => $vente,
            'lot' => $lot,
        ]);
    }
}
