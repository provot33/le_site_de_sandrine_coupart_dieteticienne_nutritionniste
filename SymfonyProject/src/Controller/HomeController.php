<?php
namespace App\Controller;

use App\Repository\PageRepository;
use App\Repository\WebContentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(
        PageRepository $pageRepository,
        WebContentRepository $webContentRepository,
        EntityManagerInterface $entityManager): Response {

        $this->updatePage($pageRepository, $webContentRepository, $entityManager);
        return $this->loadPage("accueil", $pageRepository, $webContentRepository,'page.html.twig');
    }

    #[Route('/contact')]
    public function contact(
        PageRepository $pageRepository,
        WebContentRepository $webContentRepository,
        EntityManagerInterface $entityManager): Response {

        $this->updatePage($pageRepository, $webContentRepository, $entityManager);
        return $this->loadPage("contact", $pageRepository, $webContentRepository,'contact.html.twig');
    }

    #[Route('/politique_confidentialite')]
    public function confidentiality(
        PageRepository $pageRepository,
        WebContentRepository $webContentRepository,
        EntityManagerInterface $entityManager): Response {

        $this->updatePage($pageRepository, $webContentRepository, $entityManager);
        return $this->loadPage("politique_confidentialite", $pageRepository, $webContentRepository,'page.html.twig');
    }

    #[Route('/mentions_legales')]
    public function legality(PageRepository $pageRepository,
        WebContentRepository $webContentRepository,
        EntityManagerInterface $entityManager): Response {

        $this->updatePage($pageRepository, $webContentRepository, $entityManager);
        return $this->loadPage("mentions_legales", $pageRepository, $webContentRepository,'page.html.twig');
    }

    private function updatePage(
        PageRepository $pageRepository,
        WebContentRepository $webContentRepository,
        EntityManagerInterface $entityManager
    ): void {
        if (isset($_SESSION['user']) && $_SESSION['user']['admin']) {
            foreach ($_POST as $key => $value) {
                if (str_contains($key, 'content_')) {
                    $id = substr($key, 8);
                    $webContent = $webContentRepository->find($id);

                    $webContent->setContent($value);

                    $entityManager->persist($webContent);
                    $entityManager->flush();
                }
                if (str_contains($key, 'page_')) {
                    $id = substr($key, 5);
                    $page = $pageRepository->find($id);

                    $page->setTitle($value);

                    $entityManager->persist($page);
                    $entityManager->flush();
                }
            }
        }
    }

    private function loadPage($nomPage,
        PageRepository $pageRepository,
        WebContentRepository $webContentRepository,
        $twigPage): Response {
        $page = $pageRepository->findOneByName($nomPage);
        $webContents = $webContentRepository->findByPageName($nomPage);
        $session = [];
        foreach ($_SESSION as $key => $item) {
            $session[$key] = $item;
        }

        return $this->render($twigPage, [
            'page' => $page,
            'webContents' => $webContents,
            'session' => $session,
        ]);
    }
}
