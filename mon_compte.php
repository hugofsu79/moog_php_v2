<?php
// inclure le fichier des fonctions pour pouvoir les appeler ici
include 'function.php';

//Initialiser la session et accéder à la superglobale $_SESSION (tableau associatif)
session_start();




//J'inclus le head avec les balises de base + la balise head(pour ne pas répeter le code qu'il contient)
include 'head.php';
?>

<body>


    <?php
    include 'header.php';

    // Pour initialiser le panier 
    // createCart();
    // var_dump($_SESSION);


    ?>
    <h1>Mon compte</h1>

    <div class="container text-center pb-5">
        <div class="row">
            <div class="col">
                <a href="./modifInfos.php"><button type="button" class="btn btn-light">
                        <p class="fs-1 fw-bold">&#8505;<br></p>
                        Modifier mes information
                    </button></a>
            </div>
            <div class="col">
                <a href=""><button type="button" class="btn btn-light">
                    <p class="fs-1 fw-bold">&#127980;<br></p>
                    Voir mes commandes
                </button></a>
            </div>
            <div class="col">
                <button type="button" class="btn btn-light">
                    <p class="fs-1 fw-bold">&#128274;<br></p>
                    Modifier mon mot de passe<br>
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-12">
    <a href="./modifAdresse.php"><button type=" button" class="btn btn-light mt-4">
            <p class="fs-1 fw-bold">&#127969;<br></p>
            Modifier mon adresse<br>
        </button></a>
    </div>
    </div>

    <?php
    include 'footer.php';
    ?>