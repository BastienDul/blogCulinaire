<?php



namespace App\Modele;

use App\Modele\Modele;
// require_once('Modele/Modele.php');

// La classe Commentaire hérite de la classe Modele
class Commentaire  extends Modele
{
    // Récupère les commentaires pour une recette spécifique
    public function getComments($idrecette)
    {
        $sql = "SELECT * FROM t_comment WHERE id_rec = ?";
        $stmt = $this->executerRequete($sql, array($idrecette));
        if ($stmt->rowCount() >= 1) {
            return $stmt->fetchAll();
        }
        //else{
        //throw new Exception("Aucun commentaire ne correspond à l'identification");
        //}
    }

    // Récupère les trois derniers commentaires ajoutés
    public function getThreeLastReviews()
    {
        $sql = 'SELECT * FROM t_comment AS C INNER JOIN t_recipe AS R ON C.id_rec = R.rec_id ORDER BY com_id ASC LIMIT 3';
        $tuple = $this->executerRequete($sql);
        return $tuple->fetchAll();
    }

    // Ajoute un commentaire à une recette
    public function ajouterCommentaire($auteur, $contenu, $idrecette){

        $sql ='INSERT INTO t_comment (com_auteur, com_contenu, id_rec ) VALUES (:auteur, :contenu, :idrecette)';
        $this->executerRequete($sql, array('auteur' => $auteur, 'contenu' => $contenu, 'idrecette' => $idrecette));
        
    }
}
