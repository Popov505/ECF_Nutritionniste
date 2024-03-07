<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LegalController extends AbstractController
{
    #[Route('/legal', name: 'app_legal')]
    public function index(): Response
    {
        return $this->render('legal/legal_page.html.twig', [
            'controller_name' => 'LegalController',
        ]);
    }
}