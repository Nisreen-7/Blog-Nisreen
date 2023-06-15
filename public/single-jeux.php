<?php
use App\Entity\Commentaire;
use App\Entity\Jeux;
use App\Repository\CategorieRepository;
use App\Repository\CommentaireRepository;
use App\Repository\JeuxRepository;

require '../vendor/autoload.php';

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
    <title>single-Jeux</title>
    <style>
        div.NN {
            background-image: linear-gradient(180deg, #b0e5f7, white);
            width: 33%;


        }

        header {
            background-image: linear-gradient(180deg, #42c8f5, white);
        }
        .footer {
            background-color: #42c8f5;
        }
    </style>

</head>

<body>
    <!-- partie commun avec les page -->
    <header class="row" height="50px">
        <div class="col-2">
            <img src="images/logo.png" class="img-fluid rounded " alt="hello" />
        </div>
        <div class="col-10">
            <marquee style="color:#00BFFF;line-height:200px">
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
                    <a hreh="add-jeux.php"
                        class=" text-decoration-none shadow-sm p-3 mb-5 bg-body-tertiary rounded link-danger link-opacity-100-hover">Add
                        Nouvel Jeux</a>

                </div>
            </div>
        </div>
    </nav>



    <?php
    $id = $_GET['id'];
    $repo = new JeuxRepository();
    $jeux = $repo->listArticleById($id);
    $id_cat = $jeux->getId_categorie();
    $repocategorie = new CategorieRepository();
    $category = $repocategorie->getCategorieById($id_cat);
    $repocommentaire = new CommentaireRepository();
    $commentaire = $repocommentaire->listCommentaire($id);
    ?>
    <!-- partie card de single jeux -->
    <div class=" NN container-fluid  ">
        <div class="row justify-content-md-center ">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 30rem;">
                <img class="card-img-top" src="<?= ($jeux->getImage()) ?>" alt="Card image cap">

                <div class="card-body">
                    <h3 class="card-title">
                        <?= $jeux->getLabel() ?>
                    </h3>

                    <p class="card-text">
                        <?= $jeux->getDescription() ?>
                    </p>
                    <p class="card-text text-end bold">
                        <?= $jeux->getPrix() ?> €
                    </p>
                    <p class="card-text text-info">
                        Le Categorie :
                        <?= $category->getName(); ?>
                    </p>
                    <div>
                        <a id="com" class="card-link" style="text-decoration: none;">Les Commentaires de clients</a>

                        <span id="cc" class="d-none">
                            <?php
                            $counter = 1;
                            foreach ($commentaire as $line) {
                                ?>
                                <h4>
                                    <?= $counter ?>
                                </h4>
                                <?= $line->getCommentaire() ?>
                                <hr>

                                <?php
                                $counter++;
                            } ?>
                        </span>
                        <br>
                        <form method="post">
                            <label for="">Add une commentaire :</label>
                            <input type="textarea" name="add">
                            <br>
                            <button class="badge rounded-pill bg-warning text-dark"> Add </button>
                        </form>
                    </div>
                    <br>
                    <a class="card-link btn btn-primary mb-3" href="javascript:history.go(-1)">Retour a la page
                        precedant</a>

                </div>
            </div>
        </div>
    </div>
    <!-- parti ajouter les commentaire -->
    <?php
    if (isset($_POST['add'])) {
        $x = $_POST['add'];
        $addcom = new Commentaire($x, $jeux->getId(), 0);
        $repocommentaire->addCommentaire($addcom);

    }

    ?>
    <!-- parti onlick sur le lien il faut afficher toutes les commentaire -->
    <script type="text/javascript">
        let counter = 1;
        document.getElementById('com').addEventListener('click', () => {
            document.getElementById('cc').classList.toggle("d-none");

        });

    </script>
    <div class="footer">
        <p class="text-center mb-2 mt-2"> &copy; 2023 BLOG-NISREEN M2I </p>
    </div>
</body>

</html>