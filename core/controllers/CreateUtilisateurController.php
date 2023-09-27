<?php

namespace app\core\controllers;

use app\Autoloader;
use app\core\models\BDD;
use app\core\models\Utilisateurs;
use PDO;

require_once('../../Autoload.php');

class CreateUtilisateurController {
    private BDD $bdd;
    private Utilisateurs $user;

    public function __construct() {
        Autoloader::register();
        $this->bdd = new BDD;
    }
    
    public function validationNewUser() {
        
        $this->user = new Utilisateurs(0, $_POST['mail'], $_POST['username'], $_POST['mdp'], false);
        
        $result = $this->emailIsValide();
        
        if(!$result['bool']) {
            return $result['error'];
        } else if(!$this->createNewUser()) {
            return 'Une erreur est survenue lors de la récupération de la requête.';
        } else header("location: ../../index.php");
    }
    
    private function emailIsValide(): array {
        $mail = $this->user->getMail();
        $call = $this->bdd->checkValidationEmail();
        $call->bindParam(1, $mail, PDO::PARAM_STR);

        $statut = $call->execute();

        if(!$statut) {
            return array('bool' => false, 'error' => 'Une erreur est survenue lors de la récupération de la requête.');
        }

        if($call->rowCount() === 0) {
            return array('bool' => true);
        }

        return array('bool' => false, 'error' => 'Email déjà existant');
    }

    private function createNewUser(): bool {
        $mail = $this->user->getMail();
        $name = $this->user->getUsername();
        $pass = $this->user->getPassword();
        $call = $this->bdd->insertNewUser();

        $pass = password_hash($pass, PASSWORD_ARGON2I);

        $call->bindParam(1, $mail, PDO::PARAM_STR);
        $call->bindParam(2, $name, PDO::PARAM_STR);
        $call->bindParam(3, $pass, PDO::PARAM_STR);

        return $call->execute();
    }
}

$fonction = new CreateUtilisateurController;
	
if(isset($_POST['mail'], $_POST['username'], $_POST['mdp'])) {
    echo $fonction->validationNewUser();
}