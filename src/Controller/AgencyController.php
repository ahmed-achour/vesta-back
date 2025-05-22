<?php

namespace App\Controller;

use App\Entity\Agency;
use App\Form\AgencyType;
use App\Repository\AgencyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Bootstrap\DefaultLayoutController;

#[Route('/admin/agencies')]
class AgencyController extends DefaultLayoutController
{
    #[Route('/', name: 'admin_agencies_index', methods: ['GET'])]
    public function index(AgencyRepository $agencyRepository, Request $request): Response
    {
        $agency = new Agency();
        $form = $this->createForm(AgencyType::class, $agency);
        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        $editForms = [];
        foreach ($agencyRepository->findAll() as $agency) {
            $editForms[$agency->getAgencyId()] = $this->createForm(AgencyType::class, $agency, ['is_edit' => true])->createView();
        }

        return $this->render('pages/agencies/index.html.twig', [
            'agencies' => $agencyRepository->findAll(),
            'form' => $form->createView(),
            'edit_forms' => $editForms,
        ]);
    }

    #[Route('/new', name: 'admin_agencies_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        AgencyRepository $agencyRepository
    ): Response {
        $agency = new Agency();
        $form = $this->createForm(AgencyType::class, $agency);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $agency->setCreatedAt(new \DateTime());
            $entityManager->persist($agency);
            $entityManager->flush();

            $this->addFlash('success', 'Agency created successfully');
            return $this->redirectToRoute('admin_agencies_index');
        }

        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return $this->render('pages/agencies/index.html.twig', [
            'agencies' => $agencyRepository->findAll(),
            'form' => $form->createView(),
            'edit_forms' => $this->createEditForms($agencyRepository),
        ]);
    }

    #[Route('/{agencyId}/edit', name: 'admin_agencies_edit', methods: ['POST'])]
    public function edit(
        Request $request, 
        Agency $agency, 
        EntityManagerInterface $entityManager, 
        AgencyRepository $agencyRepository
    ): Response {
        $form = $this->createForm(AgencyType::class, $agency, ['is_edit' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Agency updated successfully');
            return $this->redirectToRoute('admin_agencies_index');
        }

        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return $this->render('pages/agencies/index.html.twig', [
            'agencies' => $agencyRepository->findAll(),
            'form' => $this->createForm(AgencyType::class, new Agency())->createView(),
            'edit_forms' => $this->createEditForms($agencyRepository),
        ]);
    }

    #[Route('/{agencyId}', name: 'admin_agencies_delete', methods: ['POST'])]
    public function delete(Request $request, Agency $agency, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $agency->getAgencyId(), $request->request->get('_token'))) {
            $entityManager->remove($agency);
            $this->addFlash('success', 'Agency deleted successfully');
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_agencies_index', [], Response::HTTP_SEE_OTHER);
    }

    private function createEditForms(AgencyRepository $agencyRepository): array
    {
        $editForms = [];
        foreach ($agencyRepository->findAll() as $agency) {
            $editForms[$agency->getAgencyId()] = $this->createForm(AgencyType::class, $agency, ['is_edit' => true])->createView();
        }
        return $editForms;
    }
}