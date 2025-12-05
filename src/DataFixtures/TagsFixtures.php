<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TagsFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $posts = $manager->getRepository(Post::class)->findAll();

        $index = 0;

        foreach ($posts as $post) {
            $tag = new Tag();
            $tag->setTitle("I'm the super title" . $index);
            $tag->setPost($post);

            $manager->persist($tag);
            $index++;
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 5;
    }
}
