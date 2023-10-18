<?php
require('./Modeles/Modele.php');

// Afficher la page d'accueil
function accueil()
{
    $recipe = getRecipe();
    $recipes = getThreeLasteRecipes();
    $coms = getThreeLastReviews();
    //affichage des données
    require('./Views/vueAccueil.php');
}

// Afficher les détails d'une recette
function singleRecipe($idRecette)
{
    $singleRecipe = getSingleRecipe($idRecette);
    $comsWithSingleRecipe = getCommentWithSingleRecipe($idRecette);
    //affichage des données
    require('./Views/vueRecetteSeule.php');
}

// Afficher les messages d'erreur
function erreur($msgErreur)
{
    require('./Views/vueErreur.php');
}