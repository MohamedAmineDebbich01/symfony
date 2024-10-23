<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeControllerPhpController extends AbstractController
{
    #[Route('/home/controller/php', name: 'app_home_controller_php')]
    public function index(): Response
    {
        return $this->render('home_controller_php/index.html.twig', [
            'controller_name' => 'HomeControllerPhpController',
        ]);
    }
}
