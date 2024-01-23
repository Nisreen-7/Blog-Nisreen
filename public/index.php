<?php
use App\Entity\Jeux;
use App\Repository\CategorieRepository;
use App\Repository\CommentaireRepository;
use App\Repository\JeuxRepository;

require '../vendor/autoload.php';


$rep = new JeuxRepository();

if (isset($_GET['id'])) {

    $jeux = $rep->listArticleByCategorie($_GET['id']);
} else {


    $jeux = $rep->listArticle();
}

$repocategorie = new CategorieRepository();
$category = $repocategorie->listCategorie();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="./favicon.ico/xx.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <title>BLOG-NISREEN </title>
    <style>
        div.NN {
            background-image: linear-gradient(180deg, #b0e5f7, white);
            width: 90%;
            height: 600px;

        }

        header {
            background-image: linear-gradient(180deg, #42c8f5, white);
        }

        .footer {
            background-color: #83D8F3;
        }
    </style>

</head>

<body>
    <header class="row" height="50px">
        <div class="col-2">
            <img src="images/logo.png" class="img-fluid rounded " alt="hello" />
        </div>
        <div class="col-10">
            <marquee style="color:#000;line-height:200px">
                <p class="marquee-item fs-3 fst-italic p-5 mb-2 ">
                    Bienvenue dans un BLOG-NISREEN pour trouver toutes les jeux d'enfants
            </marquee>
        </div>
    </header>


    <!-- menu categorie -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" id="navbarNavAltMarkup"></span>
            </button>
            <a href="index.php"
                class=" text-decoration-none shadow-sm p-3 mb-5 bg-body-tertiary rounded text-dark link-hover"><img
                    src="images/home.png" class="img-icon " width="22px" height="22px">Acceuil</a>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <button
                        class="shadow-sm p-3 mb-5 bg-body-tertiary rounded text-dark link-hover btn dropdown-toggle "
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</button>
                    <ul class="dropdown-menu">
                        <?php foreach ($category as $item) {
                            ?>
                            <li><a href="index.php?id=<?= $item->getId() ?>"
                                    class=" dropdown-item nav-link shadow-sm p-3 mb-5 bg-body-tertiary rounded text-dark link-hover ">
                                    <?= $item->getName() ?>
                                </a></li>
                        <?php } ?>
                    </ul>
                    <a href="add-categorie.php"
                        class=" text-decoration-none shadow-sm p-3 mb-5 bg-body-tertiary rounded text-dark link-hover">Add
                        Nouvel Categorie</a>
                    <a href="add-jeux.php"
                        class=" text-decoration-none shadow-sm p-3 mb-5 bg-body-tertiary rounded text-dark link-hover">Add
                        Nouvel Jeu</a>

                </div>
            </div>
        </div>
    </nav>


    <!-- partie les jeux -->
    <div class="NN container-fluid h-100">
        <div class="row g-3">
            <?php

            foreach ($jeux as $line) { ?>

                <div class="col-lg-3 col-md-4 col-sm-6 ">
                    <div class="card h-100 shadow-lg p-3 mb-5  rounded">
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

    <div class="footer">
        <p class="text-center mb-2 mt-2"> &copy; 2023 BLOG-NISREEN M2I </p>
    </div>
</body>

</html>