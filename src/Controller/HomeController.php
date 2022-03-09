<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/product/search', name: 'product_search')]
    public function SearchProduction (Request $request, ProductRepository $repository){
        $name = $request->get('search_product');
        $product = $repository->SearchProduction($name);
        $category = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render("home/product.html.twig",
        [
            'products'=> $product,
            'categories' => $category
        ]);
    }

    #[Route('/aboutus', name: 'aboutus')]
    public function AboutUs()
    {
        return $this->render('home/aboutus.html.twig', [
            
        ]);
    }

    #[Route('/product/description/{desid}', name: 'description')]
    public function ProductDescription($desid)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($desid);
        $category = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render("home/productdes.html.twig",
        [
            'products' => $product,
            'categories' => $category
        ]);

    }
}
