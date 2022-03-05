<?php

namespace App\DataFixtures;

use App\Entity\Staff;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StaffFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0; $i<5; $i++){
            $staff = new Staff;
            $staff->setName("Staff $i");
            $staff->setAddress("Ha noi");
            $staff->setDob(\DateTime::createFromFormat('Y/m/d','2000/07/15'));
            $manager->persist($staff);
        }

        $manager->flush();
    }
}
