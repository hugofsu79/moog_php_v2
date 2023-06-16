<?php
// inclure le fichier des fonctions pour pouvoir les appeler ici
include 'function.php';

//Initialiser la session et accéder à la superglobale $_SESSION (tableau associatif)
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

if (isset($_POST['adresse'])) {
    modifAdresse();
}
?>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./mon_compte.php">Mon compte</a></li>
        <li class="breadcrumb-item active" aria-current="page">Modifier l'adresse</li>
    </ol>
</nav>

<h1 class="modal-title fs-5 text-light p-5" id="exampleModalLabel">Modifier mon adresse</h1>
<div class="container">
    <form action="./modifInfos.php" method="post">

        <div class="row">

            <div class="col">
                <div class="form-group pb-2">
                    <label for="adresse" style="color: white;">Adresse</label>
                    <input type="text" required class="form-control" name="adresse" value="<?php echo $_SESSION['id_client']['adresse'] ?>">
                </div>
            </div>


            <div class="col">
                <div class="form-group pb-2">
                    <label for="code_postal" style="color: white;">Code postal</label>
                    <input type="text" required class="form-control" name="code_postal" value="<?php echo $_SESSION['id_client']['code_postal'] ?>">
                </div>
            </div>


            <div class="col">
                <div class="form-group pb-2">
                    <label for="ville" style="color: white;">Ville</label>
                    <input type="text" required class="form-control" name="ville" value="<?php echo $_SESSION['id_client']['ville'] ?>">
                </div>
            </div>

        </div>
        <button class="col-md-4 btn btn-outline-danger mb-5" type="submit" name="inscription" value="true">Modifier</button>
    </form>
</div>

<?php
include 'footer.php';
?>