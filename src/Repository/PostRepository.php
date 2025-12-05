<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class PostRepository extends ServiceEntityRepository
{
    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function sort(){

    }
}
