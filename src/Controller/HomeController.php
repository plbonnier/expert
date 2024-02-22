<?php

namespace App\Controller;

use App\Repository\BlogRepository;
use App\Repository\LotRepository;
use App\Repository\VenteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        VenteRepository $venteRepository,
        LotRepository $lotRepository,
        BlogRepository $blogRepository
    ): Response {
        $ventesPasses = $venteRepository->findBy(['passe' => true], ['dateVente' => 'DESC'], 2);
        $ventesFutur = $venteRepository->findBy(['futur' => true], ['dateVente' => 'ASC'], 2);
        $articles = $blogRepository->findBy([], ['date' => 'DESC'], 2);
        $lotsFuturs = [];
        $selectedLotsFutur = [];
        $lotsPasses = [];
        $selectedLotsPasses = [];

        foreach ($ventesPasses as $ventePasses) {
            // Récupérer tous les lots pour la vente courante
            $lotsPasses = $lotRepository->findByVente($ventePasses->getId());

            // Mélanger les lots aléatoirement
            shuffle($lotsPasses);

            // Sélectionner un nombre limité de lots, ici 3
            $selectedLotsPasses[$ventePasses->getId()] = array_slice($lotsPasses, 0, 2);
        }

        foreach ($ventesFutur as $venteFutur) {
            // Récupérer tous les lots pour la vente courante
            $lotsFuturs = $lotRepository->findByVente($venteFutur->getId());

            // Mélanger les lots aléatoirement
            shuffle($lotsFuturs);

            // Sélectionner un nombre limité de lots, ici 3
            $selectedLotsFutur[$venteFutur->getId()] = array_slice($lotsFuturs, 0, 2);
        }
        return $this->render('home/index.html.twig', [
            'ventesPasses' => $ventesPasses,
            'ventesFutur' => $ventesFutur,
            'selectedLotsPasses' => $selectedLotsPasses,
            'selectedLotsFutur' => $selectedLotsFutur,
            'articles' => $articles
            ]);
    }
}
