<?php

namespace App\Repository;

use App\Models\Article;

class ArticleRepository extends AbstractRepository
{
    public function getTableName(): string
    {
        return 'article';
    }

    public function findAllArticles()
    {
        $query = "SELECT * FROM article";
        $statement = $this->db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();

        $articles = [];
        foreach ($results as $result) {
            $articles[] = new Article($result);
        }

        return $statement->fetchAll();
    }

    public function createArticle($datas)
    {
        $query = "INSERT INTO "
    }
}
