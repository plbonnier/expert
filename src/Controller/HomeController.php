<?php

namespace App\Controller;

use App\Repository\LotRepository;
use App\Repository\VenteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(VenteRepository $venteRepository, LotRepository $lotRepository): Response
    {
        $ventesPasses = $venteRepository->findBy(['passe' => true], ['dateVente' => 'DESC'], 2);
        $lots = [];
        $selectedLotsPasses = [];

        foreach ($ventesPasses as $vente) {
            // Récupérer tous les lots pour la vente courante
            $lots = $lotRepository->findByVente($vente->getId());

            // Mélanger les lots aléatoirement
            shuffle($lots);

            // Sélectionner un nombre limité de lots, ici 3
            $selectedLotsPasses[$vente->getId()] = array_slice($lots, 0, 2);
        }
        return $this->render('home/index.html.twig', [
            'ventesPasses' => $ventesPasses,
            'selectedLotsPasses' => $selectedLotsPasses
            ]);
    }
}
