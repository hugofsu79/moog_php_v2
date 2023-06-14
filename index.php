<header><?php
        include 'header.php';

        // Pour initialiser le panier 
        // createCart();
        // var_dump($_SESSION);


        ?></header>

<?php
// inclure le fichier des fonctions pour pouvoir les appeler ici
include 'function.php';

session_start();

// Pour initialiser le panier 
createCart();
// var_dump($_SESSION);

//J'inclus le head avec les balises de base + la balise head(pour ne pas répeter le code qu'il contient)
include 'head.php';
?>

<body>




  <div class="container text-center">
    <div class="row">
      <img src="./Rscs/png/mur_sonore.png" class="rounded-1 pt-4"></img>
    </div>

    <main class="p-2">



      <h1 id="les_produits">Les produits</h1>


      <div class="container-fluid">
        <div class="row column">
          <?php


          $articles = getArticles();


          //  var_dump(getArticles());
          // Je lance ma blouce pour afficher une carte bootstrap par article
          foreach ($articles as $article) {

            echo "<div class=\"col-md-2 p-2\"><div class=\"card\">
        <img src=\"./Rscs/png/" . $article['image'] . "\">
        <div class=\"card-body\">
        <h5 class=\"card-title\">" . $article['nom'] . "</h5>
        <p class=\"card-text\">" . $article['description'] . "</p>


          <form method=\"GET\" action=\"./produit.php\">
    
         <input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
        <input type=\"submit\" class=\"btn btn-dark\" value=\"Détails produit\">
         </form>

           <form method=\"GET\" action=\"./panier.php\">
         <input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
         <input type=\"submit\" class=\"btn btn-outline-danger mt-2\" value=\"Ajouter au panier\">
        </form>
        </div>
        </div>
        </div>
</div>";
          }

          ?>



    </main>
    <?php
    include 'footer.php';
    ?>