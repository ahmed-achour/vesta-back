<?php

namespace App\Controller;

use App\Entity\Properties;
use App\Form\PropertiesType;
use App\Repository\PropertiesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Bootstrap\DefaultLayoutController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/admin/properties')]
class PropertiesController extends DefaultLayoutController
{
    #[Route('/', name: 'admin_properties_index', methods: ['GET'])]
    public function index(PropertiesRepository $propertiesRepository, Request $request): Response
    {
        $property = new Properties();
        $form = $this->createForm(PropertiesType::class, $property);
        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        $editForms = [];
        foreach ($propertiesRepository->findAll() as $property) {
            $editForms[$property->getId()] = $this->createForm(PropertiesType::class, $property, ['is_edit' => true])->createView();
        }

        return $this->render('pages/properties/index.html.twig', [
            'properties' => $propertiesRepository->findAll(),
            'form' => $form->createView(),
            'edit_forms' => $editForms,
        ]);
    }

    #[Route('/new', name: 'admin_properties_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        PropertiesRepository $propertiesRepository
    ): Response {
        $property = new Properties();
        $form = $this->createForm(PropertiesType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle gallery pictures upload
            $galleryFiles = $form->get('galleryPicturesFile')->getData();
            $galleryPictures = [];

            if ($galleryFiles) {
                foreach ($galleryFiles as $file) {
                    if ($file instanceof UploadedFile) {
                        $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                        $file->move(
                            $this->getParameter('property_gallery_directory'),
                            $fileName
                        );
                        $galleryPictures[] = $fileName;
                    }
                }
                $property->setGalleryPictures($galleryPictures);
            }
            // Calculate price per sqft if not provided
            if (!$property->getPricePerSqft() && $property->getListingPrice() && $property->getLivableArea()) {
                $pricePerSqft = $property->getListingPrice() / $property->getLivableArea();
                $property->setPricePerSqft(number_format($pricePerSqft, 2));
            }

            $entityManager->persist($property);
            $entityManager->flush();

            $this->addFlash('success', 'Property created successfully');
            return $this->redirectToRoute('admin_properties_index');
        }

        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return $this->render('pages/admin/properties/index.html.twig', [
            'properties' => $propertiesRepository->findAll(),
            'form' => $form->createView(),
            'edit_forms' => $this->createEditForms($propertiesRepository),
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_properties_edit', methods: ['POST'])]
    public function edit(
        Request $request,
        Properties $property,
        EntityManagerInterface $entityManager,
        PropertiesRepository $propertiesRepository
    ): Response {
        $form = $this->createForm(PropertiesType::class, $property, ['is_edit' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle gallery pictures upload
            $galleryFiles = $form->get('galleryPicturesFile')->getData();

            if ($galleryFiles) {
                $galleryPictures = $property->getGalleryPictures();

                foreach ($galleryFiles as $file) {
                    if ($file instanceof UploadedFile) {
                        $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                        $file->move(
                            $this->getParameter('property_gallery_directory'),
                            $fileName
                        );
                        $galleryPictures[] = $fileName;
                    }
                }
                $property->setGalleryPictures($galleryPictures);
            }
            // Recalculate price per sqft if relevant fields changed
            if ($property->getListingPrice() && $property->getLivableArea()) {
                $pricePerSqft = $property->getListingPrice() / $property->getLivableArea();
                $property->setPricePerSqft(number_format($pricePerSqft, 2));
            }

            $entityManager->flush();
            $this->addFlash('success', 'Property updated successfully');
            return $this->redirectToRoute('admin_properties_index');
        }

        $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return $this->render('pages/admin/properties/index.html.twig', [
            'properties' => $propertiesRepository->findAll(),
            'form' => $this->createForm(PropertiesType::class, new Properties())->createView(),
            'edit_forms' => $this->createEditForms($propertiesRepository),
        ]);
    }

    #[Route('/{id}', name: 'admin_properties_delete', methods: ['POST'])]
    public function delete(Request $request, Properties $property, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $property->getId(), $request->request->get('_token'))) {
            $entityManager->remove($property);
            $this->addFlash('success', 'Property deleted successfully');
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_properties_index', [], Response::HTTP_SEE_OTHER);
    }

    private function createEditForms(PropertiesRepository $propertiesRepository): array
    {
        $editForms = [];
        foreach ($propertiesRepository->findAll() as $property) {
            $editForms[$property->getId()] = $this->createForm(PropertiesType::class, $property, ['is_edit' => true])->createView();
        }
        return $editForms;
    }

    #[Route('/api/properties', name: 'api_property_list', methods: ['GET'])]
    public function ss(PropertiesRepository $propertiesRepository): JsonResponse
    {

        $properties = $propertiesRepository->findAll();

        $data = [];

        foreach ($properties as $property) {
            $data[] = [
                'id' => $property->getId(),
                'city' => $property->getCity(),
                'state' => $property->getState(),
                'zip_code' => $property->getZipCode(),
                'subdivision' => $property->getSubdivision(),
                'region' => $property->getRegion(),
                'year_built' => $property->getYearBuilt(),
                'lot_size_acres' => $property->getLotSizeAcres(),
                'structure_area' => $property->getStructureArea(),
                'livable_area' => $property->getLivableArea(),
                'finished_below_ground' => $property->getFinishedBelowGround(),
                'listing_price' => $property->getListingPrice(),
                'price_per_sqft' => $property->getPricePerSqft(),
                'date_listed' => $property->getDateListed()?->format('Y-m-d'),
                'mls_id' => $property->getMlsId(),
                'ownership_type' => $property->getOwnershipType(),
                'listing_terms' => $property->getListingTerms(),
                'road_surface' => $property->getRoadSurface(),
                'longitude' => $property->getLongitude(),
                'latitude' => $property->getLatitude(),
                'main_picture' => $property->getMainPicture(),
                'gallery_pictures' => $property->getGalleryPictures(),
                'plan_picture' => $property->getPlanPicture(),
            ];
        }
        $response = new JsonResponse($data);

        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');


        return $response;
    }
}
