<?php



namespace App\Controleur;

use App\Modele\Commentaire;
use App\Modele\Recette;
use App\Vue\Vue;


// require_once './Modele/Recette.php';
// require_once './Modele/Commentaire.php';
// require_once './Vue/Vue.php';

// Définition de la classe ControleurRecette
class ControleurRecette {

    // Propriétés de la classe
    private $recette;
    private $commentaire;

    // Constructeur de la classe
    public function __construct() {
        // Initialisation des instances de Recette et Commentaire
        $this->recette = new Recette();
        $this->commentaire = new Commentaire;
    }

    // Méthode pour afficher une recette spécifique
    public function oneRecipe($idrecette)
    {
        // Récupération des détails de la recette
        $seule = $this->recette->getone($idrecette);
        // Récupération des commentaires de la recette
        $comment = $this->commentaire->getComments($idrecette);
        // Instanciation de la classe Vue avec le template "Recette"
        $vue = new Vue("Recette");
        // Génération de la vue avec les données de la recette et les commentaires
        $vue->generer(array('seule' => $seule, 'comment' => $comment));
    }

    // Méthode pour ajouter un commentaire
    public function commenter($auteur, $contenu, $idrecette)
    {
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idrecette);
        header('location: index.php?action=recette&id='.$idrecette);

    }
}
