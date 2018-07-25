<?php
/**
 * Created by PhpStorm.
 * User: Alan
 * Date: 25/07/2018
 * Time: 10:19
 */

namespace Perruque\Models;


class Perruque {
    function create($title, $description, $prix, $quantity, $picture_url) {
        $db = new \Database();
        $sql = "INSERT INTO perruques (title, description, price, quantity, picture_url) VALUES (?,?,?,?,?)";
        return $db->executeSql($sql, [$title, $description, $prix, $quantity, $picture_url]);
    }
}