<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

$app = new Silex\Application();


/*********************************************************
 *                    CONFIGURATION
 *********************************************************/

$app['debug'] = false;

// Dépendances des formulaires
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.domains' => array(),
));

// installation du gestionaire de formulaire
$app->register(new \Silex\Provider\FormServiceProvider());


// Bundle TWIG (gestionaire de template)
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/www/view',
));

// Bundle ASSETS (pour gérer assets tel que js, css...)
$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1',
    'assets.version_format' => '%s?version=%s',
    'assets.named_packages' => [
        'css' => ['version' => 'css3', 'base_path' => '/www/css'],
    ],
));

// Extention TEXT pour TWIG (permet l'utilisation de fonction comme truncate)
$app['twig']->addExtension(new Twig_Extensions_Extension_Text());

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

// admin
$app->get('/admin', 'Perruque\Controllers\Page::display_admin')->bind('admin');
$app->get('/admin/perruque', 'Perruque\Controllers\Perruque::display_admin_index')->bind('admin_perruque');
$app->match('/admin/perruque/create', 'Perruque\Controllers\Perruque::display_admin_create')->bind('admin_perruque_create');

$app->run();

