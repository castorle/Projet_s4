<?php

namespace App\Controller;

use App\Repository\MaintenanceLogRepository;
use App\Repository\PlantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/symfony/plants', name: 'app_plants')]
    public function plants(Request $request, PlantRepository $plantRepository): Response
    {
        $criteria = [
            'category' => $request->query->get('category'),
            'maintenanceDifficulty' => $request->query->get('maintenanceDifficulty'),
            'soilType' => $request->query->get('soilType'),
            'wateringNeeds' => $request->query->get('wateringNeeds'),
        ];

        $isEmpty = true;
        foreach ($criteria as $value) {
            if (!empty($value)) {
                $isEmpty = false;
                break;
            }
        }

        if ($isEmpty) {
            $plants = $plantRepository->findAll();
        } else {
            $plants = $plantRepository->searchByCriteria($criteria);
        }

        return $this->render('default/plants.html.twig', [
            'controller_name' => 'DefaultController',
            'plants' => $plants,
        ]);
    }

    #[Route('/plants/{id}', name: 'user_app_plant_show')]
    public function showPlant(int $id, PlantRepository $plantRepository): Response
    {
        $plant = $plantRepository->find($id);
        if (!$plant) {
            throw $this->createNotFoundException('Plante non trouvée');
        }
        return $this->render('default/plant_show.html.twig', [
            'plant' => $plant,
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

    #[Route('/app/{vueRouting}', name: 'vue_app', requirements: ['vueRouting' => '.*'])]
    public function vueApp(): Response
    {
        return $this->render('vue/app.html.twig');
    }
}
