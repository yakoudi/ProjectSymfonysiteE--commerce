<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CampifyController extends AbstractController
{
    #[Route('/campify', name: 'cam_pify')]
    public function index(): Response
    {
        return $this->render('client/index.html.twig');
    }
}
