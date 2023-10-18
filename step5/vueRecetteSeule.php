<?php $titre = "Bienvenue sur le blogCulinaire";
ob_start();
?>
<div class="container">
    <div class="row text-left border justify-content-center bg-dark p-5 rounded">
        <div class="card col-6 rounded" style="width: 18rem;">
            <img src="../images/<?= $singleRecipe['rec_miniature'] ?>" class="card-img-top pt-2" alt="image d'un plat">
            <div class="card-body col-12">
                <h5 class="card-text">
                <?= $singleRecipe['rec_nom'] ?>
                </h5>
                <hr>
                <p class="card-text">
                    <?= $singleRecipe['rec_resume'] ?>
                </p>
                <hr>
                <p class="card-text">
                    <?= $singleRecipe['rec_temps'] ?>
                </p>
                <hr>
                <p class="card-text">
                    <?= $singleRecipe['rec-difficulte'] ?>
                </p>
                <hr>
                <p class="card-text">
                    <?= $singleRecipe['rec_budget'] ?>
                </p>
                <hr>

            </div>
        </div>
        <div class="col-6 text-light my-auto m-5">
            <p class="card-text">
                <?= $singleRecipe['rec_ingredients'] ?>
            </p>
            <hr>
            <p class="card-text">
                <?= $singleRecipe['rec_preparation'] ?>
            </p>
        </div>
    </div>




    <div class="row mt-3">
        <?php
        if ($comsWithSingleRecipe !=0) {
            foreach ($comsWithSingleRecipe as $value) {
            ?>
            <div class="col p-1 m-0">
                <div class="card bg-dark text-light">
                    <div class="card-header text-center">
                        <h4>
                            <?= $value['com_auteur'] ?>
                        </h4>
                    </div>
                    <div class="card-body col-12">
                        <div class="row">
                            <div class="col-6 text-center ">
                                <img src="../images/<?= $singleRecipe['rec_miniature'] ?>" class="rounded-circle w-50"
                                    alt="avatar">
                            </div>
                            <div class="col-6 text-left">
                                <h5 class="card-title">
                                    Commentaire de
                                    <?= $value['com_auteur'] ?> :
                                </h5>
                                <p class="card-text">
                                    <?= $value['com_contenu'] ?>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php } 
    }else {
        echo '<p> Il n\'y a pas de commentaire pour cette recette !</p>';
    }?>
    </div>
</div>




<?php
$contenu = ob_get_clean();
require('gabarit.php');
?>