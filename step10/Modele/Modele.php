<?php

namespace App\Modele;
use PDO;

// Classe abstraite Modele
abstract class Modele
{
    // Propriété privée pour la connexion à la base de données
    private $bdd;

    // Méthode pour exécuter une requête SQL avec ou sans paramètres
    protected function executerRequete($sql , $params = null){
        // Vérification de la présence de paramètres
        if($params == null){
            // Exécution directe de la requête
            $resultat =$this->getBdd()->query($sql);
        } else {
            // Préparation de la requête et exécution avec les paramètres
            $resultat =$this->getBdd()->prepare($sql);
            $resultat->execute($params);
        }
        // Renvoi du résultat de la requête
        return $resultat;
    }

    // Méthode privée pour obtenir la connexion à la base de données
    private function getBdd():PDO{
        // Vérification de la présence d'une connexion à la base de données
        if($this->bdd === null){
            // Paramètres de connexion à la base de données
            $username = "root";
            $password = "";
            $dsn = "mysql:host=localhost; dbname=bdd_blog_culinaire; port=3306; charset=utf8";
            // Création d'une nouvelle instance de PDO
            $this->bdd = new PDO($dsn, $username, $password);
            // Configuration des attributs de la connexion PDO
            $this->bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        // Renvoi de la connexion à la base de données
        return $this->bdd;
    }
}
