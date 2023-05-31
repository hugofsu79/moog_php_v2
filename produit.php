<body>

    <!-- // Le produit est l'action du formulaire -->

    <?php
    // inclure le fichier des fonctions pour pouvoir les appeler ici
    include 'function.php';

    session_start();

    //J'inclus le head avec les balises de base + la balise head(pour ne pas répeter le code qu'il contient)
    include 'head.php';
    ?>


    <main>
        
        <?php
        //1) Récupérer l'id transmis par le formulaire
        $productId = $_GET['productId'];
        // var_dump($productId); // Je teste la variable

        //2) Récuperer le produit qui correspond à cet id, il ira récupérer l'ensemble du produit souhaité
        $article = getArticleFromId($productId);
        // var_dump($article); // Je test que le produit s'affiche belle et bien 

        //3) afficher ses infos
        ?>

<h1><?= $article['name']?></h1>

        <div class="card mb-3 text-center">
            <img src="./Rscs/png/<?= $article['picture']?>" class="card-img-top w-50 mx-auto" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $article['name']?></h5>
                <h5 class="card-title"><?= $article['price']?> €</h5>
                <p class="card-text"><?= $article['description']?></p>
                <p class="card-text"><small class="text-body-secondary"><?= $article['detailedDescription']?></small></p>
            </div>
        </div>
    </main>

    <?php
    include 'footer.php';
    ?>
</body>