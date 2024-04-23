<?php
namespace App\Controller;

use App\Repository\PageRepository;
use App\Repository\WebContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(
        PageRepository $pageRepository,
        WebContentRepository $webContentRepository): Response {

        return $this->loadPage("accueil", $pageRepository, $webContentRepository);
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
        WebContentRepository $webContentRepository): Response {

        return $this->loadPage("politique_confidentialite", $pageRepository, $webContentRepository);
    }

    #[Route('/mentions_legales')]
    public function legality(PageRepository $pageRepository,
        WebContentRepository $webContentRepository): Response {

        return $this->loadPage("mentions_legales", $pageRepository, $webContentRepository);
    }

    private function loadPage($nomPage,
        PageRepository $pageRepository,
        WebContentRepository $webContentRepository): Response {
        $page = $pageRepository->findOneByName($nomPage);
        $webContents = $webContentRepository->findByPageName($nomPage);
        $session = [];
        foreach ($_SESSION as $key => $item) {
            $session[$key] = $item;
        }

        return $this->render('page.html.twig', [
            'title' => $page->getTitle(),
            'webContents' => $webContents,
            'session' => $session,
        ]);
    }
}
