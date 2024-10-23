<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorControllerPhpController extends AbstractController
{
    #[Route('/author/controller/php', name: 'app_author_controller_php')]
    public function index(): Response
    {
        return $this->render('author_controller_php/index.html.twig', [
            'controller_name' => 'AuthorControllerPhpController',
        ]);
    }
}
