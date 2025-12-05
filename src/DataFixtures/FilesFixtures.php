<?php

namespace App\DataFixtures;

use App\Entity\File;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FilesFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($index = 0; $index < 10; $index++) {
            $file = new File();
            $file->setUrl("IHaveAGoodURL " . $index . ".pdf");
            $file->setOriginalName("I'm a good file" . $index);

            $manager->persist($file);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 3;
    }
}
