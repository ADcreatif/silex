<?php
require_once __DIR__ . '/vendor/autoload.php';

$app = new Silex\Application();


/*********************************************************
 *                    CONFIGURATION
 *********************************************************/

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/www/view',
));

$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1',
    'assets.version_format' => '%s?version=%s',
    'assets.named_packages' => [
        'css' => ['version' => 'css3', 'base_path' => '/www/css'],
    ],
));


// interception des messages d'erreur
$app->error(function (Exception $exception) {
    return "<p>" . $exception->getMessage() . "</p>";
});


/*********************************************************
 *                          ROUTES
 *********************************************************/

$app->get('/', "Perruque\Controllers\Page::home");
$app->get('/contact', "Perruque\Controllers\Page::contact");


$app->run();

