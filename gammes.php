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

    // Pour initialiser le panier 
    // createCart();
    // var_dump($_SESSION);


    //1
    $gammes = getGammes();
    //2
    foreach ($gammes as $gamme) {

        echo
        "<h1>" . $gamme['nom'] . "</h1>";// Les gammes s'affiches en en-tete, il est dans un echo dissoncié afin de ne pas avoir les gammes a chaque article.

        "<div class=\"container\">
        <div class=\"row\">";
        
        foreach (getArticlesByGamme($gamme['id']) as $article) { 

            echo
            "<div class=\"d-inline-flex col-md-3 p-2\"><div class=\"card\">
                        <img class=\"m-2 rounded-1\" src=\"./Rscs/png/" . $article['image'] . "\">
                <div class=\"card-body\">
                        <h5 class=\"card-title\">" . $article['nom'] . "</h5>
                        <p class=\"card-text\">" . $article['description'] . "</p>

                        <form method=\"GET\" action=\"./produit.php\">

                        <input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
                        <input type=\"submit\" class=\"btn btn-dark mb-2\" value=\"Détails produit\">
                        </form>

                        <form method=\"GET\" action=\"./panier.php\">
                        <input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
                        <input type=\"submit\" class=\"btn btn-outline-danger\" value=\"Ajouter au panier\">
                        </form>
                </div>;
            }        
        </div>
     }
    ?>
</body>



<?php
include 'footer.php';
?>