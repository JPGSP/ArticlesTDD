<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\File;

class ArticleController
{
    public static function get()
    {
        $myFile = new File("articles.json");
        return $myFile->getAllArticles();
    }

    public static function getById($id)
    {
        $myFile = new File("articles.json");
        $articles = $myFile->getAllArticles();
        $articleToReturn;

        foreach($articles as $article) {
            if ($article['id'] == $id) {
                $articleToReturn =  $article;
                break;
            }
        }

        return $article;
    }
}
