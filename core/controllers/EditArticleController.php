<?php

namespace app\core\controllers;

use app\Autoloader;
use app\core\models\BDD;
use PDO;

require_once('../../Autoload.php');

class EditArticleController {
    private BDD $bdd;
    
    public function __construct() {
        Autoloader::register();
        $this->bdd = new BDD;
    }

    public function modificationArticle(): ?string {
        $article = htmlspecialchars($_POST['desi']);
        $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
        $urlImg = filter_var($_POST['link'], FILTER_VALIDATE_URL);
        $idArticle = filter_var($_POST['id'], FILTER_VALIDATE_INT);

        if(!$price) {
            return "Le prix n'est pas valide";
        }

        if(!$urlImg) {
            return "L'url de l'image n'est pas valide";
        }

        if(!$idArticle) {
            return "L'identifiant de l'article n'est pas valide";
        }

        $call = $this->bdd->updateArticleById();
        $call->bindParam(1, $article, PDO::PARAM_STR);
        $call->bindParam(2, $urlImg, PDO::PARAM_STR);
        $call->bindParam(3, $price, PDO::PARAM_STR);
        $call->bindParam(4, $idArticle, PDO::PARAM_STR);

        if($call->execute() && $call->rowCount() == 1) {
            header("Location: ../../index.php");
        }

        return "Une erreur est survenue";
    }
}

$fonction = new EditArticleController;

session_start();

if($_SESSION && isset($_POST['desi'], $_POST['price'], $_POST['link'])) {
    echo $fonction->modificationArticle();
}