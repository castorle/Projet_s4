<?php

namespace App\Controller;

use App\Entity\MaintenanceLog;
use App\Form\MaintenanceLogType;
use App\Repository\MaintenanceLogRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/maintenance/log')]
final class MaintenanceLogController extends AbstractController{
    #[Route(name: 'app_maintenance_log_index', methods: ['GET'])]
    public function index(MaintenanceLogRepository $maintenanceLogRepository): Response
    {
        return $this->render('maintenance_log/index.html.twig', [
            'maintenance_logs' => $maintenanceLogRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_maintenance_log_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $maintenanceLog = new MaintenanceLog();
        $form = $this->createForm(MaintenanceLogType::class, $maintenanceLog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($maintenanceLog);
            $entityManager->flush();

            return $this->redirectToRoute('app_maintenance_log_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('maintenance_log/new.html.twig', [
            'maintenance_log' => $maintenanceLog,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_maintenance_log_show', methods: ['GET'])]
    public function show(MaintenanceLog $maintenanceLog): Response
    {
        return $this->render('maintenance_log/show.html.twig', [
            'maintenance_log' => $maintenanceLog,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_maintenance_log_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MaintenanceLog $maintenanceLog, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MaintenanceLogType::class, $maintenanceLog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_maintenance_log_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('maintenance_log/edit.html.twig', [
            'maintenance_log' => $maintenanceLog,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_maintenance_log_delete', methods: ['POST'])]
    public function delete(Request $request, MaintenanceLog $maintenanceLog, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$maintenanceLog->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($maintenanceLog);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_maintenance_log_index', [], Response::HTTP_SEE_OTHER);
    }
}
