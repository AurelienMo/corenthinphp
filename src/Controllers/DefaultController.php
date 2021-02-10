<?php

namespace App\Controllers;

class DefaultController extends AbstractController
{
    public function home()
    {
        $articles = [
            ['id' => 2, 'title' => 'Mon Titre'],
            ['id' => 4, 'title' => 'Mon Titre 2'],
        ];
        return $this->render(
            'articles/list.html.twig',
            [
                'articles' => $articles,
            ]
        );
    }

    public function listArticles()
    {
        return "<h1>Ma liste d'articles</h1>";
    }
}
