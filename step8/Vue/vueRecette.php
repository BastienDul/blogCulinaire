<?php 
$titre = "Bienvenue sur le BlogCulinaire";
ob_start();
?>

<section class="p-5 container">
    <h1 class="">Détail de la recette :</h1>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card" style="width: 40rem;">
                <img src="./contenu/images/<?= $seule['rec_image']; ?>" class="card-img-top img-fluid" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $seule['rec_nom']; ?> </h5>
                    <p class="card-text"><?= $seule['rec_resume']; ?></p>
                    <p><?= $seule['rec_temps']; ?></p>
                    <p><?= $seule['rec-difficulte']; ?></p>
                    <p><?= $seule['rec_budget']; ?></p>
                    <p><?= $seule['rec_ingredients']; ?></p>
                    <p><?= $seule['rec_preparation']; ?></p>
                    <p><?= $seule['rec_categorie']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="p-5 container">
    <div class="row text-center ">
                <h5> Commentaire :</h5>
                <?php if (empty($comment)) { ?>
                <p>Pas de commentaire pour cette recette</p>
                <?php } else  {
                foreach ($comment as $value) { ?>
                <p><?= $value['com_auteur']; ?> </p>
                <p><?= $value['com_contenu']; ?> </p>
                
                 <?php } 
                }?>
              
    </div>
</section>

<section class="p-5 container">
    <div class="row justify-content-center p-2">
        <div class="col-6 text-center"> 
            <a href="index.php?" class="btn btn-warning">Retour vers la Page d'accueil</a>
        </div>
    </div>
</section>


<?php 
$contenu = ob_get_clean();
require('./Vue/gabarit.php');
?>


