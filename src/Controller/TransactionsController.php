<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Bootstrap\DefaultLayoutController;

class TransactionsController extends DefaultLayoutController
{
    #[Route('/transactions', name: 'app_transactions')]
    public function index(): Response
    {
                $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return $this->render('pages/transactions/index.html.twig', [
            'controller_name' => 'TransactionsController',
        ]);
    }

     #[Route('/transactions/add', name: 'app_add_transactions')]
    public function add(): Response
    {
                $this->theme->addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return $this->render('pages/transactions/add.html.twig', [
            'controller_name' => 'TransactionsController',
        ]);
    }
}
