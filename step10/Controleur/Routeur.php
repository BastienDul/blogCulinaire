<?php

//Routeur.php

require_once 'controleurAccueil.php';
require_once 'controleurRecette.php';
require_once './Vue/Vue.php';

class Routeur{

    private $ctrlAccueil;

    private $ctrlRecette;

    public function __construct(){
        $this->ctrlAccueil = new ControleurAccueil();

        $this->ctrlRecette = new ControleurRecette();
    }

    //traite une requêtes entrante 

    public function routerRequete(){
        try {
    
            if (isset($_GET['action'])) {
                if($_GET['action']== "recette"){
                    if (isset($_GET['id'])){
                    $idrecette = intval($_GET['id']);
                    if($idrecette !=0){
                        $this->ctrlRecette->oneRecipe($idrecette);
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
                    
               $this->ctrlAccueil->accueil();
                
            }
           
        
        } catch (Exception $e) {
           $this->erreur($e->getMessage());
        }
        
    }

    //Affichage erreur 

    private function erreur($msgErreur){
        $vue = new Vue("Erreur");
        $vue->generer(['msgErreur' => $msgErreur]);
    }
}