<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture implements OrderedFixtureInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        for ($index = 0; $index < 10; $index++)
        {
            $user = new User();
            $user->setUid("SuperUidSecure" . $index);
            $user->setFirstname("FirstName" . $index);
            $user->setLastname("Lastname" . $index);
            $user->setEmail("SuperEmail" . $index. "@gmail.com");
            $hashed = $this->passwordHasher->hashPassword($user, "SuperPassword");
            $user->setPassword($hashed);
            $user->setIsConfirmed($index % 2 === 0);
            $user->setIsAdmin($index % 2 === 0);

            $manager->persist($user);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 1;
    }
}
