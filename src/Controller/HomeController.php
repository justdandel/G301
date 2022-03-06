<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/product', name: 'product_index')]
    public function ViewProduct(){
        $product = $this->getDoctrine()->getRepository(Product::class)->findAll();
        return $this->render('home/product.html.twig',
        [
            'products'=>$product
        ]);
    }
}
