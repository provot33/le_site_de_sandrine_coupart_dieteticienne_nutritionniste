<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    #[Route('/mes_recettes_healthy')]
    public function recipes(): Response
    {
        return $this->render('recipe.html.twig', [
          'title' => "Mes Recettes Healthy"
        ]);
    }
}
