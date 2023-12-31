<?php

namespace app\core\controllers;

use app\core\models\BDD;

class AccueilController {
    
    public static function getViewAccueil(): void {
        $listArticle = self::getArticleByMoment();

        require_once('./core/views/accueil.php');
    }

    public static function getArticleByMoment(): string {
        $result = "";
        $bdd = new BDD;
        $call = $bdd->findArticleByMoment();
        
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
        } else {
            $result = '<p>Pas d\'article disponible</p>';
        }

        return $result;
    }
}