<?php

require('Modele.php');

$recipe = getRecipe();
$recipes = getThreeLasteRecipes();
$coms = getThreeLastReviews();

require('vueAccueil.php');

?>
