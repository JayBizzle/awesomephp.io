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

function markdown($text) {
	return (new ParsedownExtra)->text($text);
}

$app->get('/', function () use ($app) {
    return view('index', ['section' => 'woop']);
});

$app->get('/{section}', function ($section) use ($app) {
	$content = file_get_contents(base_path().'/resources/content/'.$section.'.md');
    return view('index', ['section' => $content]);
});
