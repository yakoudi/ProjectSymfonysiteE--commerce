<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LocationlistController extends AbstractController
{
    #[Route('/locationlist', name: 'app_locationlist')]
    public function index(): Response
    {
        return $this->render('client/locationlist.html.twig', [
            'controller_name' => 'LocationlistController',
        ]);
    }
}
