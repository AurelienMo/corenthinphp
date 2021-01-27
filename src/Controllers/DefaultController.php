<?php

namespace App\Controllers;

class DefaultController
{
    public function home()
    {
        return "<h1>Ma page d'accueil</h1>";
    }

    public function listArticles()
    {
        return "<h1>Ma liste d'articles</h1>";
    }
}
