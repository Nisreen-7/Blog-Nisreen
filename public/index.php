<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Les jeux </title>
</head>

<body>

    <div class="container-fluid ">
        <div class="row g-3">
            <?php
            use App\Entity\Jeux;
            use App\Repository\JeuxRepository;

            require '../vendor/autoload.php';


            $rep = new JeuxRepository();
            $jeux = $rep->listArticle();


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
                           
                                <a href="single-jeux.php?id=<?= $line->getId() ?>"
                                    class="card-link mb-2 btn btn-primary ">Plus
                                    Detailles
                                </a>
                                
                        </div>
                    </div>
                </div>

            <?php }


            ?>
        </div>

    </div>

</body>

</html>