<?php

namespace Perruque\Controllers;

use Silex\Application;

class Page {

    function home(Application $app) {
        return $app['twig']->render('home.twig');
    }

    function contact(Application $app) {
        return $app['twig']->render('contact.twig');
    }
}