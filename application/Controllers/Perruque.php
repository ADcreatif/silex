<?php
/**
 * Created by PhpStorm.
 * User: Alan
 * Date: 25/07/2018
 * Time: 10:28
 */

namespace Perruque\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Perruque\Models\Perruque as PerruqueModel;

class Perruque {

    function display_index(Application $app) {
        $perruqueModel = new PerruqueModel();
        return $app['twig']->render('perruque.twig', ['perruque' => $perruqueModel]);
    }

    function display_admin_index(Application $app) {
        $perruqueModel = new PerruqueModel();
        return $app['twig']->render('admin/perruque_index.twig', ['perruque' => $perruqueModel]);
    }

    function display_admin_create(Application $app, Request $request) {

        $form = '';

        if ($request->get('add_perruque') == "") {
            $title = $request->get('title');
            $description = $request->get('description');
            $picture_url = $request->get('picture_url');
            $price = floatval($request->get('price'));
            $quantity = intval($request->get('quantity'));

            $perruque_model = new PerruqueModel();
            $perruque_model->create($title, $description, $picture_url, $price, $quantity);
        }

        return $app['twig']->render('admin/perruque_create.twig');
    }

}