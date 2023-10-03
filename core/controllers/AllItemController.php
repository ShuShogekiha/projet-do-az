<?php

namespace app\core\controllers;

use app\core\models\BDD;

class AllItemController
{

    public static function getViewAllItem(): void
    {
        $listArticle = self::getAllArticle();

        require_once('./core/views/allItem.php');
    }

    public static function getAllArticle(): string
    {
        $result = '<div class="allItem">';
        $bdd = new BDD;
        $call = $bdd->findAllArticle();

        if ($call->execute()) {
            foreach ($call->fetchAll() as $article) {
                $result .= '<div class="card">
                <img src="' . $article["img"] . '" alt="illustration de ' . $article["designation"] . '">
                <div class="important">
                    <p class="info">
                        ' . $article["prix"] . '€
                    </p>
                    <p class="product">
                        ' . $article["designation"] . '
                    </p>
                    </div>
                </div>';
            }
            $result .= '</div>
            <div class="pagination">
                <a class="pagi" href="?query=AllItem&page="' . $_GET["page"] - 1 . '"> &lt; </a>
                <a class="pagi" href="?query=AllItem&page="' . $_GET["page"] + 1 . '">' . $_GET["page"] + 1 . '</a>
                <a class="pagi" href="?query=AllItem&page="' . $_GET["page"] + 1 . '"> &gt; </a>
                
            </div>';
        } else {
            $result = '<p>Pas d\'article disponible</p>';
        }

        return $result;
    }
}