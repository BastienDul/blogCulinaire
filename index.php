<?php

try {
    $username = "root";
    $password = "";
    $dsn = "mysql:host=localhost; dbname=bdd_blog_culinaire; port=3306; charset=utf8";
    $db = new PDO($dsn, $username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //throw $th;
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur le BlogCulinaire</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- CSS style -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Le Blog Culinaire</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample05">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <h1 class="text-center my-5">Je vous souhaite la bienvenue sur ce blog culinaire</h1>
    <section class="p-5 container">
        <h1>La recette à la une :</h1>
        <div class="row">
            <?php
            try {
                $username = "root";
                $password = "";
                $dsn = "mysql:host=localhost; dbname=bdd_blog_culinaire; port=3306; charset=utf8";
                $db = new PDO($dsn, $username, $password);

                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }

            $req = $db->query('SELECT * FROM t_recipe ORDER BY RAND() LIMIT 1');
            $recipe = $req->fetch()
                ?>
            <div class="col-sm-12 col-md-6 col-lg-4 offset-lg-4">
                <div class="card" style="width: 18rem;">
                    <img src="images/<?= $recipe['rec_miniature']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $recipe['rec_nom']; ?>
                        </h5>
                        <p class="card-text">
                            <?= $recipe['rec_resume']; ?>
                        </p>
                        <a href="single.php?id=<?= $recipe['rec_id']; ?>" class="btn btn-success">Voir la recette</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="p-5 container">
        <h1>Les 3 dernières recettes :</h1>
        <div class="row">
            <?php
            $req = $db->query('SELECT * FROM t_recipe ORDER BY rec_id DESC LIMIT 3');

            while ($recipes = $req->fetch()) { ?>
                <div class="col-sm-12 col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="images/<?= $recipes['rec_miniature']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $recipes['rec_nom']; ?>
                            </h5>
                            <p class="card-text">
                                <?= $recipes['rec_resume']; ?>
                            </p>
                            <a href="single.php?id=<?= $recipes['rec_id']; ?>" class="btn btn-warning">Voir la recette</a>
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
                    $req = $db->query('SELECT * FROM t_comment AS C INNER JOIN t_recipe AS R ON C.id_rec = R.rec_id ORDER BY com_id ASC LIMIT 3');
                    $db = null;
                    while ($tuple = $req->fetch()) {
                        if ($tuple['com_id'] == 1) { ?>
                            <div class="carousel-item bg-carousel active py-3">
                            <?php } else { ?>
                                <div class="carousel-item bg-carousel py-3">
                                <?php } ?>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-8 text-center">
                                        <p class="fs-5">
                                            <?= $tuple['rec_nom'] ?>
                                        </p>
                                        <p>
                                            <img class="rounded-circle shadow-1-strong mb-4"
                                                src="images/<?= $tuple['rec_miniature'] ?>" alt="avatar"
                                                style="width: 150px;" />
                                        </p>
                                        <p class="text-muted fs-2">
                                            <i class="bi bi-quote"></i>
                                            <?= $tuple['com_contenu'] ?>
                                        </p>
                                        <h2 class="mb-3 fs-3">
                                            <?= $tuple['com_auteur'] ?>
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

    <footer>
        <div class="container">
            <div class="row">
                <p class="text-center">Site réalisé en HTML / CSS / PHP</p>
            </div>
        </div>
    </footer>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>