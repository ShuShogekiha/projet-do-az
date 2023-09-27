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
                    <div class="article-prix_modif">
                        <p class="">' . $article["prix"] . '€</p>
                        <a class="" href="./?query=EditItem&id=' . $article['id'] . '">Modifier</a>
                    </div>
                    <form class="article-suppression" action="./core/controllers/DeleteArticleController.php" method="post">
                        <input type="hidden" value="' . $article["id"] . '" name="id">
                        <input type="submit" value="X">
                    </form>
                </div>';
            }
        } else {
            $result = '<p>Pas d\'article disponible</p>';
        }

        return $result;
    }
}
