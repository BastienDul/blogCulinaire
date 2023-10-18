<?php

// §§§§§§§§§§§§§§§§§§§§§§§§§ LE CONTROLER FAIT LE LIEN ENTRE LA VUE ET LE MODELE §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
require('Controlers/controler.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "recette") {
            if (isset($_GET['id'])) {
                $idRecette = intval($_GET['id']);
                if ($idRecette != 0) {
                    singleRecipe($idRecette);
                } else {
                    throw new Exception("Id non valide", 3);
                    
                }
                
            } else {
                throw new Exception("ID Inexistant", 2);
                
            }

        } else {
            throw new Exception("Action non valide", 1);
            
        }
        
    } else {
        accueil();
    }
} catch (PDOException $e) {
    $msgErreur = $e->getMessage();
    require('vueErreur.php');
}





?>
