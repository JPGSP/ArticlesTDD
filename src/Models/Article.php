<?php

namespace App\Models;

use PHPHtmlParser\Dom;
use PHPHtmlParser\Options;

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

    public function getContentType(): array
    {
        $dom = new Dom;
        $dom->setOptions(
            // this is set as the global option level.
            (new Options())
                ->setStrict(false)
                ->setPreserveLineBreaks(true)
        );

        $dom->loadStr($this->content);
		$children = $dom->getChildren();

        $output = [];

        foreach ( $children as $child ) {
            $tagName = $child->getTag()->name();

            if ($tagName === "img") {
                array_push(
                    $output,
                    [
                        "type" => "img",
                        "src"  => $child->getAttribute('src'),
                        "alt"  => $child->getAttribute('alt')
                    ]
                );
            } else {
                array_push(
                    $output,
                    [
                        "type"    => ($tagName === "p") ? "paragraph" : "text",
                        "content" => $child->innerHtml
                    ]
                );
            }
        }
        return $output;
    }
}
