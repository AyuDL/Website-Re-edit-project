<?php

namespace App\DataFixtures;

use App\Entity\Token;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Random\RandomException;

class TokensFixtures extends Fixture implements OrderedFixtureInterface
{
    /**
     * @throws RandomException
     */
    public function load(ObjectManager $manager): void
    {
        $users = $manager->getRepository(User::class)->findAll();

        $index = 0;

        foreach ($users as $user) {
            $token = new Token();
            $token->setTokenValue(bin2hex(random_bytes(16)));
            $token->setType("Je suis le type". $index);
            $token->setUser($user);

            $manager->persist($token);
            $index++;
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 6;
    }
}
