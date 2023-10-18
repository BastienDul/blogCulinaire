<?php
//§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§ LE MODELE SERT A ACCEDER AU DONNEE §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§

function getBdd(){

        $username = "root";
        $password = "";
        $dsn = "mysql:host=localhost; dbname=bdd_blog_culinaire; port=3306; charset=utf8";
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
}
function getRecipe(){
    
        $db = getBdd();
        // Recette a la une
        $recetteALaUne = $db->query('SELECT * FROM t_recipe ORDER BY RAND() LIMIT 1');
        $recipe = $recetteALaUne->fetch();
        return $recipe;
        $db = null;
}

function getThreeLasteRecipes(){
        $db = getBdd();
        // 3 dernière recettes
        $troisDerniereRecette = $db->query('SELECT * FROM t_recipe ORDER BY rec_id DESC LIMIT 3');
        $recipes = $troisDerniereRecette->fetchAll();
        return $recipes;
        $db = null;
}


function getThreeLastReviews(){
        $db = getBdd();
        // Les 3 derniers commentaires
        $troisDerniereCommentaire = $db->query('SELECT * FROM t_comment AS C INNER JOIN t_recipe AS R ON C.id_rec = R.rec_id ORDER BY com_id ASC LIMIT 3');
        $coms = $troisDerniereCommentaire->fetchAll();
        return $coms;
        $db = null;
}

function getSingleRecipe($idRecette){
        $db = getBdd();
        // Afficher le contenu d'une seul recette par son id !
        $uneSeuleRecette = $db->query('SELECT * FROM t_recipe WHERE rec_id ='. $idRecette);
        $singleRecipe = $uneSeuleRecette->fetch();
        return $singleRecipe;
        $db = null;
}

function getCommentWithSingleRecipe($idRecette){
        $db = getBdd();
        // afficher les commentaire en lien avec la recette choisis ! 
        $commentaireEnLienAvecSingleRecette = $db->prepare("SELECT * FROM t_comment WHERE id_rec = ?");
        $commentaireEnLienAvecSingleRecette -> bindValue(1, $idRecette, PDO::PARAM_INT);
        $commentaireEnLienAvecSingleRecette -> execute();
        if ($commentaireEnLienAvecSingleRecette->rowCount()) {
                $comsWithSingleRecipe = $commentaireEnLienAvecSingleRecette -> fetchAll();
                return $comsWithSingleRecipe;
        } else {
               $comsWithSingleRecipe = 0;
               return $comsWithSingleRecipe;
        }
        $db = null;
}


