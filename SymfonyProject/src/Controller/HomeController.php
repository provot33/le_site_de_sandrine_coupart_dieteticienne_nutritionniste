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
    public function home(PageRepository $pageRepository,
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
    public function confidentiality(WebContentRepository $webcontentrepository): Response
    {
        $webcontent = $webcontentrepository->find(1, null, null);
        return $this->render('confidentiality.html.twig', [
            'title' => $webcontent->getTitle(),
            'content' => $webcontent->getContent(),
        ]);
    }

    #[Route('/mentions_legales')]
    public function legality(): Response
    {
        return $this->render('confidentiality.html.twig', [
            'title' => "Légalité",
        ]);
    }
}
