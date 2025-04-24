<?php

namespace App\Controller;

use App\Repository\MaintenanceLogRepository;
use App\Repository\PlantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController{
    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    #[Route('/admin', name: 'app_admin')]
    public function admin(): Response
    {
        return $this->render('admin/crud.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    #[Route('/plants', name: 'app_plants')]
    public function plants(PlantRepository $plantRepository): Response
    {
        return $this->render('default/plants.html.twig', [
            'controller_name' => 'DefaultController',
            'plants' => $plantRepository->findAll(),
        ]);
    }

    #[Route('/maintenance-logs', name: 'app_maintenance_logs')]
    public function userMaintenanceLogs(MaintenanceLogRepository $maintenanceLogRepository): Response
    {
        // Vérifier si l'utilisateur est connecté
        $this->denyAccessUnlessGranted('ROLE_USER');

        // Récupérer l'utilisateur connecté
        $user = $this->getUser();

        return $this->render('default/UserMaintenanceLogs.twig', [
            'controller_name' => 'DefaultController',
            'maintenance_logs' => $maintenanceLogRepository->findByUser($user),
            'user' => $user,
        ]);
    }

}
