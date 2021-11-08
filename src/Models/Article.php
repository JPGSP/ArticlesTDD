<?php

namespace App\Models;

class Article
{
    private $title;
    private $slug;
    private $content;

    public function __construct(array $article){
        $this->title = $article['title'];
        $this->slug = $article['slug'];
        $this->content = $article['content'];
    }

    public  function getSlug(): string
    {
        return $this->slug;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
