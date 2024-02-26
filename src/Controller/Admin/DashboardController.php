<?php

namespace App\Controller\Admin;

use App\Entity\ArticlePresse;
use App\Entity\Blog;
use App\Entity\Diplome;
use App\Entity\Lot;
use App\Entity\User;
use App\Entity\Vente;
use App\Entity\Video;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractDashboardController
{
    //#[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(BlogCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Expert');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Blog', 'fas fa-list', Blog::class);
        yield MenuItem::linkToCrud('ArticlePresse', 'fas fa-list', ArticlePresse::class);
        yield MenuItem::linkToCrud('Diplome', 'fas fa-list', Diplome::class);
        yield MenuItem::linkToCrud('Lot', 'fas fa-list', Lot::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Vente', 'fas fa-list', Vente::class);
        yield MenuItem::linkToCrud('Video', 'fas fa-list', Video::class);
        yield MenuItem::linkToRoute('Retour au site', 'fas fa-home', 'app_home');
        yield MenuItem::linkToRoute('Deconnexion', 'fas fa-sign-out-alt', 'app_logout');
    }
}
