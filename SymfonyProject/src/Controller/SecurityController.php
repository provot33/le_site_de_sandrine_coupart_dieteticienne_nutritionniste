<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/login')]
    public function login(): Response
    {

        return $this->render('login.html.twig', [
            'user' => "User Connecté",
        ]);
    }

    #[Route('/logout')]
    public function logout(): Response
    {

        return $this->render('login.html.twig', [
            'user' => "User Déconnecté",
        ]);
    }
}
