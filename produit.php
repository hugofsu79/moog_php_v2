<body>

    <!-- // Le produit est l'action du formulaire -->

    <?php
    // inclure le fichier des fonctions pour pouvoir les appeler ici
    include 'function.php';

    session_start();

    // Pour initialiser le panier 
    createCart();


    //J'inclus le head avec les balises de base + la balise head(pour ne pas répeter le code qu'il contient)
    include 'head.php';
    ?>
    <?php
    include 'header.php';

    // Pour initialiser le panier 
    // createCart();
    // var_dump($_SESSION);
    ?>

    <main class="pb-5">
        <div class="container text-center bg-white">
            <?php
            //1) Récupérer l'id transmis par le formulaire
            $productId = $_GET['productId'];
            // var_dump($productId); // Je teste la variable

            //2) Récuperer le produit qui correspond à cet id, il ira récupérer l'ensemble du produit souhaité
            $article = getArticleFromId($productId);
            // var_dump($article); // Je test que le produit s'affiche belle et bien 

            //3) afficher ses infos
            ?>
            <h1 class="card-title p-3"><?= $article['name'] ?></h1>
            <img src=" ./Rscs/png/<?= $article['picture'] ?>" class=" img-fluid rounded" alt="Shopping item" style="margin-bottom: 2em" ;>
            <div class="card-body">
                <h5 class="card-title pb-4"><?= $article['price'] ?> €</h5>
                <p class="card-text pb-4"><?= $article['description'] ?></p>
                <p class="card-text pb-3"><small class="text-body-secondary"><?= $article['detailedDescription'] ?></small></p>
            </div>
        </div>
    </main>

    <?php
    include 'footer.php';
    ?>
</body>