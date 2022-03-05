<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0; $i<4; $i++){
            $category = new Category;
            $category->setName("Category $i");
            $category->setDescription("Description");
            $manager->persist($category);
        }

        $manager->flush();
    }
}
