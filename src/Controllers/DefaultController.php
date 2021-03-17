<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Article;
use App\Repository\ArticleRepository;

class DefaultController extends AbstractController
{
//    /** @var ArticleRepository */
//    protected $articleRepository;

    public function __construct()
    {
//        $this->articleRepository = new ArticleRepository();
        parent::__construct();
    }

    public function home(Request $request)
    {
        $article = new Article(['title' => 'Mon titre à éditer']);
        $errors = [];
        if ($request->isMethod('POST')) {
            $dataForm = $request->getPost();
            $article = new Article($dataForm);
            if ($article->getTitle() === '') {
                $errors[] = 'Le titre ne doit pas être vide';
            }
            if (count($errors) === 0) {
                //TODO Insertion en base de données
                //TODO Redirection de l'utilisateur
                $this->redirect('?page=list');
            }
        }

        return $this->render(
            'articles/list.html.twig',
            [
                'errors' => $errors,
                'article'=> $article,
            ]
        );
    }

    public function listArticles(Request $request)
    {
        return "<h1>Ma liste d'articles</h1>";
    }

    public function notFound()
    {
        return "<h1>Page Not found</h1>";
    }
}
