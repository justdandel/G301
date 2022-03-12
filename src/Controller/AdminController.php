<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'admin_index')]
    public function AdViewProduct()
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'products' => $product
        ]);
    }

    #[Route('/add', name: 'admin_add')]
    public function AdAddProduct(Request $request)
    {
        $product = new Product;
        $form = $this -> createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($product);
            $manager->flush();
            return $this -> redirectToRoute('admin_index');
        }
        return $this ->renderForm('admin/add.html.twig',
        [
            'Productform' => $form,
        ]);
    }

    #[Route('/delete/{id}', name: 'admin_del')]
    public function AdDelProduct($id)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($product);
        $manager->flush();
    
    return $this->redirectToRoute('admin_index');
    }
    
    #[Route('/edit/{id}', name: 'admin_edit')]
    public function AdEditProduct(Request $request, $id)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        $form = $this->createForm(ProductType::class, $product);
        $form ->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($product);
            $manager->flush();
            return $this -> redirectToRoute('admin_index');
        }
        return $this ->renderForm('admin/edit.html.twig',
        [
            'Productform' => $form,
            'products' => $product
        ]);
        }          
}
