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


<body>
    <header>
        <?php
        include('header.php');
        ?>
    </header>

    <main>


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./mon_compte.php">Mon compte</a></li>
                <li class="breadcrumb-item active text-light" aria-current="page">Modifier mot de passe</li>
            </ol>
        </nav>

        <?php
        if (isset($_POST['newPassword'])) {
            modifMotDePasse();
        }
        ?>

        <body>

            <main>

                <h1>Modifier mon mot de passe</h1>


                <div class="container w-50 p-5 border border-dark bg-light mb-5 p-5 rounded-2">
                    <div class="row g-2">
                        <div class="col">
                            <div class="p-3">
                                <form action="./change_Passeword.php" method="post">
                                    <input type="hidden" name="passwordModified" value="true">
                                    <div class="form-row justify-content-center">
                                        <div class="form-group col-md-8">
                                            <label for="inputPassword" class="text-dark">Ancien mot de passe</label>
                                            <input name="oldPassword" type="password" class="form-control" id="inputPassword" placeholder="ancienmotdepasse" required>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3"><label for="inputPassword" class="text-dark">Nouveau mot de passe</label>
                                <input name="newPassword" type="password" class="form-control" id="inputPassword" placeholder="nouveaumotdepasse" required>
                                <small id="emailHelp" class="form-text text-muted"><i>Entre 8 et 15 caractères, minimum 1 lettre, 1 chiffre et 1 caractère spécial</small></i>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <button type="submit" class="btn btn-dark">Valider</button>
                        </div>
                    </div>
                </div>
            </main>
        </body>
        <?php
        include('./footer.php');
        ?>