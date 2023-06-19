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
if (isset($_POST['deconnection()'])) {
    deconnection();
}

?>

<body>
    <main>

        <?php


        if (isset($_POST['articleToDisplay'])) {

            $articleToDisplayId = $_POST['articleToDisplay'];
            $articleToDisplay = getArticleFromId($articleToDisplayId);
        }

        if (isset($_POST['userModified'])) {
            updateUser();
        }

        if (isset($_POST['addressModified'])) {
            updateAddress();
        }

        if (isset($_POST['passwordModified'])) {
            updatePassword();
        }

        ?>


        <h1>Mon compte</h1>

        <div href="container text-cente">
            <div class="row align-items-startr p-5">
                <div class="col">
                    <div class="list-group text-center">
                        <a type="button" class="list-group-item list-group-item-action w-50" href="./modifInfos.php">&#8505; Modifier mes information</a>
                        <a type="button" class="list-group-item list-group-item-actio w-50" href="./commandes.php">&#127980; Voir mes commandes</a>
                        <a type="button" class="list-group-item list-group-item-action w-50" href="./change_Password.php">&#128274; Modifier mon mot de passe</a>
                        <a type="button" class="list-group-item list-group-item-action w-50" href="./modifAdresse.php">&#127969; Modifier mon adresse</a>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include 'footer.php';
        ?>

    </main>

</body>