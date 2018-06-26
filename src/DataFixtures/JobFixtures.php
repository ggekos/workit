<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Job;

class JobFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 10 ; $i++) {
            $job = new Job();
            $job->setInstruction('faut faire ça '.$i);
            $manager->persist($job);
        }

        $manager->flush();
    }
}
