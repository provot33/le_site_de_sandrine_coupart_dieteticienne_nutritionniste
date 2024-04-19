<?php
namespace App\Controller;

use App\Repository\PageRepository;
use App\Repository\WebContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/')]
    public function home(
        PageRepository $pageRepository,
        WebContentRepository $webContentRepository): Response {

        $page = $pageRepository->findOneByName("accueil");
        $webContents = $webContentRepository->findByPageName("accueil");

        return $this->render('base.html.twig', [
            'title' => $page->getTitle(),
            'webContents' => $webContents,
        ]);
    }

    #[Route('/contact')]
    public function contact(): Response
    {
        return $this->render('confidentiality.html.twig', [
            'title' => "contact",
        ]);
    }

    #[Route('/politique_confidentialite')]
    public function confidentiality(
        PageRepository $pageRepository,
        WebContentRepository $webContentRepository): Response
    {
        $page = $pageRepository->findOneByName("politique_confidentialite");
        $webContents = $webContentRepository->findByPageName("politique_confidentialite");

        return $this->render('base.html.twig', [
            'title' => $page->getTitle(),
            'webContents' => $webContents,
        ]);
    }

    #[Route('/mentions_legales')]
    public function legality(PageRepository $pageRepository,
        WebContentRepository $webContentRepository): Response
    {
        $page = $pageRepository->findOneByName("mentions_legales");
        $webContents = $webContentRepository->findByPageName("mentions_legales");

        return $this->render('base.html.twig', [
            'title' => $page->getTitle(),
            'webContents' => $webContents,
        ]);
    }
}
