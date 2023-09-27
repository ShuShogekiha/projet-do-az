<?php

namespace app\core\controllers;

class ConnexionController {
    
    public static function getViewConnexion(): void {
        require_once('./core/views/connexion.php');
    }
}