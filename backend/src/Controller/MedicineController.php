<?php

namespace App\Controller;

use App\Entity\Medicine;
use App\Form\MedicineType;
use App\Repository\MedicineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/medicine')]
class MedicineController extends AbstractController
{
    #[Route('/', name: 'app_medicine_index', methods: ['GET'])]
    public function index(MedicineRepository $medicineRepository): Response
    {
        return $this->render('medicine/index.html.twig', [
            'medicines' => $medicineRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_medicine_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $medicine = new Medicine();
        $form = $this->createForm(MedicineType::class, $medicine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($medicine);
            $entityManager->flush();

            return $this->redirectToRoute('app_medicine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('medicine/new.html.twig', [
            'medicine' => $medicine,
            'form' => $form,
        ]);
    }

    #[Route('/{med_id}', name: 'app_medicine_show', methods: ['GET'])]
    public function show(Medicine $medicine): Response
    {
        return $this->render('medicine/show.html.twig', [
            'medicine' => $medicine,
        ]);
    }

    #[Route('/{med_id}/edit', name: 'app_medicine_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Medicine $medicine, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MedicineType::class, $medicine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_medicine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('medicine/edit.html.twig', [
            'medicine' => $medicine,
            'form' => $form,
        ]);
    }

    #[Route('/{med_id}', name: 'app_medicine_delete', methods: ['POST'])]
    public function delete(Request $request, Medicine $medicine, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medicine->getMed_id(), $request->request->get('_token'))) {
            $entityManager->remove($medicine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_medicine_index', [], Response::HTTP_SEE_OTHER);
    }
}
