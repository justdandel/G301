<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
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
        $category = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('home/product.html.twig',
        [
            'products'=>$product,
            'categories'=>$category
        ]);
    }

    #[Route('/product/category/{cateid}', name: 'product_category')]
    public function ViewProductbyCategory($cateid){
        $product = $this->getDoctrine()->getRepository(Product::class)->findBy(['category' =>$cateid]);
        $category = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render("home/product.html.twig",
        [
            'products' => $product,
            'categories'=>$category
        ]);
    }
}
