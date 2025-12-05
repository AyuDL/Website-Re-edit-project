<?php

namespace App\Service;

use App\Repository\PostRepository;

class PostSimilarityService
{
    private PostRepository $postRepository;                         #Global pour instancier la variable de mon Repo pour accéder à mes fonctions doctrine.

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    private function splitTagData(): array                              #Fonction qui va permettre de spliter tous les tags de la base de données en mots.
    {
        $allPosts = $this->postRepository->findAll();               #Je récupère toutes les données de la base de données.
        $data = [];

        foreach ($allPosts as $posts) {                             #Je récupère tous les objets Post individuels
            $title = $posts->getTitle();                            #Je prends le titre

            $individualWords = explode(" ", $title);       #Je mets le titre mot par mot pour l'ajouter dans mon tableau

            $data[] = $individualWords;
        }
        return $data;
    }

    public function scoreSimilarity(array $userInput): array         #Fonction qui va donner un score de similarité par rapport à la recherche client.
    {
        $data = $this->splitTagData();                                   #Je récupère tous les tags
        $scoreArray = [];

        foreach ($data as $posts){                                    #Pour chaque tags,
            $score = 0;                                              #Je remets / crée la variable du score à 0 pour prendre le nouveau score.
            $average = 0;
            foreach ($posts as $words){
                foreach($userInput as $userWords) {
                    if (strtolower($userWords) == strtolower($words)) {         #Je compare chaque mots en les mettant en minuscule.
                        $score += 1;                                            #Si un mot est égale, je mets un +1 à mon score
                    }
                }
            }
            if ($score != 0){                                        #Si le score n'est pas à 0,
                $average = $score / count($posts);                    #Je fais la moyenne.
            }

            $scoreArray[] = ['score' => $average, 'post' => $posts];
        }

    return $scoreArray;
    }
}
