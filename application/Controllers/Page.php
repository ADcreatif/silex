<?php

namespace Perruque\Controllers;

use Silex\Application;

class Page {

    function home(Application $app) {
        return $app['twig']->render('index.twig');
    }

    function contact(Application $app) {
        return $app['twig']->render('contact.twig');
    }


    function display_admin(Application $app) {
        return $app['twig']->render('admin/index.twig');
    }




}