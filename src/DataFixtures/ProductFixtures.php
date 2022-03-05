<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0; $i<8; $i++){
            $product = new Product;
            $product->setName("Product $i");
            $product->setImg("https://img.favpng.com/13/0/15/product-review-vector-graphics-computer-icons-illustration-png-favpng-Ne07sKZ7VkPQgk0WFJhQin98n.jpg");
            $product->setPrice((float)rand(1,10));
            $product->setQuantity(rand(15,20));
            $product->setDescription("description");
            $manager->persist($product);
        }

        $manager->flush();
    }
}
