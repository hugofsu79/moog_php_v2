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

        // var_dump($_SESSION);
    }

    if (isset($_POST['deleArticleId'])) {
        deleteArticle();
    }

    if (isset($_POST['viderpanier'])) {
        viderPanier();
    }

    if (count($_SESSION['panier']) > 0) {
    }


    if(count($_SESSION['fraisdeport'])) {

    }

    ?>
    
</main>

<section class="h-100 h-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="card">
                <div class="card-body p-4">
                    <div class="row">
                        <h5 class="mb-3"><a href="./index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <p class="mb-1"></p>
                                <!-- <p class="mb-0">You have 4 items in your cart</p> -->
                            </div>
                        </div>

                        <?php
                        foreach ($_SESSION['panier'] as $article) { ?>
                            <hr>
                            <div class="d-flex flex-row align-items-center">
                                <div class="card-body row">
                                    <div class="col">
                                        <div class="row position-relative start-50 translate-middle-x">
                                            <div class="col-md-3">
                                                <img src="./Rscs/png/<?= $article['picture'] ?>" class=" img-fluid rounded" alt="Shopping item" style="width: 20em;">
                                            </div>
                                            <div class="col-md-3">
                                                <h5 class="card-title"><?= $article['name'] ?></h5>
                                            </div>
                                            <div class="col">
                                                <p class="card-text"><?= $article['description'] ?></p>
                                            </div>
                                            <div class="col-md-1">
                                                <form action="panier.php" method="post">
                                                    <div class="row pt-2">
                                                        <input type="hidden" name="modifiedArticleId" value="<?= $article['id'] ?>">
                                                        <input type="number" min="1" max="10" name="newQuantity" value="<?= $article['quantite'] ?>">
                                                        <button type="submit\" class="col-5 offset-1 btn btn light">
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- button supprimer -->
                                        <form class="rounded float-end" action="panier.php" method="post" style="width: 80px;">
                                            <input type="hidden" name="deleArticleId" value="<?= $article['id'] ?>">
                                            <button type="submit" class="btn btn-outline-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: 1rem; --bs-btn-font-size: .95rem;">Supprimer</button>
                                        </form>
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
            <?php if (count($_SESSION['panier'])) ?>

            <form method="POST" action="./panier.php">
                <button type="submit" class="btn btn-outline-danger" name="viderPanier">Vider le panier</button>
            </form>
            <a href="./validation.php">
                <button class="btn btn-outline-danger>
                Valider la commande</button>
            </a>

            <form class="rounded float-end" action="panier.php" method="post" style="width: 80px;">
                    <button type="submit" name="panierVide" class="btn btn-outline-danger btn-block btn-lg">&#128465;
                    </button>
            </form>
            <p>frais de port = </p>


            <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2">Frais de livraison</p>
                                            <p class="mb-2"></p>
                                        </div>
        </div>
</section>

<!-- colone card details -->
<!-- </div>
                            <div class="col-lg-5">

                                <div class="card bg-dark text-white rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Sous-total</h5>
                                            <img src="./Rscs/png/img_0839.jpeg" class="img-fluid rounded-3" style="width: 50px; height: auto;" alt="Avatar">
                                        </div>

                                        <h3 class="small mb-2">Card type</h3>
                                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-visa fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-amex fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                                        <form class="mt-4">
                                            <div class="form-outline form-white mb-4">
                                                <input type="text" id="typeName" class="form-control form-control-lg" siez="17" placeholder="Nom du titulaire de la carte" />
                                                <label class="form-label" for="typeName">Titulaire de la carte</label>
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <input type="text" id="typeText" class="form-control form-control-lg" siez="17" placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                                <label class="form-label" for="typeText">Numéro de la carte</label>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                                                        <label class="form-label" for="typeExp">Date d'expiration</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input type="password" id="typeText" class="form-control form-control-lg" placeholder="&#10034; &#10034; &#10034; &#10034;" />
                                                        <label class="form-label" for="typeText">Code de vérification de la carte
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2">Total(TVA Incl.)</p>
                                            <p class="mb-2"></p>
                                        </div>

                                        <button type="button" class="btn btn-outline-danger btn-block btn-lg">
                                            <div class="d-flex justify-content-between">
                                                <span></span>
                                                <span>Checkout</span>
                                            </div>
                                        </button>

                                    </div>
                                </div>
                            </div> -->
<?php
include 'footer.php';
?>