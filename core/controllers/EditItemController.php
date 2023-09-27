<?php

namespace app\core\controllers;

use app\core\models\BDD;
use PDO;

class EditItemController
{

    public static function getViewEditItem(): void
    {
        $donnees = self::getArticleById();
        require_once('./core/views/editItem.php');
    }

    public static function getArticleById()
    {
        $idUser = $_SESSION['utilisateur']->getId();

        $bdd = new BDD;
        $call = $bdd->findArticleById();
        $call->bindParam(1, $_GET['id'], PDO::PARAM_STR);
        $call->bindParam(2, $idUser, PDO::PARAM_STR);

        if (!$call->execute()) {
            header('location: ./index.php');
        }
        
        $response = $call->fetch();

        if(!$response) header('location: ./index.php');

        return $response;
    }
}
