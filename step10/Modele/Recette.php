<?php

namespace App\Modele;

use App\Modele\Modele;

// require_once('Modele/Modele.php');

// La classe Recette hérite de la classe Modele
class Recette extends Modele
{
    // Récupère une recette en fonction de son ID
    public function getone($idrecette)
    {
        // Requête SQL pour récupérer une recette spécifique
        $sql = "SELECT * FROM t_recipe WHERE rec_id = ?";
        // Exécution de la requête avec l'ID de la recette en tant que paramètre
        $seule = $this->executerRequete($sql, array($idrecette));
        // Vérification du nombre de lignes retournées
        if ($seule->rowCount() == 1) {
            // Renvoie de la ligne correspondante
            return $seule->fetch();
        } else {
            // Génération d'une exception si aucune recette ne correspond à l'identification
            throw new Exception("Aucune recette ne correspond à l'identification");
        }
    }

    // Récupère une recette au hasard
    public function getRecipe()
    {
        // Requête SQL pour récupérer une recette aléatoire
        $sql = 'SELECT * FROM t_recipe ORDER BY RAND() LIMIT 1';
        // Exécution de la requête
        $recipe =  $this->executerRequete($sql);
        // Renvoie de la recette récupérée
        return $recipe->fetch();
    }

    // Récupère les trois dernières recettes ajoutées
    public function getThreeLastRecipes()
    {
        // Requête SQL pour récupérer les trois dernières recettes
        $sql = 'SELECT * FROM t_recipe ORDER BY rec_id DESC LIMIT 3';
        // Exécution de la requête
        $recipes =  $this->executerRequete($sql);
        // Renvoie de toutes les recettes récupérées
        return $recipes->fetchAll();
    }
}
