<?php
/**
 * Created by PhpStorm.
 * User: Alan
 * Date: 26/07/2018
 * Time: 12:18
 */

namespace Perruque\Classes;


class Tools {
    static function redirect($route_name) {
        global $app;
        return $app->redirect($app['url_generator']->generate($route_name));
    }

    static function get_root_dir() {
        // D:\program\dev\wamp\www\live08\06.silex
        return __DIR__ . "/../../";
    }


    static function get_server_root() {
        //  http://localhost:80/live08/06.silex/index.php
        return 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
    }

    static function get_random_name() {
        return md5(uniqid(rand(), true));
    }

}