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

    <div class="container text-center text-light">
        <div class="row">
            <div class="col">
                <i class="fs-1 fw-bold">&#8505;</i><br>
                Modifier mes information
            </div>
            <div class="col">
                <i class="fs-1 fw-bold">&#128274;</i><br>
                Modifier mon mot de passe
            </div>
            <div class="col">
                <i class="fs-1 fw-bold">&#127980;</i><br>
                Voir mes commandes
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>


