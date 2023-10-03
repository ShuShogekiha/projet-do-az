<?php

namespace app\core\controllers;

use app\core\models\BDD;
use PDO;

class ListItemController
{

    public static function getViewListItem(): void
    {
        $myArticle = self::getListArticle();

        require_once('./core/views/listItem.php');
    }

    public static function getListArticle(): string
    {
        $idUser = $_SESSION['utilisateur']->getId();

        $result = "";
        $bdd = new BDD;
        $call = $bdd->findMyArticle();
        $call->bindParam(1, $idUser, PDO::PARAM_STR);

        if ($call->execute()) {
            foreach ($call->fetchAll() as $article) {
                $result .= '<div class="article">
                    <img class="article-img" src="' . $article["img"] . '" alt="illustration de ' . $article["designation"] . '">
                    <h3 class="article-titre">' . $article["designation"] . '</h3>
                        <p class="article-prix_modif">' . $article["prix"] . '€</p>
                        <a class="article-suppression" href="?DeleteArticle">X</a>
                        <a class="article-modifier" href="./?query=EditItem&id=' . $article['id'] . '">Modifier</a>
                </div>';
            }
        } else {
            $result = '<p>Pas d\'article disponible</p>';
        }

        return $result;
    }
}