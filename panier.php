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



<main>


    <h1>panier</h1>
    <?php

    if (isset($_POST['newQuantity'])) {
        updateQuantity();
    }
    // Si je viens d'un bouton d'ajout, je déclenche l'ajout 
    if (isset($_GET['productId'])) {


        //1) Récupérer l'id transmis par le formulaire
        $productId = $_GET['productId'];
        // var_dump($productId); // Je teste la variable

        //2) Récuperer le produit qui correspond à cet id, il ira récupérer l'ensemble du produit souhaité
        $article = getArticleFromId($productId);
        //var_dump($article)
        // ajouter l'article au panier et tester l'article

        addToCart($article);
    }

    if (isset($_POST['deleArticleId'])) {
        deleteArticle();
    }

    if (isset($_POST['viderPanier'])) {
        viderPanier();
    }

    if (count($_SESSION['panier']) > 0) {
    }

    if (isset($_SESSION['totalArticles'])) {
    }

    if (isset($_POST['retourAlaccueil'])) {
        retourAlaccueil();
    }
    ?>

</main>
<div class="container text-center">
    <div class="card">
        <div class="card-body p-4">
            <div class="row">
                <h2 class="mb-3" ;><a href="./index.php" class="text-body fas fa-long-arrow-alt-left me-2" style="text-decoration: blink">Il vous manque quelque chose ?</a></h2>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <p class="mb-1"></p>
                    </div>
                </div>

                <?php
                foreach ($_SESSION['panier'] as $article) { ?>
                    <hr>
                    <div class="d-flex flex-row align-items-center">
                        <div class="card-body row">
                            <div class="col">
                                <div class="row position-relative start-50 translate-middle-x ">
                                    <div class="col-md-4">
                                        <img src="./Rscs/png/<?= $article['picture'] ?>" class=" img-fluid rounded" alt="Shopping item" style="margin-bottom: 2em" ;>
                                    </div>
                                    <div class="col">
                                        <p class="card-text"><?= $article['name'] ?></p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text"><?= $article['description'] ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <form action="panier.php" method="post">
                                                        <div class="row p-4">
                                                            <input type="hidden" name="modifiedArticleId" value="<?= $article['id'] ?>">
                                                            <input type="number" min="1" max="10" name="newQuantity" value="<?= $article['quantite'] ?>">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- button supprimer -->
                                            <div class="col-md-2">
                                                <form action="panier.php" method="post">
                                                    <input type="hidden" name="deleArticleId" value="<?= $article['id'] ?>">
                                                    <button type="submit" class="btn btn-outline-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: 0.4rem; --bs-btn-font-size: .95rem;">Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- prix -->
                                        <div style="width: 200px;">
                                            <h5 class="card-title"><?= $article['price'] ?> €</h5>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php  } ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- prix&validation commande -->
<div class="container text-center pt-5">
    <div class="text-center">
        <div class="row">
            <div class="col">
                <div class=" card border-danger mb-3" style="max-width: 18rem;">
                    <p class="card-header bg-transparent border-danger" name="totalArticles"><?= totalArticles() ?> €</p>
                    <p class="card-header text-dark border-danger" name="fraisDeLivraison"><i>Frais de livraison <?= fraisDeLivraison() ?> €</i></p>
                    <h2 class="card-header text-dark border-danger" name="fraisDeLivraison"><?= fraisDeLivraison() + totalArticles() ?> €</h2>
                    <!-- modal -->
                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2>Félicitations!</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Votre commande a été validée!🦾
                                </div>
                                <div class="modal-body line-danger">
                                    Montant total : <?= fraisDeLivraison() + totalArticles() ?> €
                                </div>
                                <div class="modal-body">
                                    Vous venez un de vous procurer un ticket pour explorer des horizons musicaux infinis.
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="./panier.php">
                                        <button type="submit" class="btn btn-outline-danger" name="retourAlaccueil">Retour à l'accueil</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" style="margin: 1rem;">Valider la commande</button>
                </div>
            </div>
            <div class="col">
                <form method="POST" action="./panier.php">
                    <button type="submit" class="btn btn-xl btn-outline-danger" name="viderPanier"><span>&#128465;</span></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>