<?php

namespace App\Service\Parsers;

use App\Helpers\UrlHelper;
use App\Service\DownloaderService;

class ParserService
{
    private DownloaderService $downloader;
    protected string $page = '';
    protected string $domain = '';

    public function __construct($url)
    {
        $this->downloader = new DownloaderService();
        $this->page = $this->downloader->get($url);
        $this->domain = UrlHelper::getDomain($url);
    }

    protected function get()
    {
        return $this->page;
    }
}
