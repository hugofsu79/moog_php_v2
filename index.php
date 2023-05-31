<!-- <?php
        // inclure le fichier des fonctions pour pouvoir les appeler ici
        include 'function.php';

        session_start();

        //J'inclus le head avec les balises de base + la balise head(pour ne pas répeter le code qu'il contient)
        include 'head.php';
        ?>

<body>
    <?php
    include 'header.php';
    ?>
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
  </div>
</div>";
        }

        ?>
    </main>

    <?php
    include 'footer.php';
    ?>