<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'dashboard')]

public function index(): Response
{
// Example data to pass to the view
$amountPending = 500; // This can be fetched from a database or API
$tasksPending = 300;
$callsToMake = 56;
$issuesToResolve = 30;

return $this->render('admin/dashboard.html.twig', [
'amountPending' => $amountPending,
'tasksPending' => $tasksPending,
'callsToMake' => $callsToMake,
'issuesToResolve' => $issuesToResolve,
]);
}
}
