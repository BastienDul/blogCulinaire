<?php


namespace App\Controleur;


use App\Controleur\ControleurAccueil;
use App\Controleur\ControleurRecette;
use App\Vue\Vue;
use Exception;

// Routeur.php

// Inclusion des classes nécessaires
// require_once 'controleurAccueil.php';
// require_once 'controleurRecette.php';
// require_once './Vue/Vue.php';


// Définition de la classe Routeur
class Routeur
{

    // Instances des contrôleurs
    private $ctrlAccueil;
    private $ctrlRecette;

    // Constructeur de la classe
    public function __construct()
    {
        // Initialisation des contrôleurs
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlRecette = new ControleurRecette();
    }

    // Traite une requête entrante
    public function routerRequete()
    {
        try {
            // Vérification de l'existence du paramètre 'action' dans la requête
            if (isset($_GET['action'])) {
                // Si l'action est 'recette'
                if ($_GET['action'] == "recette") {
                    // Vérification de l'existence du paramètre 'id' dans la requête
                    if (isset($_GET['id'])) {
                        // Conversion de 'id' en entier
                        $idrecette = intval($_GET['id']);
                        // Vérification de la validité de 'idrecette'
                        if ($idrecette != 0) {
                            // Appel de la méthode 'oneRecipe' du contrôleur 'ctrlRecette'
                            $this->ctrlRecette->oneRecipe($idrecette);
                        } else {
                            throw new Exception("Id non valide", 3);
                        }
                    } else {
                        throw new Exception("Id inexistant", 2);
                    }
                } elseif ($_GET['action'] == "commenter") { // Si l'action est 'commenter'
                    // Récupération des données postées
                    if (isset($_POST["idrecette"]) && isset($_POST["auteur"]) && isset($_POST['contenu'])) {
                    $auteur = $_POST['auteur'];
                    $contenu = $_POST['contenu'];
                    $idrecette = $_POST['idrecette'];
                        // Appel de la méthode 'commenter' du contrôleur 'ctrlRecette'
                        $this->ctrlRecette->commenter($auteur, $contenu, $idrecette);
                    } 
                } else {
                    throw new Exception("Action non valide", 1);
                }
            } else { // Si le paramètre 'action' n'est pas défini
                // Appel de la méthode 'accueil' du contrôleur 'ctrlAccueil'
                $this->ctrlAccueil->accueil();
            }
        } catch (Exception $e) {
            // Gestion des exceptions et appel de la fonction 'erreur'
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur)
    {
        // Instanciation de la classe Vue et appel de la méthode 'generer' avec les données de l'erreur
        $vue = new Vue("Erreur");
        $vue->generer(['msgErreur' => $msgErreur]);
    }
}
