<?php


namespace App\Controleur;

use App\Modele\Recette;
use App\Modele\Commentaire;
use App\Vue\Vue;

// require_once './Modele/Recette.php';
// require_once './Modele/Commentaire.php';
// require_once './Vue/Vue.php';


class ControleurAccueil
{
    private $recette;
    private $commentaire;

    public function __construct()
    {
        $this->recette = new Recette();
        
        $this->commentaire = new Commentaire();
    }

    // Affiche la recette à la une
    // Affiche les 3 dernières recettes
    // Affiche les 3 derniers commentaires
    public function accueil()
    {
        $recipe = $this->recette->getRecipe();
        $recipes = $this->recette->getThreeLastRecipes();
        $tuple = $this->commentaire->getThreeLastReviews();
        $vue = new Vue("Accueil");
        $vue->generer(array('recipe' => $recipe, 'recipes' => $recipes, 'tuple' => $tuple));
    }
}
