<?php
require_once __DIR__ . '/vendor/autoload.php';

$app = new Silex\Application();


/*********************************************************
 *                    CONFIGURATION
 *********************************************************/

$app['debug'] = false;

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
$app->error(function (Exception $exception) use ($app) {
    $message = $exception->getMessage();
    return $app['twig']->render('error.twig', ['message' => $message]);
});



/*********************************************************
 *                          ROUTES
 *********************************************************/

$app->get('/', "Perruque\Controllers\Page::home")->bind('home');
$app->get('/contact', "Perruque\Controllers\Page::contact")->bind('contact');
$app->get('/perruque', 'Perruque\Controllers\Perruque::display_page')->bind('perruque');

$app->run();

