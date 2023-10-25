<?php

function getBdd()

{
    $username = "root";
    $password = "";
    $dsn = "mysql:host=localhost; dbname=bdd_blog_culinaire; port=3306; charset=utf8";
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
   

}


function getRecipe(){

        $db = getBdd();
        $sqlrecipe = $db->query('SELECT * FROM t_recipe ORDER BY RAND() LIMIT 1');
        $recipe = $sqlrecipe->fetch();
        return $recipe;
        $db = null;
    
    
}


function getThreeLastRecipes(){

    $db = getBdd();
    $sqlrecipes = $db->query('SELECT * FROM t_recipe ORDER BY rec_id DESC LIMIT 3');
    $recipes = $sqlrecipes->fetchAll();
    return $recipes;
    $db = null;
   

}

function getThreeLastReviews(){

    $db = getBdd();
    $sqlComs = $db->query('SELECT * FROM t_comment AS C INNER JOIN t_recipe AS R ON C.id_rec = R.rec_id ORDER BY com_id ASC LIMIT 3');
    $tuple = $sqlComs->fetchAll();
    return $tuple;
    $db = null;
   

}


function getone($idrecette){

    $db = getBdd();
    $recetteseul = $db->query("SELECT * FROM t_recipe WHERE rec_id = ".$idrecette);
    $seule = $recetteseul->fetch();
    $db = null; 
    return $seule;
}

// requêtes non préparées

// function getComments($idrecette) {
//     $db = getBdd();
//     $query = ("SELECT * FROM t_comment WHERE id_rec = " . $idrecette);
//     $comment = $db->query($query)->fetchAll();
//     $db = null; 
//     return $comment;
// }


function getComments($idrecette) {

    $db = getBdd();
    $query = "SELECT * FROM t_comment WHERE id_rec = :idrecette";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':idrecette', $idrecette, PDO::PARAM_INT);
    $stmt->execute();
    $comment = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
    return $comment;
}
