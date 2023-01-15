<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ParserProcessCommand extends Command
{
    protected $signature = 'parser:get {url}';

    protected $description = 'Getting site content';

    public function handle()
    {
        $url = $this->argument('url');

        $result = null;
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $type = $this->ask('Enter a parser type', 'test');
            $type = Str::title($type);
            $classname = $type . 'Parser';
            $class = "App\Service\Parsers\\$classname";
            $result = (new $class($url))->get();
        } else {
            $this->error('Not valid url');
        }

        dd($result);
    }
}
