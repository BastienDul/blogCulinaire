<?php

require_once ('Modele/Modele.php');

class Recette extends Modele{



    public function getone($idrecette)
    {

        $sql = ("SELECT * FROM t_recipe WHERE rec_id = " . $idrecette);
        $seule = $this->executerRequete($sql, array($idrecette));
        if($seule->rowCount() == 1){
            return $seule->fetch();
        }  else{
            throw new Exception("Aucune recette ne correpsond à l'identification");
        }
        
        }
    


    //recette a la une
    public function getRecipe()
    {
        
        $sql = ('SELECT * FROM t_recipe ORDER BY RAND() LIMIT 1');
        $recipe =  $this->executerRequete($sql);
        return $recipe ->fetch();
        
    }


   

    //3 derniere recettes
    public function getThreeLastRecipes()
    {

        $sql = ('SELECT * FROM t_recipe ORDER BY rec_id DESC LIMIT 3');
        $recipes =  $this->executerRequete($sql);
        return $recipes ->fetchAll();
        
    }


   


}