<?php

namespace app\core\controllers;

use app\core\models\BDD;
use PDO;

class AllItemController
{
    private static int $limit = 4;

    private static int $page = 0;

    public static function getViewAllItem(): void
    {
        self::checkValidatorPage();
        $listArticle = self::getAllArticle();

        require_once('./core/views/allItem.php');
    }

    private static function checkValidatorPage(): void {
        self::$page = isset($_GET['page']) ? $_GET['page'] -1 : 0;

    }

    public static function getAllArticle(): string
    {
        $result = '<div class="allItem">';

        $offset = self::$page * self::$limit;

        $bdd = new BDD;
        $call = $bdd->findAllArticle();
        $call->bindParam(1, self::$limit, PDO::PARAM_INT);
        $call->bindParam(2, $offset, PDO::PARAM_INT);

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

            $result .= self::getPagination($bdd);
        } else {
            $result = '<p>Pas d\'article disponible</p>';
        }

        return $result;
    }

    private static function getPagination(BDD $bdd): ?string {
        $call = $bdd->countMaxItem();
        
        if ($call->execute()) {
            $donnees = $call->fetch();

            $result = '</div>
            <div class="pagination">';

                if(self::$page > 0) {
                    $result .= '<a class="pagi" href="?query=AllItem&page=' . self::$page . '"> &lt; </a>';
                }

                $result .= '<span>' . number_format(self::$page +1) . '</span>';
                
                if($donnees['nb_articles'] != self::$page + 1 * 3) {
                    $result .= '<a class="pagi" href="?query=AllItem&page=' . number_format(self::$page + 2) . '"> &gt; </a>';
                }
                
            return $result .= '</div>';
        }
    }
}