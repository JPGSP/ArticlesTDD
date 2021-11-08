<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\File;

class WeCanGetAllArticlesFromAGivenFileTest extends TestCase
{
    public function test_we_can_get_all_articles_of_a_given_file(): void
    {
        $existingFile = "articles.json";

        $file = new File($existingFile);
        $articleCollection = $file->getAllArticles();

        $this->assertIsArray($articleCollection);
        $this->assertCount(4, $articleCollection);
    }

    public function test_no_articles_when_file_not_found(): void
    {
        $file = new File("no-file");
        $articleCollection = $file->getAllArticles();

        $this->assertEmpty($articleCollection);
        $this->assertCount(0, $articleCollection);
    }

    public function test_we_have_title_first_article_in_a_file(): void
    {
        $file = new File("articles.json");
        $articleCollection = $file->getAllArticles();
        $firstArticle = $articleCollection[0];

        $this->assertInstanceOf(Article::class, $firstArticle);
        $this->assertEquals('Places to stay in Rome', $firstArticle->getTitle());
    }
}
