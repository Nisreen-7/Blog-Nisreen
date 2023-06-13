<?php
use App\Entity\Commentaire;
use App\Entity\Jeux;
use App\Repository\CategorieRepository;
use App\Repository\CommentaireRepository;
use App\Repository\JeuxRepository;

require '../vendor/autoload.php';
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
    <title>ADD JEU</title>
</head>

<body>
    <!-- partie commun avec les page -->
    <header class="row" height="50px">
        <div class="col-2">
            <img src="images/logo3.avif" class="img-fluid rounded " alt="hello" />
        </div>
        <div class="col-10">
            <marquee>
                <p class="marquee-item fs-3 fst-italic p-5 mb-2">
                    Bienvenue dans ma BLOG pour trouver toutes les jeux d'enfant
            </marquee>
        </div>
    </header>


    <!-- menu categorie -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="index.php"
                class=" text-decoration-none shadow-sm p-3 mb-5 bg-body-tertiary rounded link-danger link-opacity-100-hover"><img
                    src="images/home.png" class="img-icon " width="22px" height="22px">Acceuil</a>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <button
                        class="shadow-sm p-3 mb-5 bg-body-tertiary rounded link-danger link-opacity-100-hover btn dropdown-toggle offset"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</button>
                    <ul class="dropdown-menu">
                        <?php foreach ($category as $item) {
                            ?>
                            <li><a href="index.php?id=<?= $item->getId() ?>"
                                    class=" dropdown-item nav-link shadow-sm p-3 mb-5 bg-body-tertiary rounded link-danger link-opacity-100-hover ">
                                    <?= $item->getName() ?>
                                </a></li>
                        <?php } ?>
                    </ul>
                    <a href="add-categorie.php"
                        class=" text-decoration-none shadow-sm p-3 mb-5 bg-body-tertiary rounded link-danger link-opacity-100-hover">Add
                        Nouvel Categorie</a>
                    <a href="#"
                        class=" text-decoration-none shadow-sm p-3 mb-5 bg-body-tertiary rounded link-danger link-opacity-100-hover">Add
                        Nouvel Jeux</a>

                </div>
            </div>
        </div>
    </nav>


    <hr>


    <!-- partie form de ajouter un nouvel jeu -->
    <div class="container shadow-sm p-3 ml-5 bg-body-tertiary rounded">

        <h3>Add-Jeu</h3>
        <form action="#" method="post">
            <div class="mb-3">
                <label for="label">Add Jeu: </label>
                <input type="text" name="label" class="form-control " placeholder="add le nouvel jeu" required>
            </div>
            <div class="mb-3">
                <label for="prix">Add prix: </label>
                <input type="number" name="prix" class="form-control " placeholder="add le prix" required>
            </div>
            <div class="mb-3">
                <label for="description">Add description: </label>
                <input type="textarea" name="description" class="form-control " placeholder="add la description"
                    required>
            </div>
            <div class="mb-3">
                <label for="id_categorie">Add categorie: </label>
                <input type="number" name="id_categorie" class="form-control " placeholder="add l'id du categorie"
                    required>
            </div>
            <div class="mb-3">
                <label for="image">Add image: </label>
                <input type="text" name="image" class="form-control " placeholder="add url de l'image" required>
            </div>

            <button type="submit" class="btn btn-info"> ADD </button>
        </form>
        <?php
        if (isset($_POST['label']) && isset($_POST['description']) && isset($_POST['prix']) && isset($_POST['id_categorie'])) {
            $repo = new JeuxRepository();

            $nouveljeux = new Jeux($_POST['label'], intval($_POST['prix']), $_POST['description'], $_POST['image'], intval($_POST['id_categorie']), 0);
            $repo->postArticle($nouveljeux);
            echo '<p class="text-success">Vous avez ajouter un nouvel jeu avec' . $nouveljeux->getId() . '</p>';
        }
        ?>
    </div>


    <div class="footer">
        <p class="text-center pb-2 bg-info">&copy; Nisreen@gmail.com M2I 2023</p>
    </div>
</body>

</html>