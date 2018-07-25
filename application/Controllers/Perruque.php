<?php
/**
 * Created by PhpStorm.
 * User: Alan
 * Date: 25/07/2018
 * Time: 10:28
 */

namespace Perruque\Controllers;


use Silex\Application;

class Perruque {

    function display_page(Application $app) {
        return $app['twig']->render('perruque.twig');
    }

}