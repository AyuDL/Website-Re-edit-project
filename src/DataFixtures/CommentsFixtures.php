<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\File;
use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CommentsFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $users = $manager->getRepository(User::class)->findAll();
        $posts = $manager->getRepository(Post::class)->findAll();
        $files = $manager->getRepository(File::class)->findAll();

        $index = 0;

        foreach ($users as $user) {
            foreach ($posts as $post) {
                foreach ($files as $file) {
                    $comment = new Comment();
                    $comment->setContent("I love comment with a number " . $index);
                    $comment->setDate(new \DateTimeImmutable("now + $index days"));
                    $comment->setPost($post);
                    $comment->setUser($user);
                    $comment->addFile($file);

                    $manager->persist($comment);
                    $index++;
                }
            }
        }

        $manager->flush();
    }
}
