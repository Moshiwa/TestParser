<?php

namespace App\Helpers;

class UrlHelper
{
    public static function getDomain(string $url): string
    {
        $result = '';
        $parts = parse_url($url);
        if ($parts['scheme'] && $parts['host']) {
            $result = $parts['scheme'] . '://' . $parts['host'] . '/';
        }

        return $result;
    }
}
