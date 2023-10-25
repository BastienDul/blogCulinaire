<?php


class Vue{

    public $fichier;


    public $titre;



    public function __construct ($action) {

        $this->fichier = "Vue/Vue$action.php";
    }


    
    // Méthode pour générer une vue en utilisant des données passées en paramètre 
    public function generer($donnees) {

        $contenu = $this->genererFichier($this->fichier,$donnees);
        $vue = $this->genererFichier('Vue/gabarit.php', [

            'titre' => $this->titre,

            'contenu'=> $contenu,
        ]);

        echo $vue;


}

// Méthode pour générer le contenu d'un fichier de vue en utilisant des données
public function genererFichier($fichier, $donnees) {
    if (file_exists($fichier)) { 

        // Extrait les données en variables pour les rendre disponibles dans le fichier de vue
        
        extract($donnees);

        ob_start();

        require  $fichier; 

        return ob_get_clean();
    } else {
        throw new Exception("Fichier $fichier introuvable", 1);
    }
}
}