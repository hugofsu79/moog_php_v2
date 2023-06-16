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

?>


<main>
    <div class="container pt-5 pb-5">
        <table class="table text-light">
            <thead class="p-5">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Numéro</th>
                    <th scope="col">Montant</th>                <!--création fonction qui récupere le produit commandé-->
                    <th scope="col">Détail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>                  
                    <td>Mark</td>
                    <td>Otto</td>
                    <td><button type="button" class="btn btn-outline-danger">Détails</button></td>              <!--Relier le bouton détail au produit acheté-->
                </tr>
            </tbody>
        </table>
    </div>
</main>

<?php
include 'footer.php';
?>