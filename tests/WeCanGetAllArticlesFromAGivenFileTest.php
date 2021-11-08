<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\File;

class WeCanGetAllArticlesFromAGivenFileTest extends TestCase
{
    public function test_we_can_get_all_articles_of_a_given_file()
    {
        $existingFile = "articles.json";

        $file = new File($existingFile);
        $articleCollection = $file->getAllArticles();

        $this->assertIsArray($articleCollection);
        $this->assertCount(4, $articleCollection);
    }

    public function test_no_articles_when_file_not_found()
    {
        $file = new File("no-file");
        $articleCollection = $file->getAllArticles();

        $this->assertEmpty($articleCollection);
        $this->assertCount(0, $articleCollection);
    }
}
