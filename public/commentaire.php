<?php
use App\Entity\Commentaire;
use App\Repository\CommentaireRepository;

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
</head>

<body>
    <?php
    $id = $_GET['id'];
    $repo = new CommentaireRepository();
    $com = $repo->listCommentaire($id);
    ?>

    <div class="container-fluid ">
        <div class="row justify-content-md-center ">
            <div class="card h-50 shadow-lg p-3 mb-5 bg-body rounded " style="width: 20rem;">

                <div class="card-body">
                    <p class="card-title">
                        
                    Le client <?= $com->getId() ?> : 
                    </p>

                    <p class="card-text">
                        <?= $com->getCommentaire() ?>
                    </p>
                  
                    <a class="card-link btn btn-primary mb-3" href="javascript:history.go(-1)">Retour a la page
                        precedant</a>



                </div>
            </div>
        </div>
    </div>