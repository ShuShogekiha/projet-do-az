<?php

    namespace app;

    use app\Autoloader;

    require_once('./Autoload.php');

    Autoloader::register();

    session_start();

    $ctrlName = 'Accueil';

    // Vérifie qu'un paramètre "query" existe dans l'URL
    // et qu'il n'est pas vide
    if(isset($_GET["query"])){
        $ctrlName = $_GET["query"];
    }

    call_user_func(array('app\core\controllers\\'. $ctrlName .'Controller', 'getView'. $ctrlName));
/*
systeme de vote
systeme de pagination

const LIMITE = 10;


REQUETE PAGE ACCUEIL OU PAGE 1 : 
$offset = 0
SELECT * FROM matable LIMIT LIMITE OFFSET $offset;

REQUETE PAGE 2 :
$offset = (numeroDeLaPage -1) * LIMITE;
SELECT * FROM matable LIMIT 10 OFFSET $offset;
*/
?>