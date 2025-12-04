<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($index = 0; $index < 10; $index++)
        {
            $user = new User();
            $user->setUid("SuperUidSecure" . $index);
            $user->setFirstname("FirstName" . $index);
            $user->setLastname("Lastname" . $index);
            $user->setEmail("SuperEmail" . $index. "@mimir.dyosis");
            $user->setPassword("SuperPasswordSecure" . $index);
            $user->setIsConfirmed($index % 2 === 0);
            $user->setIsAdmin($index % 2 === 0);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
