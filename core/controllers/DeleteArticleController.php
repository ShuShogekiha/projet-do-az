<?php

namespace app\core\controllers;

use app\Autoloader;
use app\core\models\BDD;
use PDO;

require_once('../../Autoload.php');

class DeleteArticleController {
    private BDD $bdd;
    
    public function __construct() {
        Autoloader::register();
        $this->bdd = new BDD;
    }

    public function suppressArticle(): ?string {
        $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

        if(!$id) {
            return "L'article n'existe pas ou il à déjà été supprimer";
        }

        $call = $this->bdd->removeArticleById();
        $call->bindParam(1, $id, PDO::PARAM_STR);

        if($call->execute() && $call->rowCount() == 1) {
            header('location: ../../index.php');
        }

        return "Une erreur est survenue";
    }
}

$fonction = new DeleteArticleController;

session_start();
var_dump($_POST['id']);
if($_SESSION && isset($_POST['id'])) {
    var_dump('ici');
    echo $fonction->suppressArticle();
}