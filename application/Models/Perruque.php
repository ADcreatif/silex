<?php
/**
 * Created by PhpStorm.
 * User: Alan
 * Date: 25/07/2018
 * Time: 10:19
 */

namespace Perruque\Models;

use Perruque\Classes\Database;

class Perruque {
    function create($title, $description, $picture_url, $price, $quantity) {
        $db = new Database();
        $sql = "INSERT INTO perruques (title, description, picture_url, price, quantity) VALUES (?,?,?,?,?)";
        return $db->executeSql($sql, [$title, $description, $picture_url, $price, $quantity]);
    }

    function get_perruques() {
        $db = new Database();
        return $db->query("SELECT id,title,description,price,quantity,picture_url FROM perruques");
    }
}