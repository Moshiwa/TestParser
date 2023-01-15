<?php

namespace App\Service\Parsers;

class TestParser extends ParserService
{
    public function get()
    {
        preg_match_all("/<(\w+)/", $this->page, $matches);
        $tags = $matches[1];
        $result = [];
        foreach ($tags as $tag) {
            if ($tag) {
                $result[$tag] = empty($result[$tag]) ? 0 : $result[$tag];
                $result[$tag] = ++$result[$tag];
            }
        }

        return $result;
    }
}
