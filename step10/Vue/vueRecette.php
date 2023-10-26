<?php

// Définition du titre de la page
$this->titre = "Bienvenue sur le BlogCulinaire";

?>
<main>
<div class="container">
    <div class="row text-left border justify-content-center bg-dark p-5 rounded">
        <div class="card col-6 rounded" style="width: 18rem;">
            <img src="./contenu/images/<?= $seule['rec_miniature'] ?>" class="card-img-top pt-2" alt="image d'un plat">
            <div class="card-body col-12">
                <h5 class="card-text">
                <?= $seule['rec_nom'] ?>
                </h5>
                <hr>
                <p class="card-text">
                    <?= $seule['rec_resume'] ?>
                </p>
                <hr>
                <p class="card-text">
                    <?= $seule['rec_temps'] ?>
                </p>
                <hr>
                <p class="card-text">
                    <?= $seule['rec-difficulte'] ?>
                </p>
                <hr>
                <p class="card-text">
                    <?= $seule['rec_budget'] ?>
                </p>
                <hr>

            </div>
        </div>
        <div class="col-6 text-light my-auto m-5">
            <p class="card-text">
                <?= $seule['rec_ingredients'] ?>
            </p>
            <hr>
            <p class="card-text">
                <?= $seule['rec_preparation'] ?>
            </p>
        </div>
    </div>


    <div class="row mt-3">
        <?php
        if ($comment !=0) {
            foreach ($comment as $value) {
            ?>
            <div class="col-12 col-lg-6 p-1 m-0">
                <div class="card bg-dark text-light">
                    <div class="card-header text-center">
                        <h4>
                            <?= $value['com_auteur'] ?>
                        </h4>
                    </div>
                    <div class="card-body col-12" height="1000px">
                        <div class="row">
                            <div class="col-6 text-center ">
                                <img src="./contenu/images/<?= $seule['rec_miniature'] ?>" class="rounded-circle w-50"
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

<div class="container bg-dark text-light p-3 mt-5 rounded">
    <div class="row text-center">
        <h4 class="">Ajouter un commentaire</h4>
        <!-- Formulaire pour ajouter un commentaire à la recette -->
        <form method="post" action="index.php?action=commenter">
            <div class="col-12 mt-3">
                <!-- Champ pour saisir le prénom de l'auteur du commentaire -->
                <input type="text" class="w-50" name="auteur" placeholder="Saisissez votre prénom">
            </div>
            <div class="col-12 mt-3">
                <!-- Champ pour saisir le contenu du commentaire -->
                <textarea name="contenu" class="w-50" id="" cols="100" rows="1" placeholder="Saisissez votre commentaire"></textarea>
                <!-- Champ caché pour transmettre l'ID de la recette -->
                <input type="hidden" name="idrecette" value="<?= $seule['rec_id'] ?>">
            </div>
            <div class="col-12 mt-3">
                <!-- Bouton pour envoyer le commentaire -->
                <input type="submit" class="btn btn-warning" value="Envoyer le commentaire">
            </div>
        </form>
    </div>
</div>

<section class="p-5 container">
    <div class="row justify-content-center p-2">
        <div class="col-6 text-center">
            <!-- Lien de retour vers la page d'accueil -->
            <a href="index.php?" class="btn btn-warning">Retour vers la Page d'accueil</a>
        </div>
    </div>
</section>
</main>

