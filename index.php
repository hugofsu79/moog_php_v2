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

<?php
include 'header.php';

// Pour initialiser le panier 
// createCart();
// var_dump($_SESSION);
if(isset($_POST['deconnection()'])){
  deconnection();
}

?>


<div class="container text-center">
  <div class="row">
    <img src="./Rscs/png/mur_sonore.png" class="rounded-1 pt-4"></img>
  </div>
</div>
<h1 id="les_produits">Les produits</h1>

<body>



  <main>

    <?php


    $articles = getArticles();


    //  var_dump(getArticles());
    // Je lance ma blouce pour afficher une carte bootstrap par article
    foreach ($articles as $article) {

    //   echo "
    //         <div class=\"card\">
            // <img src=\"./Rscs/png/\" . $article['image'] . "\">
    //         <div class=\"card-body\">
    //         <h5 class=\"card-title\">" . $article['nom'] . "</h5>
    //     <p class=\"card-text\">" . $article['description'] . "</p>
    //       <form method=\"GET\" action=\"./produit.php\">
    //   <input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
    //     <input type=\"submit\" class=\"btn btn-dark\" value=\"Détails produit\">
    //     </form>
    //     </div>

    //     <div class=\"row\">
    //     <div class=\"col\">
    //       <form method=\"GET\" action=\"./panier.php\">
    //     <input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
    //     <input type=\"submit\" class=\"btn btn-outline-danger text-center mb-5\" value=\"Ajouter au panier\">
    //     </form></div></div></div>";
    // }

  echo
    "<div class=\"card\" style=\"width: 18rem;\">
  <img src=\"./Rscs/png/\"" . $article['image'] . "\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">" . $article['nom'] . "</h5>
    <p class=\"card-text\">" . $article['description'] . "</p>
    <form method=\"GET\" action=\"./produit.php\">
    <input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
  </div>
</div>
<div class=\"row\">
<div class=\"col\">
  <form method=\"GET\" action=\"./panier.php\">
<input type=\"hidden\" name=\"productId\" value=\"" . $article['id'] . "\">
<input type=\"submit\" class=\"btn btn-outline-danger text-center mb-5\" value=\"Ajouter au panier\">
</form></div></div></div>";
}
    ?>

    }

  </main>
</body>

<?php
include 'footer.php';
?>