<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>single-Jeux</title>
    <script>
        const target = document.getElementById('com');

        com.addEventListener('click', () => {
            cc.innerHTML = `

            <h5>Les Commentaire</h5>
                        <?php
                        foreach ($commentaire as $line) {
                            ?> 
                                              <p ><?= $line->getCommentaire() ?></p>
                                              <hr/>
                        <?php } ?>

`
        )}


    </script>
</head>

<body>
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

    <div class="container-fluid  ">
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

                    <a id="com" class="card-link" href="#">Les Commentaires de clients</a>

                    <p class="cc"></p>


                    <a class="card-link btn btn-primary mb-3" href="javascript:history.go(-1)">Retour a la page
                        precedant</a>

                </div>
            </div>
        </div>
    </div>