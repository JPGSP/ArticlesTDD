<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Article;
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

    public function test_we_have_the_first_article_in_a_file(): void
    {
        $file = new File("articles.json");
        $articleCollection = $file->getAllArticles();
        $firstArticle = $articleCollection[0];

        $this->assertInstanceOf(Article::class, $firstArticle);
    }

    public function test_we_have_the_title_of_the_first_article_in_a_file(): void
    {
        $file = new File("articles.json");
        $articleCollection = $file->getAllArticles();
        $firstArticle = $articleCollection[0];

        $this->assertInstanceOf(Article::class, $firstArticle);
        $this->assertEquals('Places to stay in Rome', $firstArticle->getTitle());
    }

    public function test_we_have_content_parsed_in_the_third_article_of_the_file(): void
    {
        $file = new File("articles.json");
        $articleCollection = $file->getAllArticles();
        $thirdArticle = $articleCollection[2];

        $expectedValue = [];
        $expectedValue[0] = [
            "type"    => "paragraph",
            "content" => "<h1>New York</h1>"
        ];
        $expectedValue[1] = [
            "type" => "img",
            "src"  => "https://via.placeholder.com/1600x1200",
            "alt"  => "New York"
        ];


        $this->assertEquals($expectedValue, $thirdArticle->getContentParsed());
    }

    public function test_we_have_content_parsed_in_the_second_article_of_the_file(): void
    {
        $file = new File("articles.json");
        $articleCollection = $file->getAllArticles();
        $thirdArticle = $articleCollection[1];

        $expectedValue = [];
        $expectedValue[0] = [
            "type"    => "paragraph",
            "content" => "<h1>Paris</h1><br />Here is a list of the best places to stay in Paris:"
        ];
        $expectedValue[1] = [
            "type"    => "text",
            "content" => "\n"
        ];
        $expectedValue[2] = [
            "type" => "paragraph",
            "content"  => "<strong>Hotel 1</strong>\nHotel 1 description"
        ];
        $expectedValue[3] = [
            "type"    => "text",
            "content" => "\n"
        ];
        $expectedValue[4] = [
            "type" => "paragraph",
            "content"  => "<strong>Hotel 2</strong>\nHotel 2 description"
        ];


        $this->assertEquals($expectedValue, $thirdArticle->getContentParsed());
    }
}
