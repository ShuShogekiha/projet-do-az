<?php

namespace app\core\controllers;

use app\Autoloader;
use app\core\models\BDD;
use app\core\models\Utilisateurs;
use PDO;

require_once('../../Autoload.php');


class ConnexionUtilisateurController {
    private BDD $bdd;
    
    public function __construct() {
        Autoloader::register();
        $this->bdd = new BDD;
    }

    public function connexion(): ?string {
        $user = new Utilisateurs($_POST['email'], null, $_POST['pass'], false, 0);
        $mail = $user->getMail();
        
        $call = $this->bdd->connexion();
        $call->bindParam(1, $mail, PDO::PARAM_STR);
        
        if($call->execute()) {
            $donnees = $call->fetch();

            if(password_verify($user->getPassword(), $donnees['password'])) {
                session_start();
                
                $user->setId($donnees['id']);
                $user->setPassword(null);
                $user->setConnexion(true);

                $_SESSION['utilisateur'] = $user;

                header("location: ../../index.php");
            } else {
                // $timeout = 3;

                // return "Mauvais identifiant ou mot de passe redirection dans ". $timeout ." secondes";
                return "Mauvais identifiant ou mot de passe";
                // sleep($timeout);

                // header("location: ../../index.php");
            }
        }
    }
}

$fonction = new ConnexionUtilisateurController;
	
if(isset($_POST['email'], $_POST['pass'])) {
    echo $fonction->connexion();
}