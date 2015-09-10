<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

function markdown($text)
{
    return (new ParsedownExtra)->text($text);
}

$app->get('/', function () use ($app) {
    $content = file_get_contents(base_path().'/README.md');

    if (app('request')->header('X-PJAX')) {
        return markdown($content);
    }

    return view('index', ['content' => $content, 'section' => null]);
});

$app->get('/{section}', function ($section) use ($app) {
    $content = file_get_contents(base_path().'/resources/content/'.$section.'.md');

    if (app('request')->header('X-PJAX')) {
        return markdown($content);
    }

    return view('index', ['content' => $content, 'section' => $section]);
});
