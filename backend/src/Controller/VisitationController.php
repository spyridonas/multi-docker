<?php

namespace App\Controller;

use App\Entity\Visitation;
use App\Form\VisitationType;
use App\Repository\VisitationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/visitation')]
class VisitationController extends AbstractController
{
    #[Route('/', name: 'app_visitation_index', methods: ['GET'])]
    public function index(VisitationRepository $visitationRepository): Response
    {
        return $this->render('visitation/index.html.twig', [
            'visitations' => $visitationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_visitation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $visitation = new Visitation();
        $form = $this->createForm(VisitationType::class, $visitation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($visitation);
            $entityManager->flush();

            return $this->redirectToRoute('app_visitation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('visitation/new.html.twig', [
            'visitation' => $visitation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_visitation_show', methods: ['GET'])]
    public function show(Visitation $visitation): Response
    {
        return $this->render('visitation/show.html.twig', [
            'visitation' => $visitation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_visitation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Visitation $visitation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VisitationType::class, $visitation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_visitation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('visitation/edit.html.twig', [
            'visitation' => $visitation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_visitation_delete', methods: ['POST'])]
    public function delete(Request $request, Visitation $visitation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$visitation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($visitation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_visitation_index', [], Response::HTTP_SEE_OTHER);
    }
}
