<?php

namespace App\Controller;

use App\Entity\Conditions;
use App\Form\ConditionsType;
use App\Repository\ConditionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/conditions')]
class ConditionsController extends AbstractController
{
    #[Route('/', name: 'app_conditions_index', methods: ['GET'])]
    public function index(ConditionsRepository $conditionsRepository): Response
    {
        return $this->render('conditions/index.html.twig', [
            'conditions' => $conditionsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_conditions_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $condition = new Conditions();
        $form = $this->createForm(ConditionsType::class, $condition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($condition);
            $entityManager->flush();

            return $this->redirectToRoute('app_conditions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('conditions/new.html.twig', [
            'condition' => $condition,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_conditions_show', methods: ['GET'])]
    public function show(Conditions $condition): Response
    {
        return $this->render('conditions/show.html.twig', [
            'condition' => $condition,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_conditions_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Conditions $condition, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ConditionsType::class, $condition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_conditions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('conditions/edit.html.twig', [
            'condition' => $condition,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_conditions_delete', methods: ['POST'])]
    public function delete(Request $request, Conditions $condition, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$condition->getId(), $request->request->get('_token'))) {
            $entityManager->remove($condition);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_conditions_index', [], Response::HTTP_SEE_OTHER);
    }
}
