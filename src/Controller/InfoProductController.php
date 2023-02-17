<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfoProductController extends AbstractController
{
    #[Route('/info/product', name: 'app_info_product')]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('info_product/index.html.twig', [
            'controller_name' => 'InfoProductController',
            'products' => $productRepository->findAll(),
            'id' => $_GET['id']
        ]);
    }
}
