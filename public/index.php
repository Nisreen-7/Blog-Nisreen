<?php
use App\Entity\Jeux;
use App\Repository\CategorieRepository;
use App\Repository\JeuxRepository;

require '../vendor/autoload.php';


$rep = new JeuxRepository();
$jeux = $rep->listArticle();
$repocategorie = new CategorieRepository();
$category = $repocategorie->listCategorie()
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="./favicon.ico/x.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Les jeux </title>
</head>

<body>
    <header class="row">
        <div class="col-2">
            <img src="images/logo.svg" class="img-fluid rounded " alt="hello" />
        </div>
        <div class="col-10">
            <marquee>
                <p class="marquee-item fs-3 fst-italic py-3">
                    Bienvenue dans ma BLOG pour trouver toutes les jeux d'enfant
            </marquee>
        </div>
    </header>
    <nav>
        <a href="">choisir les categorie</a>
        <div>
            <ul type="none">
                <?php foreach ($category as $item) {
                    ?>
                    <li><a>
                            *
                            <?= $item->getName() ?>
                        </a></li>
                <?php } ?>

    </nav>


    <hr>
    <br>
    <div class="container-fluid ">
        <div class="row g-3">
            <?php

            foreach ($jeux as $line) { ?>

                <div class="col-lg-3 col-md-4  col-sm-6 ">
                    <div class="card h-75 shadow-lg p-3 mb-5 bg-body rounded">
                        <img class="card-img-top" src="<?= ($line->getImage()) ?>" height="100%">

                        <div class="card-body">

                            <h3 class="card-title">
                                <?= htmlspecialchars($line->getLabel()) ?>
                            </h3>

                            <p class="card-text">
                                <?= htmlspecialchars($line->getDescription()) ?>
                            </p>
                            <b>
                                <p class="card-text text-end">
                                    <?= htmlspecialchars($line->getPrix()) ?> €
                                </p>
                            </b>

                            <a href="single-jeux.php?id=<?= $line->getId() ?>" class="card-link mb-2 btn btn-primary ">Plus
                                Detailles
                            </a>

                        </div>
                    </div>
                </div>

            <?php }


            ?>
        </div>

    </div>

    <footer>

    </footer>
</body>

</html>