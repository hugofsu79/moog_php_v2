<?php
// inclure le fichier des fonctions pour pouvoir les appeler ici
include 'function.php';

session_start();

//J'inclus le head avec les balises de base + la balise head(pour ne pas répeter le code qu'il contient)
include 'head.php';
createCart()
?>


<?php
include 'header.php';
?>

<main>
    <h1>Validation<h1>

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
                                                Vous venez de vous procurer un ticket pour explorer des horizons musicaux infinis.
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
</main>

<?php
include 'footer.php';
?>