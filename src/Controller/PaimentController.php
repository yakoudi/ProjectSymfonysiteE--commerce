<?php

namespace App\Controller;

use App\Form\PaymentFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PaimentController extends AbstractController
{
    #[Route('/paiment', name: 'app_paiment')]




    public function paymentSummary(Security $security, Request $request):Response
    {
        // Récupère l'utilisateur connecté
        $user = $security->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login'); // Redirige si l'utilisateur n'est pas connecté
        }

        // Crée le formulaire de mode de paiement
        $paymentForm = $this->createForm(PaymentFormType::class);

        // Gère la soumission du formulaire de paiement
        $paymentForm->handleRequest($request);

        if ($paymentForm->isSubmitted() && $paymentForm->isValid()) {
            // Ici tu peux gérer la logique de paiement (par exemple, sauvegarder les infos de paiement)
            // Par exemple, tu pourrais enregistrer le mode de paiement choisi dans la base de données

            $this->addFlash('success', 'Your payment method has been recorded.');
            return $this->redirectToRoute('app_paiment');
        }

        return $this->render('paiment/index.html.twig', [
            'user' => $user,
            'paymentForm' => $paymentForm->createView(),
        ]);
    }














}
