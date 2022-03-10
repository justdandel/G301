<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function AdAddProduct()
    {

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
}
