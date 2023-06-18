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
    <h1 class="p-3 col">Pendant ce temps à l'usine moog...</h1>
    <div class="container">
        <div class="row justify-content">
            <div class="col pb-5">

                    <div id="carouselExampleFade" class="carousel slide carousel-fade">
                        <div class="carousel-inner rounded-1">
                            <div class="carousel-item active">
                                <img src="./Rscs/png/contact/Genereic Instagram_Factory-35.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./Rscs/png/contact/Grandmother Build-13.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./Rscs/png/contact/MoogFactory4.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./Rscs/png/contact/Grandmother Build-10_0.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Précédent</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Suivant</span>
                        </button>
                    </div>
            </div>
            <div class="col text-white">
                <div class="row">
                    <div class="col md-1">
                        <h2>Horaires du magasin</h2>
                        <ul>
                            <li>Lundi - Vendredi<br>10h – 16h</li>
                            <li>Samedi<br>12h – 17h</li>
                            <p class="pt-5"><b>160 Broadway St.<br>
                                    Asheville, NC
                                    28801</b>
                            </p>
                        </ul>
                    </div>
                    <div class="col md-12">
                        <h2>Contacter </h2>
                        <a href="mailto: tours@moogmusic.com">Veuillez contacter le magasin Moog pour organiser une visite.<br></a>
                        <i class="fa-solid fa-coffee fa-2xl"></i><label for="phone" class="pt-3 pb-3">828.239.0123</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>





<?php
include 'footer.php';
?>