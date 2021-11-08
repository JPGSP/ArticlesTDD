<?php

namespace App\Service;

use PHPHtmlParser\Dom;
use PHPHtmlParser\Options;

class Parser
{
    public static function parse(string $content): array
    {
        $dom = new Dom;
        $dom->setOptions(
            // this is set as the global option level.
            (new Options())
                ->setStrict(false)
                ->setPreserveLineBreaks(true)
        );

        $dom->loadStr($content);
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
