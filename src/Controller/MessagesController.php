<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Bootstrap\DefaultLayoutController;

class MessagesController extends DefaultLayoutController
{
    #[Route('/messages', name: 'app_messages')]
    public function index(): Response
    {
                $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return $this->render('pages/messages/index.html.twig', [
            'controller_name' => 'MessagesController',
        ]);
    }

     #[Route('/inquiries', name: 'app_inquiries')]
    public function inquiries(): Response
    {
                $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return $this->render('pages/messages/inquiries.html.twig', [
            'controller_name' => 'MessagesController',
        ]);
    }
}
