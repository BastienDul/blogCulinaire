<!-- §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§ LA VUE SERT A AFFICHER LES DONNEES §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§ -->

<?php
$titre = "Bienvenue sur le blogCulinaire";
ob_start();
?>

<section class="p-5 container">
    <h1>La recette à la une :</h1>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4 offset-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="./contenu/images/<?= $recipe['rec_miniature']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $recipe['rec_nom']; ?>
                    </h5>
                    <p class="card-text">
                        <?= $recipe['rec_resume']; ?>
                    </p>
                    <a href="index.php?action=recette&id=<?= $recipe['rec_id']; ?>" class="btn btn-success">Voir la recette</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-5 container">
    <h1>Les 3 dernières recettes :</h1>
    <div class="row">
        <?php
        foreach ($recipes as $miam) { ?>
            <div class="col-sm-12 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="./contenu/images/<?= $miam['rec_miniature']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $miam['rec_nom']; ?>
                        </h5>
                        <p class="card-text">
                            <?= $miam['rec_resume']; ?>
                        </p>
                        <a href="index.php?action=recette&id=<?= $miam['rec_id']; ?>" class="btn btn-warning">Voir la recette</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<section class="p-5 container">
    <h1>Les 3 derniers commentaires :</h1>
    <div class="row">
        <div id="carouselExampleSlidesOnly col-sm-12 col-md-6 bg-carousel" class="carousel slide my-5"
            data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php

                foreach ($coms as $commentaire) {
                    if ($commentaire['com_id'] == 1) { ?>
                        <div class="carousel-item bg-carousel active py-3">
                        <?php } else { ?>
                            <div class="carousel-item bg-carousel py-3">
                            <?php } ?>
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8 text-center">
                                    <p class="fs-5">
                                        <?= $commentaire['rec_nom'] ?>
                                    </p>
                                    <p>
                                        <img class="rounded-circle shadow-1-strong mb-4"
                                            src="../images/<?= $commentaire['rec_miniature'] ?>" alt="avatar"
                                            style="width: 150px;" />
                                    </p>
                                    <p class="text-muted fs-2">
                                        <i class="bi bi-quote"></i>
                                        <?= $commentaire['com_contenu'] ?>
                                    </p>
                                    <h2 class="mb-3 fs-3">
                                        <?= $commentaire['com_auteur'] ?>
                                    </h2>
                                </div>
                            </div>
                            <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div><!-- /.carousel-item -->
            </div><!-- /.carousel-inner-->
        </div><!-- /.carousel -->
    </div><!-- /.row -->
</section>

<?php
$contenu = ob_get_clean();

require ('gabarit.php');
?>