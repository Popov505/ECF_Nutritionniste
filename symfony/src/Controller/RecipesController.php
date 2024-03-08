<?php

namespace App\Controller;

use App\Repository\OpinionsRepository;
use App\Repository\RecipesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecipesController extends AbstractController
{
    #[Route('/recipes', name: 'app_recipes')]
    public function index(OpinionsRepository $opinionsRepository, RecipesRepository $recipesRepository): Response
    {
        $opinions = $opinionsRepository->findBy([],['id' => 'ASC']);
        $recipes = $recipesRepository->findBy([],['id' => 'ASC']);
        return $this->render('recipes/recipes_page.html.twig', [
            'controller_name' => 'RecipesController',
            'recipes' => $recipes,
            'opinions' => $opinions,
        ]);
    }
}
