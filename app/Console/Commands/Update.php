<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Update extends Command
{
    public $source = 'https://raw.githubusercontent.com/ziadoz/awesome-php/master/README.md';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the awesomeness';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $data = $this->parseSource();

        $this->writeFiles($data);
    }

    public function readSource()
    {
        return file($this->source);
    }

    public function parseSource()
    {
        $lines = $this->readSource();

        $ignore = true;
        $i = 0;
        $prev = $i;

        foreach ($lines as $line) {
            $line = trim($line);

            if (substr($line, 0, 3) == '## ') {
                if ($line != '## Contributing' && $line != '## Table of Contents') {
                    $sections[$i]['name'] = $line;
                    $ignore = false;
                } else {
                    $ignore = true;
                }
                $prev = $i;
            } elseif (substr($line, 0, 1) == '*' && substr($line, 0, 2) != '* ') {
                // must be a section descriptions
                $sections[$prev]['description'] = $line;
                $prev = $i;
                ++$i;
            } else {
                if (! $ignore && ! empty($line) && substr($line, 0, 2) != '# ' && substr($line, 0, 1) == '*') {
                    $sections[$prev]['links'][] = $line;
                }
            }
        }

        return $sections;
    }

    public function writeFiles($data)
    {
        if (! is_dir('resources/content/')) {
            mkdir('resources/content/');
        }

        $menu = fopen('resources/content/menu.md', 'wb') or die('Unable to open file!');

        foreach ($data as $d) {
            $section_name = $this->cleanFileName($d['name']);

            $file = fopen("resources/content/$section_name.md", 'wb') or die('Unable to open file!');

            fwrite($menu, substr(trim($d['name']), 3)."\n");

            fwrite($file, $d['name']."\n");
            fwrite($file, $d['description']."\n");
            sort($d['links']);
            foreach ($d['links'] as $l) {
                fwrite($file, $l."\n");
            }
            fclose($file);
        }

        // write menu

        fclose($menu);
    }

    public function cleanFileName($name)
    {
        return preg_replace('/[^A-Za-z0-9]/', '-', ltrim($name, '## '));
    }
}
