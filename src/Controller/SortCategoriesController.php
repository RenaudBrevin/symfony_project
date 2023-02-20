<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortCategoriesController extends AbstractController
{
    #[Route('/sort/categories', name: 'app_categories')]
    public function index(ProductRepository $productRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('sort_categories/index.html.twig', [
            'controller_name' => 'SortCategoriesController',
            'categories' => $categoryRepository->findAll(),
            'products' => $productRepository->findAll(),
            'id' => $_GET['id']
        ]);
    }
}
