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

        <div class="container mt-3 text-center">
            <h1>Mes commandes</h1>
        </div>

        <div class="container-fluid p-5">
            <div class="row text-center justify-content-center">
                <?php displayOrders(getOrders()); ?>
            </div>
        </div>

        <div class="container text-center">
            <a href="account.php">
                <button class="btn btn-dark">Retour au compte</button>
            </a>
        </div>
    </main>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nom</th>
            <th scope="col">Date</th>
            <th scope="col">Montant</th>
            <th scope="col">Détails</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($commandes as $commande){
                echo "
                <tr>
                <th scope=\"row\">" . $commande['numero'] . "</th>
                <td>" . $commande['date_commande'] . "</td>

                <td>
                <form method=\"POST\" action=\detailscommande\">
                <input type=\"hidden\" name=\"commandeId\" value=\"" . $commande['id'] . "\">
                <button type=\"submit\" class=\"btn btn-sm btn-secondary\">
                Détails
                </button>
                </form>
                </td>
                </tr>";
            }
            ?>
    <?php
    include('./footer.php');
    ?>

</body>

<?php
include 'footer.php';
?>