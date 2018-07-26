<?php

namespace Perruque\Models;

use Perruque\Classes\Database;
use Perruque\Classes\Tools;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Perruque {

    function create($title, $description, $image, $price, $quantity) {
        $db = new Database();

        $image_name = $image ? $this->uploadAction($image) : null;

        $sql = "INSERT INTO perruques (title, description, image_name, price, quantity) VALUES (?,?,?,?,?)";
        return $db->executeSql($sql, [$title, $description, $image_name, $price, $quantity]);
    }

    private function uploadAction(UploadedFile $image) {
        // liste des extentions autorisée
        $allowed_extentions = ['jpg', 'jpeg', 'png', 'gif'];

        // poids maximal d'une image
        $max_file_size = $image->getMaxFilesize();

        // récupération de l'extention du fichier
        $extension = $image->guessExtension();

        // génération d'un nouveau nom de fichier
        $newFileName = Tools::get_random_name() . '.' . $extension;

        // on vérifie que l'extention est autorisé
        if (!in_array($extension, $allowed_extentions))
            throw new \DomainException('cette extention de fichier n\'est pas autorisée');

        // on vérifie que le poids du fichier est ok
        if ($image->getClientSize() > $max_file_size)
            throw new \DomainException('Le fichier envoyé est trop lourd (max ' . number_format($max_file_size / 1000000, 2) . 'mo)');

        $image->move(Tools::get_root_dir() . '/www/img/perruques', $newFileName);
        return $newFileName;
    }

    function delete($perruque_id) {
        $db = new Database();
        $db->executeSql("DELETE FROM perruques WHERE id=?", [$perruque_id]);
    }

    function get_perruques() {
        $db = new Database();
        return $db->query("SELECT id,title,description,price,quantity,image_name FROM perruques");
    }

    function get_perruque($perruque_id) {
        $db = new Database();
        return $db->query("SELECT id,title,description,price,quantity,image_name FROM perruques WHERE id=?", [$perruque_id]);
    }


}