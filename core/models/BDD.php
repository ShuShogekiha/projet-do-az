<?php

namespace app\core\models;

use PDO;
use PDOException;
use PDOStatement;

class BDD extends PDO {
    private const LOCATION = "mysql:host=localhost;dbname=do-az";
    private const USER = "root";
    private const PASSWORD = "";
    private ?PDO $connexion;

    public function __construct() {
        try {
            $this->connexion = new PDO(self::LOCATION, self::USER, self::PASSWORD, array(PDO::ATTR_PERSISTENT => true)); 
            $this->connexion->exec("SET CHARACTER SET utf8");
        }
        catch(PDOException $e) {
            echo 'Erreur : '.$e->getMessage().'<br />';
            $this->connexion = null;
        }
    }
    
    /************************** Article **************************/
    public function findAllArticle(): ?PDOStatement {
        // $requete = 'SELECT * FROM articles;';
        $offset = 0;
        $requete = "SELECT * FROM articles LIMIT 3 OFFSET $offset;";
        $result = $this->connexion->prepare($requete) or die(print_r($result->errorInfo(), TRUE));
        return($result);
    }

    /************************** MyArticle **************************/
    public function findMyArticle(): ?PDOStatement {
        $requete = 'SELECT a.* FROM  utilisateursarticles AS ua INNER JOIN articles AS a ON a.id = ua.idArticle WHERE idUser = ?;';
        $result = $this->connexion->prepare($requete) or die(print_r($result->errorInfo(), TRUE));
        return($result);
    }

    /************************** GetArticleById **************************/
    public function findArticleById(): ?PDOStatement {
        $requete = 'SELECT a.* FROM articles AS a INNER JOIN utilisateursarticles AS ua ON ua.idArticle = a.id WHERE a.id = ? AND ua.idUser = ?;';
        $result = $this->connexion->prepare($requete) or die(print_r($result->errorInfo(), TRUE));
        return($result);
    }

    /************************** GetArticleByMoment **************************/
    public function findArticleByMoment(){
        $requete = 'SELECT * FROM articles LIMIT 5;';
        $result = $this->connexion->prepare($requete) or die(print_r($result->errorInfo(), TRUE));
        return($result);
    }

    /************************** EditArticleById **************************/
    public function updateArticleById(): ?PDOStatement {
        $requete = 'UPDATE articles SET designation = ?, img = ?, prix = ? WHERE id = ?';
        $result = $this->connexion->prepare($requete) or die(print_r($result->errorInfo(), TRUE));
        return($result);
    }

    /************************** CreateArticle **************************/

    public function addArticle(): ?PDOStatement {
        $requete = 'BEGIN;
        INSERT INTO articles VALUES (DEFAULT, ?, ?, ?);
        INSERT INTO utilisateursarticles VALUES (DEFAULT, ?, LAST_INSERT_ID());
        COMMIT;';
        $result = $this->connexion->prepare($requete) or die(print_r($result->errorInfo(), TRUE));
        return($result);
    }

    /************************** DeleteArticle **************************/

    public function removeArticleById(): ?PDOStatement {
        $requete = 'DELETE FROM articles WHERE id = ?;';
        $result = $this->connexion->prepare($requete) or die(print_r($result->errorInfo(), TRUE));
        return($result);
    }

    /************************** CreateUtilisateur **************************/

    public function checkValidationEmail(): ?PDOStatement {
        $requete = 'SELECT mail FROM utilisateurs WHERE mail = ?;';
        $result = $this->connexion->prepare($requete) or die(print_r($result->errorInfo(), TRUE));
        return($result);
    }

    public function insertNewUser(): ?PDOStatement {
        $requete = 'INSERT INTO utilisateurs VALUES (DEFAULT, ?, ?, ?);';
        /* EN entreprise 
        $requete = 'INSERT INTO utilisateurs(mail, username, password) VALUES (?, ?, ?);';*/
        $result = $this->connexion->prepare($requete) or die(print_r($result->errorInfo(), TRUE));
        return($result);
    }

    /************************** ConnexionUtilisateur **************************/

    public function connexion(): ?PDOStatement {
        $requete = 'SELECT id, user, mail, password FROM utilisateurs WHERE mail = ?;';
        $result = $this->connexion->prepare($requete) or die(print_r($result->errorInfo(), TRUE));
        return($result);
    }
}