<?php

// §§§§§§§§§§§§§§§§§§§§§§§§§ LE CONTROLER FAIT LE LIEN ENTRE LA VUE ET LE MODELE §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
require('Modele.php');

try {
    $recipe = getRecipe();
    $recipes = getThreeLasteRecipes();
    $coms = getThreeLastReviews();
    //affichage des données
    require('vueAccueil.php');
} catch (PDOException $e) {
    $msgErreur = $e->getMessage();
    require('vueErreur.php');
}





?>
