<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Customer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CustomerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0; $i<5; $i++){
            $customer = new Customer;
            $customer->setName("Customer $i");
            $customer->setAddress("Ha noi");
            $customer->setImg("https://img.favpng.com/13/0/15/customer-review-vector-graphics-computer-icons-illustration-png-favpng-Ne07sKZ7VkPQgk0WFJhQin98n.jpg");
            $customer->setDob(\DateTime::createFromFormat('Y/m/d','1995/07/15'));
            $customer->setPhonenumber("012345678");
            $manager->persist($customer);
        }

        $manager->flush();
    }
}
