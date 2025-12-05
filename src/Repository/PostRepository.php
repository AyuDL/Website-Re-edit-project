<?php

namespace App\Repository;

use AllowDynamicProperties;
use App\Service\PostSimilarityService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

#[AllowDynamicProperties]
class PostRepository extends ServiceEntityRepository
{
    private PostSimilarityService $postSimilarityService;

    public function __construct(PostSimilarityService $postSimilarityService) {
        $this->postSimilarityService = $postSimilarityService;
    }

    public function sort(array $userInput): array
    {
        $postData = $this->postSimilarityService->scoreSimilarity($userInput);

        usort($postData, function ($a, $b) {       #usort va trier
            return $b['score'] <=> $a['score'];           #b <=> a veut dire qu'on va le faire en ordre décroissant, a <=> b pour croissant.
        });

        return $postData;
    }
}
