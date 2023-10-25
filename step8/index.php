<?php

require ('./Controleur/controleur.php');



try {
    
    if (isset($_GET['action'])) {
        if($_GET['action']== "recette"){
            if (isset($_GET['id'])){
            $idrecette = intval($_GET['id']);
            if($idrecette !=0){
                oneRecipe($idrecette);
            }else{
                throw new Exception("Id non valide", 3);
            }
            }else{
                throw new Exception("Id inexsistant", 2);
            }
        } else {
            
            throw new Exception("Action non valide", 1);
            
            
        }
    } else {
            
        accueil();
        
    }
   

} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require('vueErreur.php');
}






?>
