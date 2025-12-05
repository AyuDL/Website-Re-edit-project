<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PostsFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $users = $manager->getRepository(User::class)->findAll();

        $index = 0;

        foreach ($users as $user) {
            $post = new Post();
            $post->setTitle("I'm the post number" . $index);
            $post->setDatePost(new \DateTimeImmutable("now + $index days"));
            $post->setUser($user);

            $manager->persist($post);
            $index++;
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 2;
    }
}
