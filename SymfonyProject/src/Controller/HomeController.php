<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/')]
    public function home(): Response
    {
        return $this->render('base.html.twig', []);
    }

    #[Route('/contact')]
    public function contact(): Response
    {
        return $this->render('confidentiality.html.twig', [
          'title' => "contact",
        ]);
    }

    #[Route('/politique_confidentialite')]
    public function confidentiality(): Response
    {
        return $this->render('confidentiality.html.twig', [
          'title' => "Confidentialité",
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
