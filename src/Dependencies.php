<?php namespace biroa;

use Auryn\Injector;
use Mustache_Loader_FilesystemLoader;
use Dotenv\Dotenv;

$dotenv = new Dotenv('../');
$dotenv->load();

$injector = new Injector;

$injector->define('ResultController', ['ParserInterface' => 'ParserHelper']);
$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');
$injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER,
]);

$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');
$injector->alias('biroa\Template\Renderer', 'biroa\Template\MustacheRenderer');

$injector->define('Mustache_Engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
            'extension' => '.html',
        ]),
    ],
]);

return $injector;