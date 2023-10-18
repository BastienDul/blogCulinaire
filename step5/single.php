<?php

// §§§§§§§§§§§§§§§§§§§§§§§§§ LE CONTROLER FAIT LE LIEN ENTRE AL VUE ET LE MODELE §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
require('Modele.php');

try {
    
    //affichage des données
    $idRecette = $_GET['id'];
    if (isset($idRecette)) {
        if ($idRecette != 0) {
            $singleRecipe = getSingleRecipe($idRecette);
            $comsWithSingleRecipe = getCommentWithSingleRecipe($idRecette);
            require('vueRecetteSeule.php');
        } else {
           throw new Exception ('ID incorrect');
        }
    } else {
        throw new Exception ('L\'ID ne correspond pas à une recette');
    }

    
} catch (PDOException $e) {
    $msgErreur = $e->getMessage();
    require('vueErreur.php');
}




?>