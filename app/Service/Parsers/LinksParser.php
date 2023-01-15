<?php

namespace App\Service\Parsers;


use Illuminate\Support\Str;

class LinksParser extends ParserService
{
    public function get()
    {
        preg_match_all("/href=(\S+)/", $this->page, $matches);
        $links = $matches[1];
        $result = [];
        foreach ($links as $link) {
            if ($link) {
                if (! Str::contains($link, 'http')) {
                    $link = $this->domain . $link;
                }

                $result[$link] = $link;
            }
        }

        return $result;
    }
}
