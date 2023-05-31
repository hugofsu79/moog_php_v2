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

    <!-- <?php
    include 'header.php';
    ?> -->

    <main>
        <h1>panier</h1>
        <?php
        //1) Récupérer l'id transmis par le formulaire
        $productId = $_GET['productId'];
        // var_dump($productId); // Je teste la variable

        //2) Récuperer le produit qui correspond à cet id, il ira récupérer l'ensemble du produit souhaité
        $article = getArticleFromId($productId);
        //var_dump($article)
       // ajouter l'article au panier et tester l'article
       
        addToCart($article);

        var_dump($_SESSION);

        ?>
    </main>

    <?php
    include 'footer.php';
    ?>


    