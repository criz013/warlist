<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/')]
class HomeController extends AbstractController
{
    #[Route('home')]
    public function homePage():Response
    {
        return $this->render('home/index.html.twig');
    }
}