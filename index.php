<!-- <?php
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


<div class="container text-center">
  <div class="row">
      <video autoplay loop width="800" src="./Rscs/video/factory-margincrop.mp4"></video>
    </div>
  </div>
    
    <main>



  <h1 id="les_produits">Les produits</h1>


    <div class="container-fluid ">
    <div class="row">
        <?php
        

        $articles = getArticles();


        //  var_dump(getArticles());
        // Je lance ma blouce pour afficher une carte bootstrap par article
        foreach ($articles as $article) {

          echo "<div class=\"card col-md-4\">
  <img src=\"./Rscs/png/" . $article['picture'] . "\" \class=\"card-img-top\" alt=\"...\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">" . $article['name'] . "</h5>
    <p class=\"card-text\">" . $article['description'] . "</p>


    <form method=\"GET\" action=\"./produit.php\">
    
    <input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
    <input type=\"submit\" class=\"btn btn-dark\" value=\"Détails produit\">
    </form>

    <form method=\"GET\" action=\"./panier.php\">
    <input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
    <input type=\"submit\" class=\"btn btn-outline-danger\" value=\"Ajouter au panier\">
    </form></div>
</div>";
        }

        ?>
    </main>


<?php
include 'footer.php';
?>