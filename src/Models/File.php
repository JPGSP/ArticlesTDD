<?php

namespace App\Models;

class File
{
    private $path;

    public function __construct(string $fileName)
    {
        $this->path = $fileName;
    }

    public function getAllArticles(): array
    {
        $file = realpath(__DIR__ . sprintf("/../../assets/%s", $this->path));
        $contentDecode = [];

        if ($file) {
            $content = file_get_contents($file);
            $contentDecode = json_decode($content);   
        }

        return $contentDecode;
    }
}