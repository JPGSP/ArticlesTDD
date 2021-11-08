<?php

namespace App\Models;

class File
{
    private $path;

    public function __construct(string $fileName)
    {
        $this->path = $fileName;
    }

    private function getFile(): string
    {
        return realpath(__DIR__ . sprintf("/../../assets/%s", $this->path));
    }

    private function getFileContent(string $file): string
    {
        return file_get_contents($file);
    }

    private function getFileDecodeContent(string $file): array
    {
        return json_decode($file);
    }

    public function getAllArticles(): array
    {
        $file = $this->getFile();
        $contentDecode = [];

        if ($file) {
            $content = $this->getFileContent($file);
            $contentDecode = $this->getFileDecodeContent($content);
        }

        return $contentDecode;
    }
}