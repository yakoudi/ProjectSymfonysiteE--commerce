<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactlistController extends AbstractController
{
    #[Route('/contactlist', name: 'contactlist')]
    public function index(EntityManagerInterface $es): Response
    {
        // Fetch all contacts using the repository
        $contacts = $es->getRepository(Contact::class)->findAll();

        // Render the Twig template and pass the contacts data
        return $this->render('admin/contactlist.html.twig', [
            'contacts' => $contacts, // Pass contacts to the view
        ]);
    }
}
