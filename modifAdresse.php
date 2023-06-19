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
        <li class="breadcrumb-item active text-light" aria-current="page">Modifier l'adresse</li>
    </ol>
</nav>




<body>

    <main>

        <h1 class="modal-title fs-3 text-light p-3" id="exampleModalLabel">Modifier mon adresse</h1>

        <?php displayAddresses("changeAddress.php"); ?>

        <div class="container mt-3 text-center">
            <div class="container w-50 border border-dark bg-light mb-4 p-5 rounded-3">
                <div class="row">
                    <div class="co-md-12">
                        <h3>Ajouter une nouvelle adresse</h3>
                    </div>
                    <div class="col">
                        <form action="changeAddress.php" method="post">
                            <div class="form-group mb-4">
                                <label for="inputAddress" class="text-black">Adresse</label>
                                <input name="address" type="text" class="form-control" id="inputAddress" placeholder="160 Broadway St." required>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="inputZip" class="text-black">Code Postal</label>
                                    <input name="zipCode" type="text" class="form-control" id="inputZip" placeholder="28801" required>
                                </div>
                                <div class="form-group col  mb-4">
                                    <label for="inputCity" class="text-black">Ville</label>
                                    <input name="city" type="text" class="form-control" id="inputCity" placeholder="Asheville" required>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-2">
                                <button type="submit" class="btn btn-dark" name="newAdress" value="newAdress">Valider</button>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>


    </main>

    <?php
    include('./footer.php');
    ?>

</body>