<?php

namespace App\Controllers;

use App\Repository\ArticleRepository;

class DefaultController extends AbstractController
{
    /** @var ArticleRepository */
    protected $articleRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
        parent::__construct();
    }

    public function home()
    {
//        $articles = [
//            ['id' => 2, 'title' => 'Mon Titre'],
//            ['id' => 4, 'title' => 'Mon Titre 2'],
//        ];
        $articles = $this->articleRepository->findAllArticles();
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
