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
        $passwordFromToDatabase = '$2y$10$ZN178k.EkU9IF2eNBB2He.hgWPicaLsI7aAlReRKA//3sp3g2XcxO';

        $identifier = 'toto@toto.com';
        $password = 'monsupermotdepasse';

        $isPasswordValid = password_verify($password, $passwordFromToDatabase);
//        var_dump($_SESSION);
//        if (password_verify($password, $passwordFromToDatabase)) {
//            //TODO Je stocke l'information sur la connexion réussi de l'utilisateur en session
//            $userInformation = [
//                'firstname' => 'John',
//                'lastname' => 'Doe',
//                'isAdmin' => true,
//            ];
//            $request->addEntryToSession('user', $userInformation);
//        }



        $article = new Article(['title' => 'Mon titre à éditer']);
//        $errors = [];
//        if ($request->isMethod('POST')) {
//            $dataForm = $request->getPost();
//            $article = new Article($dataForm);
//            if ($article->getTitle() === '') {
//                $errors[] = 'Le titre ne doit pas être vide';
//            }
//            if (count($errors) === 0) {
//                //TODO Insertion en base de données
//                //TODO Redirection de l'utilisateur
//                $this->redirect('?page=list');
//            }
//        }

        return $this->render(
            'articles/list.html.twig',
            [
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
