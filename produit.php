<?php
// inclure le fichier des fonctions pour pouvoir les appeler ici
include 'function.php';

session_start();

// Pour initialiser le panier 
createCart();
// var_dump($_SESSION);

?>
<?php
include 'header.php';

// Pour initialiser le panier 
// createCart();
// var_dump($_SESSION);


?>



<body>


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
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="card-title"><?= $article['nom'] ?></h1>
                            </div>
                            <div class="col-md-12">
                                <h5 class="card-title"><?= $article['prix'] ?> €</h5>
                            </div>
                            <div class="col-md-12">
                                <p class="card-text pt-5"><?= $article['description'] ?></p>
                            </div>
                            <div class="col-md-12">
                                <p class="card-text"><small class="text-body-secondary"><?= $article['description_detaillee'] ?></small></p>
                                <input type="submit" class="btn btn-outline-danger mb-5" value="Ajouter au panier">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <img src=" ./Rscs/png/<?= $article['image'] ?>" class="object-fit-none img-fluid rounded" alt="Shopping item" style="margin-bottom: 2em" ;>
                    </div>
                </div>
            </div>
    </main>
    <?php
    include 'footer.php';
    ?>
</body>