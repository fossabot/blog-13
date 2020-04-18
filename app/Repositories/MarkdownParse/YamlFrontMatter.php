<?php


namespace App\Repositories\MarkdownParse;

use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlFrontMatter
 * @package App\Repositories\MarkdownParse
 */
class YamlFrontMatter
{
    /**
     * @param string $content
     * @return Document
     */
    public static function parse(string $content): Document
    {
        $pattern = '/^[\s\r\n]?---[\s\r\n]?$/sm';

        $parts = preg_split($pattern, PHP_EOL.ltrim($content));

        if (count($parts) < 3) {
            return new Document([], $content);
        }

        $matter = Yaml::parse(trim($parts[1]));

        $body = implode(PHP_EOL.'---'.PHP_EOL, array_slice($parts, 2));

        return new Document($matter, $body);
    }

    /**
     * @param string $path
     * @return Document
     */
    public static function parseFile(string $path): Document
    {
        return static::parse(
            file_get_contents($path)
        );
    }

}
