<?php

namespace App\Controller;

use App\Entity\SymptomHistory;
use App\Form\SymptomHistoryType;
use App\Repository\SymptomHistoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/symptom/history')]
class SymptomHistoryController extends AbstractController
{
    #[Route('/', name: 'app_symptom_history_index', methods: ['GET'])]
    public function index(SymptomHistoryRepository $symptomHistoryRepository): Response
    {
        return $this->render('symptom_history/index.html.twig', [
            'symptom_histories' => $symptomHistoryRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_symptom_history_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $symptomHistory = new SymptomHistory();
        $form = $this->createForm(SymptomHistoryType::class, $symptomHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($symptomHistory);
            $entityManager->flush();

            return $this->redirectToRoute('app_symptom_history_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('symptom_history/new.html.twig', [
            'symptom_history' => $symptomHistory,
            'form' => $form,
        ]);
    }

    #[Route('/{hist_id}', name: 'app_symptom_history_show', methods: ['GET'])]
    public function show(SymptomHistory $symptomHistory): Response
    {
        return $this->render('symptom_history/show.html.twig', [
            'symptom_history' => $symptomHistory,
        ]);
    }

    #[Route('/{hist_id}/edit', name: 'app_symptom_history_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SymptomHistory $symptomHistory, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SymptomHistoryType::class, $symptomHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_symptom_history_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('symptom_history/edit.html.twig', [
            'symptom_history' => $symptomHistory,
            'form' => $form,
        ]);
    }

    #[Route('/{hist_id}', name: 'app_symptom_history_delete', methods: ['POST'])]
    public function delete(Request $request, SymptomHistory $symptomHistory, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$symptomHistory->getHist_id(), $request->request->get('_token'))) {
            $entityManager->remove($symptomHistory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_symptom_history_index', [], Response::HTTP_SEE_OTHER);
    }
}
